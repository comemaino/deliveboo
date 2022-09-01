import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from "./pages/Home.vue";
import RestaurantMenu from "./components/RestaurantMenu.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        { path: '/', name: 'home', component: Home },
        { path: '/restaurantMenu', name: 'RestaurantMenu', component: RestaurantMenu}
    ]
});

export default router;