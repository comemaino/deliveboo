<template>
  <div>
    <div v-if="loading">
      <NavBar
        :categories_id="categories_id"
        :categories="categories"
        @selectedCategory="getRestaurants($event)"
      />
      <AppRestaurants :restaurants="restaurants" />
    </div>
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
      loading: false,
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
        cat = id;
        this.categories_id = [];
      } else if (this.categories_id.includes(id)) {
        this.categories_id = this.categories_id.filter((cat) => cat !== id);
        if (this.categories_id.length < 1) {
          cat = null;
        } else {
          cat = this.categories_id.join();
        }
      } else {
        this.categories_id.push(id);
        cat = this.categories_id.join();
      }
      console.log(cat);

      axios.get(`/api/${cat}`).then((resp) => {
        this.restaurants = resp.data.results.restaurants;
        // if(typeof resp.data.results.restaurants === 'array') {
        // } else {
        //   this.restaurants = [];
        //   this.restaurants.push(resp.data.results.restaurants);
        // }
        this.categories = resp.data.results.categories;
        this.loading = true;
      });
    },
  },
};
</script>

<style></style>
