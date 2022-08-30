
require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content')

Vue.component('dish-create', require('./components/DishCreate.vue').default);

const app = new Vue({
    el: '#app',
});
