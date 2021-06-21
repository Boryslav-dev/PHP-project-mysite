<template>
  <button v-on:click="addToCart" name="button" type="button" class="cart-card btn btn-outline-secondary" style="cursor: pointer">
    <small>Добавить в корзину</small>
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
    </svg>
  </button>
</template>

<script>
export default {
  name: "cart_card",
  props: {
    id: {
      type: Number,
      require: true,
    },
    name: {
      type: String,
      require: true,
    },
    img: {
      type: String,
      require: true,
    },
    price: {
      type: Number,
      require: true,
    }
  },
  data(){
    return{
      cart: [],
    }
  },
  methods: {
    addToCart: function() {
      if(localStorage.getItem('product') == null) {
        localStorage.setItem('product', '[]');
      }
      this.cart = JSON.parse(localStorage.getItem('product'));
      let cartProduct = [];
      cartProduct.push(this.id);
      cartProduct.push(this.name);
      cartProduct.push(this.price);
      this.cart.push(cartProduct);
      localStorage.setItem('product', JSON.stringify(this.cart));
      this.createAlert();
    },
    createAlert(){
      let div = document.createElement('div');
      div.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">\n' +
          '  <strong>Товар добавлен!</strong> Выбранный товар был успешно доабвлен в корзину .\n' +
          '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n' +
          '</div>'
      alert('Товар добавлен!');
      setTimeout(() => div.remove(), 6000);
    }
  },
}
</script>

<style scoped>
 .cart-card{

 }
</style>