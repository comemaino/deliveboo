import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from "./pages/Home.vue";
<<<<<<< HEAD
import RestaurantMenu from "./components/RestaurantMenu.vue";
=======
import NotFound from "./pages/NotFound.vue";
>>>>>>> f1f9c0a3cb43b4554e14dca76a5763b4898b0933

const router = new VueRouter({
    mode: "history",
    routes: [
<<<<<<< HEAD
        { path: '/', name: 'home', component: Home },
        { path: '/restaurantMenu', name: 'RestaurantMenu', component: RestaurantMenu}
=======
        { 
            path: '/', 
            name: 'home', 
            component: Home 
        },
        {
            path:'/*',
            name:'not-found',
            component : NotFound
        },
>>>>>>> f1f9c0a3cb43b4554e14dca76a5763b4898b0933
    ]
});

export default router;