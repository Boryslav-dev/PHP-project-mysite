import Vue from "vue";

window.Vue = Vue;

Vue.component('product', require('./components/product.vue').default)
Vue.component('product_list', require('./components/product_list.vue').default)
Vue.component('paginate', require('./components/paginate.vue').default)
Vue.component('sort', require('./components/sort.vue').default)
Vue.component('product_one', require('./components/product_one.vue').default)

const app = new Vue({
    el: '#app',
})