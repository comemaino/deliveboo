<template>
  <div>
    <NavBar :categories="categories" />
    <h1>Home</h1>
    <AppRestaurants :restaurants="restaurants" />
  </div>
</template>


<script>
  import axios from "axios";
  import AppRestaurants from '../components/AppRestaurants.vue';
  import NavBar from "../components/NavBar.vue";
export default {
  name: "Home",
  components:{
    AppRestaurants,
    NavBar,
  },
  data() {
        return {
            restaurants: [],
            categories:[],
        };
    },
    created() {
        this.getRestaurants();
    },
    methods: {
        getRestaurants() {
            axios
                .get("/api")
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