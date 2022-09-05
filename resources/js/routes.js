
import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter);

// import components:

import HomeComp from './components/pages/HomeComp';
import Error404 from './components/pages/Error404';
import AboutComp from './components/pages/AboutComp';
import MenuComp from './components/pages/MenuComp.vue';
import CartComp from './components/pages/CartComp.vue';
import TanksPage from './components/pages/TanksPage.vue';
import RestaurantComp from './components/pages/RestaurantComp';


const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',

  routes:[
    {
      path: '/',
      name: 'home',
      component: HomeComp
    },
    {
      path: '/ristoranti',
      name: 'restaurants',
      component: RestaurantComp
    },
    {
      path: '/chi-siamo',
      name: 'about',
      component: AboutComp
    },
    {
      path: '/menu',
      name: 'Menu',
      component: MenuComp
    },
    {
      path: '/carrello',
      name: 'Cart',
      component: CartComp
    },
    {
      path: '/grazie',
      name: 'ThanksPage',
      component: TanksPage
    },
    {
      path: '*',
      component: Error404
    }
  ]

})

export default router;
