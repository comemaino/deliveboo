<template>
  <div>
    <NavBar
      :categories="categories"
      @selectedCategory="getRestaurants($event)"
    />
    <h1>Home</h1>
    <div class="container">
      <AppRestaurants :restaurants="restaurants" />

    </div>
  </div>
</template>


<script>
import axios from "axios";
import AppRestaurants from '../components/AppRestaurants.vue';
import NavBar from "../components/NavBar.vue";
export default {
  name: "Home",
  components: {
    AppRestaurants,
    NavBar,
  },
  data() {
    return {
      restaurants: [],
      categories: [],
      // categories_id = []
    };
  },
  created() {
    this.getRestaurants(17);
  },
  methods: {
    getRestaurants(id) {
      // this.categories_id.push = id;
      axios
        .get(`/api/${id}`)
        .then((resp) => {
          this.restaurants = resp.data.results.restaurants;
          this.categories = resp.data.results.categories;
        });
    },
    
  }
};
</script>

<style>
</style>