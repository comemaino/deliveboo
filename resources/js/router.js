import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from "./pages/Home.vue";

import RestaurantMenu from "./components/RestaurantMenu.vue";

import Checkout from "./pages/Checkout.vue";

import Greetings from "./pages/Greetings.vue";

import NotFound from "./pages/NotFound.vue";


const router = new VueRouter({
    mode: "history",
    routes: [

        {
            path: '/',
            name: 'home',
            component: Home
        },

        {
            path: '/:slug',
            name: 'RestaurantMenu',
            component: RestaurantMenu
        },

        {
            path: '/cart/checkout',
            name: 'Checkout',
            component: Checkout
        },

        {
            path: '/cart/checkout/greetings',
            name: 'greetings',
            component: Greetings
        },

        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        },


    ]
});

export default router;