<template>
  <div class="container">
    <h3>Il tuo carrello</h3>
    <div class="products-list">
      <ul>
        <li v-for="product in products" :key="product.id">
          <span>{{product.name}}</span>
          <input type="number" name="product_quantity" id="product-quantity" value="product_quantity"/>
          <span>€ {{product.price}}  {{product.quantity}}</span>
        </li>
      </ul>
      <h5>Totale: ∑ product_price * product_quantity</h5>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",

  props: {
        products: Array
    },
};
</script>

<style>
</style>