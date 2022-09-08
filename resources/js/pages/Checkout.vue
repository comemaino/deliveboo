<template>
  <div>
    <Cart @empty="resetCart()" :theseProducts="products" :bool="bool" />
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
      bool: true
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
      amount = parseFloat(amount.toFixed(2));
      return amount;
    },
    resetCart() {
      this.products = [];
      const parsed = JSON.stringify(this.products);
      localStorage.setItem("cart", parsed);
    },
  },
};
</script>

<style>
</style>