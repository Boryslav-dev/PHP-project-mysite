<template>
  <article class="product_list">
    <sort></sort>
    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <product v-for="product in products" :key="product.id"
          :id="product.id"
          :name="product.name"
          :price="product.price"
          :count="product.count"
        >
        </product>
      </div>
    </div>
    <paginate></paginate>
  </article>
</template>

<script>

import product from "./product.vue";
import paginate from "./paginate.vue";
import sort from "./sort.vue";

export default {
  name: "product_list",
  data(){
    return{
      pageNumber: paginate.data().pageNumber,
      typeSort: sort.data().typeSort,
      products: {},
    }
  },
  components: {product, paginate, sort},
  methods: {
    getProducts: async (pageNumber, sortType) => {
    let response = await fetch(`/getProductListAPI/${pageNumber}/${sortType}/`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        },
      });
      const products = response.json();
      return products;
    },
    setPage(page){
      this.pageNumber = page;
      this.updatePage();
    },
    setSort(sort){
      this.typeSort = sort;
      this.updatePage();
    },
    updatePage(){
      this.products = this.getProducts(this.pageNumber, this.typeSort).then((products) => {
        this.products = products;
      });
    }
  },
  created() {
    this.$root.$on('setPage', this.setPage);
    this.$root.$on('setSort', this.setSort);
    this.products = this.getProducts(this.pageNumber, this.typeSort).then((products) => {
      this.products = products;
    });
  },
}

</script>

<style scoped>

</style>
