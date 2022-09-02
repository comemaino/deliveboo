<template>
  <div>
    <template v-if="loading">
      <div class="row">
      <div class="col-9">
      <div>
        <h2>Menù di {{ restaurant.business_name }}</h2>
        <div class="row row-cols-4">
          <div v-for="product in products" :key="product.id">
            <div class="card mb-2" style="width: 18rem">
              <img
                class="card-img-top"
                :src="'../storage/' + product.img"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">{{ product.name }}</h5>
                <p class="card-text">{{ product.description }}</p>
                <p class="card-text">{{ product.ingredients }}</p>
                <button class="btn btn-success"
                  >Aggiungi al Carrello</button
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-3">
      <Cart />
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
Cart
  },
  data() {
    return {
      loading: false,
      restaurant: null,
      products: [],
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      const slug = this.$route.params.slug;
      axios.get(`/api/${slug}/menu`).then((resp) => {
        console.log(resp.data.restaurant);
        this.restaurant = resp.data.restaurant;
        this.products = resp.data.products;
        this.loading = true;
      });
    },
  },
};
</script>

<style lang="">
</style>