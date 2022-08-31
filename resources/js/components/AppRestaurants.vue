<template>
    <div>
        <div v-for="restaurant in restaurants" :key="restaurant.id">
            <CardRestaurant :restaurant="restaurant"  />
        </div>
    </div>
</template>

<script>
    import CardRestaurant from "./CardRestaurant.vue";
export default {
    name: "AppRestaurants",
    components:{
        CardRestaurant,
    },
    props:{
        restaurants: Array,
    }, 
}
</script>

<style>

</style>