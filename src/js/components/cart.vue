<template>
  <article>
    <ul class="list-group mt-5">
      <li class="list-group-item d-flex justify-content-between align-items-center h2">
        Ваша корзина:
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center"
          v-for="product in cart">
        <p>Имя товара: <strong>{{product[1]}}</strong> Цена: <strong>{{product[2]}}</strong></p>
        <button type="button" class="btn-close" v-on:click="deleteFromCart(product)" aria-label="Close"></button>
      </li>
      <p class="mt-3">Сумма к оплате: {{sumPrice}}</p>
    </ul>
  </article>
</template>

<script>

import cart_card from "./cart_card.vue";

export default {
  name: "cart",
  components: {cart_card},
  data(){
    return{
      cart: {},
      sum: 0,
    }
  },
  methods: {
    deleteFromCart: function (array){
      const index = this.cart.indexOf(array);
      if (index > -1) {
        this.cart.splice(index, 1);
      }
      localStorage.setItem('product', JSON.stringify(this.cart));
      this.cart  = JSON.parse(localStorage.getItem('product'));
    },
    sumPrice(){
      let sum;
      for (let i = 0; i < this.cart.length; i++) {
          sum += this.cart[i][2]
        }
      return sum;
      }
  },
  created() {
    this.cart = JSON.parse(localStorage.getItem('product'));
  }
}
</script>

<style scoped>

</style>