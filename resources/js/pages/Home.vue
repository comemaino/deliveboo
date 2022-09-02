<template>
  <div>
    <NavBar
      :categories_id="categories_id"
      :categories="categories"
      @selectedCategory="getRestaurants($event)"
    />
    <h1>Home</h1>
    <AppRestaurants :restaurants="restaurants" />
  </div>
</template>

<script>
import axios from "axios";
import AppRestaurants from "../components/AppRestaurants.vue";
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
      categories_id: [],
    };
  },
  created() {
    this.getRestaurants(null);
  },
  methods: {
    getRestaurants(id) {
        let cat;
        if (!id) {
            cat = '17';
            this.categories_id = [];
        } else {
            this.categories_id.push(id);
            cat = this.categories_id.join();
        }
        console.log(cat);
      axios.get(`/api/${cat}`).then((resp) => {
        console.log(resp);
        this.restaurants = resp.data.results.restaurants;
        // if(typeof resp.data.results.restaurants === 'array') {
        // } else {
        //   this.restaurants = [];
        //   this.restaurants.push(resp.data.results.restaurants);
        // }
        this.categories = resp.data.results.categories;
        console.log(resp.data.results);
      });
    },
  },
};
</script>

<style></style>
