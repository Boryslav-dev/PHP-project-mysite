import Vue from "vue";

window.Vue = Vue;

Vue.component('product', require('./components/product.vue').default)
Vue.component('product_list', require('./components/product_list.vue').default)
Vue.component('paginate', require('./components/paginate.vue').default)
Vue.component('sort', require('./components/sort.vue').default)
Vue.component('product_one', require('./components/product_one.vue').default)
Vue.component('cart_card', require('./components/cart_card.vue').default)
Vue.component('cart_top', require('./components/cart_top.vue').default)
Vue.component('category', require('./components/category.vue').default)
Vue.component('category_list', require('./components/category_list.vue').default)
Vue.component('cart', require('./components/cart.vue').default)

const app = new Vue({
    el: '#app',
})

const cart = new Vue({
    el: '#cart',
})