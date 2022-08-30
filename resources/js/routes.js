
import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter);

// import components:

import HomeComp from './components/pages/HomeComp';
import Error404 from './components/pages/Error404';
import AboutComp from './components/pages/AboutComp';
import RestaurantComp from './components/pages/RestaurantComp';
import RegisterComp from './components/RegisterComp.vue'
import LoginComp from './components/LoginComp.vue'
import DashboardComp from './components/DashboardComp.vue'


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
      path: '/register',
      name: 'Register',
      component: RegisterComp
    },
    {
      path: '/login',
      name: 'Login',
      component: LoginComp
    },
    {
      path: '/dashboard',
      name: 'DashBoard',
      component: DashboardComp
    },
    {
      path: '*',
      component: Error404
    }

  ]

})

export default router;
