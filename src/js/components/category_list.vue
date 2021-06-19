<template>
  <article>
    <div class="btn-group mt-5">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Выбирете категорию:
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <category v-for="category in categories" :key="category.id"
                  :id="category.id"
                  :name="category.name"
        >
        </category>
      </ul>
      <div class="mt-2 ms-2" v-if="this.name !== 0">
        {{name}}
      </div>
    </div>
  </article>
</template>

<script>

import category from "./category.vue";

export default {
  name: "category_list",
  components: {category},
  data(){
    return{
      category: 0,
      name: 0,
      categories: {},
    }
  },
  methods: {
    getCategories: async () => {
      let response = await fetch(`/getCategoryAPI/`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        },
      });
      const categories = response.json();
      return categories;
    },
    setName(name){
      this.name = name;
    }
  },
  created() {
    this.$root.$on('setCategoryName', this.setName);
    this.categories = this.getCategories().then((categories) => {
      this.categories = categories;
    });
  }
}
</script>

<style scoped>

</style>