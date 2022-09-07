<template>
    <div class="ms_container d-flex flex-wrap">
        <div v-for="restaurant in restaurants" :key="restaurant.id" class="m-2">
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