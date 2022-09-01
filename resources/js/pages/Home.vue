<template>
    <div>
        <NavBar
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
        };
    },
    created() {
        this.getRestaurants(17);
    },
    methods: {
        getRestaurants(id) {
            axios.get(`/api/${id}`).then((resp) => {
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
