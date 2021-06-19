<template>
  <article>
      <li><a v-on:click="setCategory(id, name)" class="dropdown-item">{{name}}</a></li>
  </article>
</template>

<script>
export default {
  name: "category",
  props: {
    id: {
      type: String,
      require: true,
    },
    name: {
      type: String,
      require: true,
    }
  },
  methods: {
    setCategory(id, name) {
      this.$root.$emit('setCategoryName', name);
      this.$root.$emit('setCategory', id);
    },
  }
}
</script>

<style scoped>

</style>