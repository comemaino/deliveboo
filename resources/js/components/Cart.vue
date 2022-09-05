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
            :id="'product-quantity-' + product.id"
            :value="product.productQuantity"
            @change="addMore(product), getAmount()"
          />
          <span class="amount"
            >€ {{ product.price * product.productQuantity }}</span
          >
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
  props: {
    theseProducts: Array,
  },
  data() {
    return {
      theseProductsArray: [],
      cartAmount: 0,
    };
  },
  mounted() {
    if (localStorage.cart) {
      console.log(JSON.parse(localStorage.cart));
      const thisCart = JSON.parse(localStorage.cart);
      // this.theseProducts = thisCart.productsArray;
    }

    this.getAmount();
  },
  methods: {
    resetCart() {
      localStorage.cart = "";
      this.theseProductsArray = [];
      this.cartAmount = 0;
    },
    addMore(product) {
      const index = this.theseProductsArray.indexOf(product);
      const quantity = parseInt(
        document.getElementById("product-quantity-" + product.id).value
      );
      const selectedProduct = this.theseProductsArray[index];
      selectedProduct.productQuantity = quantity;
      const cart = JSON.parse(localStorage.cart);
      cart.productsArray = this.theseProductsArray;
      localStorage.cart = JSON.stringify(cart);
    },
    getAmount() {
      let amount = 0;
      this.theseProductsArray.forEach((product) => {
        let result = 0;
        result = product.price * product.productQuantity;
        amount += result;
      });
      this.cartAmount = parseFloat(amount.toFixed(2));
    },
  },
  watch: {
    theseProducts(newProduct) {
      if (this.theseProductsArray.includes(newProduct)) {
        this.addMore(newProduct);
      } else {
        this.theseProductsArray.push(newProduct);
      }
      this.getAmount();
    }
  }
};
</script>

<style>
</style>