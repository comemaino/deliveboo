<template>
  <div class="container">
    <h3>Il tuo carrello</h3>
    <div class="products-list">
      <ul>
        <li v-for="(product, index) in theseProducts" :key="index">
          <span>{{ product.name }}</span>
          <input
            type="number"
            name="product_quantity"
            :id="'product-quantity-'+ product.id"
            :value="product.productQuantity"
            @change="addMore(product), getAmount()"
          />
          <span class="amount">€ {{ product.price * product.productQuantity }}</span>
        </li>
      </ul>
      <h5>Totale: € {{ cartAmount }}</h5>
    </div>
    <div class="">
      <button class="btn btn-danger" @click="resetCart()">
        Svuota carrello
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",
  data() {
    return {
      theseProducts: [],
      cartAmount: 0,
    };
  },
  mounted() {
    if (localStorage.cart) {
      console.log(JSON.parse(localStorage.cart));
      const thisCart = JSON.parse(localStorage.cart);
      this.theseProducts = thisCart.productsArray;
    }

    this.getAmount();
  },
  methods: {
    resetCart() {
      localStorage.cart = "";
    },
    addMore(product) {
      const quantity = document.getElementById('product-quantity-'+ product.id).value;
      product.productQuantity = quantity;
    },
    getAmount() {
      let amount = 0;
      this.theseProducts.forEach((product) => {
        let result = 0;
        result = product.price * product.productQuantity
        amount += result;
      })
      this.cartAmount = parseFloat(amount.toFixed(2));
    }
  },
};
</script>

<style>
</style>