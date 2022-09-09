<template>
  <div>
    <!-- <template #button="slotProps">
        <v-btn ref="paymentBtnRef" @click="slotProps.submit" />
      </template> -->
    <form class="px-5 mt-4">
      <!-- Customer Address -->
      <div class="form-group p-2">
        <label for="amount">Indirizzo di spedizione</label>
        <div class="input-group">
          
          <input id="address" name="customer_address" class="form-control" v-model="address" placeholder="Inseirsci il tuo indirizzo" />
        </div>
      </div>
      <!-- Customer E-mail -->
      <div class="form-group p-2">
        <label for="amount">Email</label>
        <div class="input-group">
          
          <input id="customerEmail" name="customer_email" class="form-control" v-model="email" placeholder="Inserisci la tua mail" />
        </div>
      </div>
      <!-- Customer Full name -->
      <div class="form-group p-2">
        <label for="amount">Nome e Cognome</label>
        <div class="input-group">
          
          <input id="customerFullName" name="customer_fullname" class="form-control" v-model="fullName" placeholder="Nome completo">
        </div>
      </div>
      <div class="form-group p-2">
        <label for="amount">Amount</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <span id="amount" class="form-control">{{ amount }}</span>
        </div>
      </div>
      <hr />
      <div class="form-group p-2">
        <label>Credit Card Number</label>
        <div id="creditCardNumber" class="form-control"></div>
      </div>
      <div class="form-group p-2">
        <div class="row">
          <div class="col-6">
            <label>Expire Date</label>
            <div id="expireDate" class="form-control"></div>
          </div>
          <div class="col-6">
            <label>CVV</label>
            <div id="cvv" class="form-control"></div>
          </div>
        </div>
      </div>
      <div class="text-center py-2">
        <button class="btn btn-primary btn-block text-white" @click.prevent="payWithCreditCard">Pay with Credit Card</button>
      </div>
    </form>
  </div>
</template>

<script>
import braintree from "braintree-web";

export default {
  name: "Payment",
  props: {
    amount: {
      required: true,
      type: Number,
    },
  },
  mounted() {
    axios.get("/api/orders/generate").then((resp) => {
      console.log(resp);
      this.apiToken = resp.data.token;
      braintree.client
        .create({
          authorization: this.apiToken,
        })
        .then((clientInstance) => {
          let options = {
            client: clientInstance,
            styles: {
              input: {
                "font-size": "16px",
                "font-family": "Arial",
              },
            },
            fields: {
              number: {
                selector: "#creditCardNumber",
                placeholder: "Enter Credit Card",
              },
              cvv: {
                selector: "#cvv",
                placeholder: "Enter CVV",
              },
              expirationDate: {
                selector: "#expireDate",
                placeholder: "00 / 0000",
              },
            },
          };
          return braintree.hostedFields.create(options);
        })
        .then((hostedFieldInstance) => {
          this.hostedFieldInstance = hostedFieldInstance;
        })
        .catch((err) => {
          console.log(err);
        });
    });
  },
  data() {
    return {
      error: "",
      hostedFieldInstance: false,
      apiToken: "",
      nonce: "",
      email: "",
      address: "",
      fullName: "",
    };
  },
  methods: {
    onLoad() {
      this.$emit("loading");
    },
    onSuccess(payload) {
      const token = payload.nonce;
      this.$emit("onSuccess", token);
      // const nonce = payload.nonce
      // Do something great with the nonce...
    },
    // eslint-disable-next-line node/handle-callback-err
    onError(error) {
      const message = error.message;
      if (message === "No payment method is available.") {
        this.error = "Seleziona un metodo di Pagamento";
      } else {
        this.error = message;
      }
      this.$emit("onError", message);
    },
    payWithCreditCard() {
      const reducedCart = this.reduceCart();
      const customer = this.getCustomerData();
      if (this.hostedFieldInstance) {
        this.hostedFieldInstance
          .tokenize()
          .then((payload) => {
            console.log(payload);
            this.nonce = payload.nonce;
            axios.post('/api/orders/make-payment', {
                token: this.nonce,
                amount: this.$props.amount
            }).then((resp) => {
              const newOrder = {
                paymentState: resp.data.success,
                customerData: customer,
                reducedCart: reducedCart,
                amount: this.$props.amount,
              }
              console.log(resp);
              const parsed = JSON.stringify(newOrder);
              console.log(parsed);
              axios.post('/api/orders/store', {parsed})
              .then((res) => {
                console.log(res);
                this.$router.push('checkout/greetings');
              })
            
            })
          })
          .catch((err) => {
            console.error(err);
          });
      }
    },
    reduceCart() {
      const resultArray = [];
      const cart = JSON.parse(localStorage.cart);
      cart.forEach(element => {
        const newObject = {
          id: element.id,
          quantity: element.productQuantity
        }
        resultArray.push(newObject);
      });
      return resultArray;
    },
    getCustomerData() {
      const newCustomerData = {
        fullname: this.fullName,
        address: this.address,
        email: this.email
      }
      return newCustomerData;
    }
  },
};
</script>