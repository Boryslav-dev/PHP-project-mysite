<template>
  <article>
    <product v-for="product in oneProduct" :key="product.id"
             :id="product.id"
             :name="product.name"
             :price="product.price"
             :count="product.count"
    >
    </product>
  </article>
</template>

<script>

import product from "./product.vue";

export default {
  name: "product_one",
  components: {product},
  data(){
    return{
      id: 1,
      oneProduct: {},
    }
  },
  methods: {
    getProduct: async (id) => {
      let response = await fetch(`/product/${id}/`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        },
      });
      const oneProduct = response.json();
      return oneProduct;
    },
    setId(id){
      this.id = id;
      this.oneProduct = this.getProduct(this.id).then((oneProduct) => {
        this.oneProduct = oneProduct;
      });
    }
  },
  created() {
    this.$root.$on('setId', this.setId);
  },
}
</script>

<style scoped>

</style>