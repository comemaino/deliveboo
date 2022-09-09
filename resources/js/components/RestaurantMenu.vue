<template>

  <div class="ms_container mt-3">
    <template v-if="loading">

      <div class="d-flex justify-content-center py-3" v-if="error" @click="error = null">
        <div class="alert alert-danger">
          <h3>{{ error }}</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-9">
          <div>
            <h2>Menù di {{ restaurant.business_name }}</h2>

            <div class="row row-cols-3">
              <div v-for="(product, index) in products" :key="product.id">
                <div class="card card-menu mb-2">
                  <img
                    class="card-img-top"
                    :src="'../storage/' + product.img"
                    alt="Card image cap"
                  />
                  <div class="card-body">
                    <h5 class="card-title">{{ product.name }}</h5>
                    <p class="card-text">
                      {{ trimText(product.description, 100) }}
                    </p>
                    <p class="card-text">{{ product.ingredients }}</p>
                    <div class="add">
                      <span>€ {{ product.price }}</span>
                      <input
                        type="number"
                        name="product_quantity"
                        :id="'input' + product.id"
                        min="1"
                        v-model="quantity_id[index]"
                      />
                      <button
                        class="btn ms_btn mt-3"
                        @click="addToCart(product, index)"
                      >
                        Aggiungi al carrello
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-3">
          <Cart @empty="resetCart()" :theseProducts="cart" />
        </div>

      </div>
    </template>
  </div>
</template>

<script>
import axios from "axios";
import Cart from "./Cart.vue";

export default {
  name: "RestaurantMenu",
  components: {
    Cart,
  },
  data() {
    return {
      loading: false,
      restaurant: null,
      products: [],
      cart: [],
      quantity_id: [],
      error: null,
    };
  },
  created() {
    this.getProducts();
    // console.log(this.cartProducts);
  },
  mounted() {
    if (localStorage.cart) {
      // const cartAsArray = localStorage.cart.split(",");
      // const cartAsArray = JSON.parse(localStorage.cart);
      // console.log(cartAsArray);
      // this.cart = cartAsArray;
      // localStorage.cart = '';
      // console.log(this.cartProducts);
      this.cart = JSON.parse(localStorage.cart);
      // localStorage.cart = '';
    }
  },
  methods: {
    getProducts() {
      const slug = this.$route.params.slug;
      axios.get(`/api/${slug}/menu`).then((resp) => {
        // console.log(resp.data.restaurant);
        this.restaurant = resp.data.results.restaurant;
        this.products = resp.data.results.products;
        this.loading = true;
      });
    },

    // addToCart(item) {
    //   // if (this.cartProducts.length > 0 && this.cartProducts[0].user_id !== user_id) {
    //   //   alert('Non puoi aggiungere articoli di ristoranti diversi')
    //   // } else {
    //   // if (product.user_id)
    //   let checkResult = this.cart.productsArray.filter((element) => element.id === item.id ? true : false);
    //   if (checkResult.length !== 0) {
    //     checkResult[0].productQuantity++;
    //     console.log(checkResult[0]);
    //   } else {
    //     let productQuantity;
    //     if (!document.getElementById("input" + item.id).value) {
    //       productQuantity = 1;
    //     } else {
    //       productQuantity = parseInt(document.getElementById("input" + item.id).value);
    //     }
    //     // this.cartProducts.push([id, user_id, productQuantity]);
    //     const product = item;
    //     item.productQuantity = productQuantity;
    //     this.cart.productsArray.push(product);
    //   }

    //   // document.getElementById("input" + id).value = null;
    //   // console.log(this.cartProducts);
    //   // console.log(JSON.stringify(product));
    //   localStorage.cart = JSON.stringify(this.cart);
    //   console.log(localStorage.cart);
    // },
    addToCart(item, index) {
      if (this.cart.length !== 0) {
        for (let i = 0; i < this.cart.length; i++) {
          let currentProduct = this.cart[i];
          if (currentProduct.user_id !== item.user_id) {
            this.error = "Il tuo carrello contiene prodotti provenienti da un'altra attività";
            return;
          }
        }
      }
      this.error = null;
      let product_quantity = this.quantity_id[index];
      if (product_quantity === undefined) {
        product_quantity = 1;
      }
      console.log(product_quantity);
      console.log(item.id, "id");
      const checkResult = this.cart.filter((product) => product.id == item.id);
      console.log(checkResult);
      if (checkResult.length === 0) {
        item.productQuantity = parseInt(product_quantity);
        this.cart.push(item);
      } else {
        checkResult[0].productQuantity += parseInt(product_quantity);
        this.cart.push();
      }
      this.saveCart();
    },
    saveCart() {
      const parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
      console.log(localStorage.cart);
    },
    resetCart() {
      this.cart = [];
      const parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
    },
    trimText(text, maxCharNumb) {
      if (text.length > maxCharNumb) {
        return text.substr(0, maxCharNumb) + '...';
      }
      return text;
    }
  },
};
</script>

<style lang="scss" scoped>
.ms_container {
  width: 80%;
  margin: 0 auto;
}

.card-menu {
  max-height: 500px;
}

.ms_btn {
  border: 1px solid #00CDBC;
  color: #00CDBC;
}

.ms_btn:active {
  transform: scale(0.98);
  box-shadow: 3px 2px 22px 1px rgba(0, 0, 0, 0.24);
}

</style>