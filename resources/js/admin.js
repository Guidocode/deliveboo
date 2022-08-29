
require('./bootstrap');

window.Vue = require('vue');

Vue.component('dish-create', require('./components/DishCreate.vue').default);

const app = new Vue({
    el: '#app',
});
