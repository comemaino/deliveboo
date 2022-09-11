<template>
    <div class="row ms_container pt-3 pb-3">
        <div class="col-sm-6 col-md-4 col-lg-3" v-for="restaurant in restaurants" :key="restaurant.id">
            <CardRestaurant :restaurant="restaurant" />     
            
        </div>
    </div>
</template>

<script>
import CardRestaurant from "./CardRestaurant.vue";
export default {
    name: "AppRestaurants",
    // data() {
    //     return{
    //         restaurants: []
    //     }
    // },
    components: {
        CardRestaurant,
    },
    props: {
        restaurants: Array,
    },
}
</script>

<style lang="scss" scoped>
.ms_container {
    width: 80%;
    margin: 0 auto;
}
</style>