window.axios = require('axios');

window.Vue = require('vue');

import Vue from 'vue';
import router from './routes';
import vuebraintree from 'vue-braintree'

Vue.use(vuebraintree)

import App from './App.vue';

const app = new Vue({
  el: '#app',
  router,
  render: h => h(App)
})

