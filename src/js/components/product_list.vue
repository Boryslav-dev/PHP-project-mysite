<template>
  <article class="product_list">
    <div class="row">
      <sort class="col-5"></sort>
      <category_list class="col-2"></category_list>
    </div>
    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <product v-for="product in products" :key="product.id"
          :id="product.id"
          :name="product.name"
          :img="product.img"
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
import category_list from "./category_list.vue";

export default {
  name: "product_list",
  data(){
    return{
      pageNumber: paginate.data().pageNumber,
      typeSort: sort.data().typeSort,
      category: category_list.data().category,
      products: {},
    }
  },
  components: {product, paginate, sort, category_list},
  methods: {
    getProducts: async (pageNumber, sortType, category) => {
    let response = await fetch(`/getProductListAPI/${pageNumber}/${sortType}/${category}/`, {
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
    setCategory(id){
      this.category = id;
      this.updatePage();
    },
    updatePage(){
      this.products = this.getProducts(this.pageNumber, this.typeSort, this.category).then((products) => {
        this.products = products;
      });
    },
  },
  created() {
    this.$root.$on('setPage', this.setPage);
    this.$root.$on('setSort', this.setSort);
    this.$root.$on('setCategory', this.setCategory);
    this.products = this.getProducts(this.pageNumber, this.typeSort, this.category).then((products) => {
      this.products = products;
    });
  },
}

</script>

<style scoped>

</style>
