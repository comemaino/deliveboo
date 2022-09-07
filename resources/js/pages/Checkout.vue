<template>
  <div>
    <Cart :theseProducts="products" />
    <Payment :amount="getAmount()" />
  </div>
</template>

<script>
import Payment from "../components/Payment.vue";
import Cart from "../components/Cart.vue";
import axios from "axios";

export default {
  name: "Checkout",
  components: {
    Payment,
    Cart,
  },
  mounted() {
    this.getCart();
  },
  data() {
    return {
      apiToken: "",
      products: [],
    };
  },
  methods: {
    getCart() {
      const cart = JSON.parse(localStorage.cart);
      this.products = cart;
    },
    getAmount() {
      let amount = 0;
      this.products.forEach((element) => {
        amount += element.price * element.productQuantity;
      });
      return amount;
    },
  },
};
</script>

<style>
</style>