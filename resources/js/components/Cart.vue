<template>
  <div class="container">
    <h3>Il tuo carrello</h3>
    <div class="products-list">
      <ul>
        <li v-for="(product, index) in getUpdatedProducts" :key="index">
          <span>{{ product.name }}</span>
          <button class="btn btn-danger" @click="remove(product)">-</button>
          <span>{{ product.productQuantity }}</span>
          <button class="btn btn-success" @click="addMore(product)">+</button>
          <!-- <input
            type="number"
            name="product_quantity"
            :id="'product-quantity-' + product.id"
            :value="product.productQuantity"
            @change="addMore(product), getAmount()"
          /> -->
          <span class="amount"
            >€ {{ product.price * product.productQuantity }}</span
          >
        </li>
      </ul>
      <h5>Totale: € {{ getAmount }}</h5>
    </div>
    <div class="">
      <button class="btn btn-danger" @click="resetCart()">
        Svuota carrello
      </button>
      <button class="btn btn-success" @click="resetCart()">
        Checkout
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
    };
  },
  mounted() {
    if (localStorage.cart) {
      console.log(JSON.parse(localStorage.cart));
      // const thisCart = JSON.parse(localStorage.cart);
      // this.theseProducts = thisCart.productsArray;
    }
  },
  computed: {
    getAmount() {
      let amount = 0;
      this.$props.theseProducts.forEach((element) => {
        amount += element.price * element.productQuantity;
      });
      return amount;
    },
    getUpdatedProducts() {
      return this.$props.theseProducts;
    },
  },
  methods: {
    addMore(item) {
      ++item.productQuantity;
      this.getUpdatedProducts.push();
      this.saveCart();
    },
    remove(item) {
      if (item.productQuantity > 0) {
        --item.productQuantity;
        this.getUpdatedProducts.push();
      }
      this.saveCart();
    },
    saveCart() {
      const parsed = JSON.stringify(this.getUpdatedProducts);
      localStorage.setItem("cart", parsed);
    },
    resetCart() {
      this.$emit("empty");
    },
  },
  //   methods: {
  //     resetCart() {
  //       localStorage.cart = "";
  //       this.theseProductsArray = [];
  //       this.cartAmount = 0;
  //     },
  //     addMore(product) {
  //       const index = this.theseProductsArray.indexOf(product);
  //       const quantity = parseInt(
  //         document.getElementById("product-quantity-" + product.id).value
  //       );
  //       const selectedProduct = this.theseProductsArray[index];
  //       selectedProduct.productQuantity = quantity;
  //       const cart = JSON.parse(localStorage.cart);
  //       cart.productsArray = this.theseProductsArray;
  //       localStorage.cart = JSON.stringify(cart);
  //     },
  //     getAmount() {
  //       let amount = 0;
  //       this.theseProductsArray.forEach((product) => {
  //         let result = 0;
  //         result = product.price * product.productQuantity;
  //         amount += result;
  //       });
  //       this.cartAmount = parseFloat(amount.toFixed(2));
  //     },
  //   },
};
</script>

<style>
</style>