<template>
  <article>
    <div class="btn-group mt-5 ms-5" role="group" aria-label="Button group with nested dropdown">
      <button type="button" name="desc" class="btn btn-outline-secondary" @click="sort('DESC')">Сортировать по убыванию</button>
      <button type="button" name="asc" class="btn btn-outline-secondary" @click="sort('ASC')">Сортировать по возрастанию</button>
    </div>
  </article>
</template>

<script>
import product_list from "./product_list.vue";

export default {
  name: "sort",
  components: {product_list},
  data(){
    return{
      typeSort: "ASC",
    }
  },
  methods: {
    sort(type) {
      this.typeSort = type;
      this.$root.$emit('setSort', this.typeSort);
    },
  }
}
</script>

<style scoped>

</style>