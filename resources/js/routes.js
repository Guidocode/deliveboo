
import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter);

// import components:

import HomeComp from './components/pages/HomeComp';
import Error404 from './components/pages/Error404';
import AboutComp from './components/pages/AboutComp';
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
      path: '*',
      component: Error404
    }
  ]

})

export default router;