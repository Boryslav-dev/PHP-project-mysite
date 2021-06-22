<template>
  <article>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center mt-5">
        <li v-if="this.pageNumber === 0" class="page-item disabled">
          <a class="page-link" @click="prevPage">Previous</a>
        </li>
        <li v-else class="page-item">
          <a class="page-link" @click="prevPage">Previous</a>
        </li>
          <li class="page-item" v-for="page in count" :key="page">
            <a class="page-link" @click="pageClick(page)">{{page}}</a>
          </li>
        <li v-if="this.pageNumber === count-1" class="page-item disabled">
          <a class="page-link" @click="nextPage">Next</a>
        </li>
        <li v-else class="page-item">
          <a class="page-link" @click="nextPage">Next</a>
        </li>
      </ul>
    </nav>
  </article>
</template>

<script>

import product_list from "./product_list.vue";

export default {
  name: "paginate",
  components: {product_list},
  props: {
    pages: {
      type: Number,
      require: true,
    }
  },
  data(){
    return{
      pageNumber: 0,
      count: 0,
    }
  },
  methods: {
    getCountPages: async () => {
      let response = await fetch(`/getCountPages/`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        },
      });
      const count = response.json();
      return count;
    },
    pageClick: function (page){
      this.pageNumber = page - 1;
      this.$root.$emit('setPage', this.pageNumber);
    },
    nextPage: function (){
      this.pageNumber++;
      this.$root.$emit('setPage', this.pageNumber);
    },
    prevPage: function (){
      this.pageNumber--;
      this.$root.$emit('setPage', this.pageNumber);
    }
  },
  created() {
    this.count = this.getCountPages().then((count) => {
      this.count = count;
    });
  },
}

</script>

<style scoped>

</style>