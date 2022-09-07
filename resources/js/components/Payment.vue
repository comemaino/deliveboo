<template>
  <div>
    <!-- <template #button="slotProps">
        <v-btn ref="paymentBtnRef" @click="slotProps.submit" />
      </template> -->
    <form>
      <div class="form-group">
        <label for="amount">Amount</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <span id="amount" class="form-control">{{ amount }}</span>
        </div>
      </div>
      <hr />
      <div class="form-group">
        <label>Credit Card Number</label>
        <div id="creditCardNumber" class="form-control"></div>
      </div>
      <div class="form-group">
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
                "font-size": "14px",
                "font-family": "Open Sans",
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
  },
};
</script>