<template>
    <div class="card mb-2" style="width: 18rem;">
        <img class="card-img-top" :src="'../storage/' + restaurant.cover" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ restaurant.business_name }}</h5>
            <p class="card-text">{{ restaurant.address }}</p>
            <router-link :to="{ name: 'RestaurantMenu', params: { slug: restaurant.slug } }" class="btn btn-primary">Menù Ristorante</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardRestaurant",
    props: {
        restaurant: Object,
    },
    created() {
        console.log(this.restaurant);
    }
}
</script>

<style>
</style>