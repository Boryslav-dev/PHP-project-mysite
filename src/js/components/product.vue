<template>
  <article>
    <div class="col">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" img="..." role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        <div class="card-body">
          <p class="card-text">{{name}}</p>
          <p class="card-text">{{price}}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a class="btn btn-small" :href="'/product/'+id+'/'">More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  name: "product",
  props: {
    id: {
      type: String,
      require: true
    },
    name: {
      type: String,
      required: true
    },
    price: {
      type: String,
      require: true
    },
    count: {
      type: String,
      require: true
    },
  },
  methods:{
    setId(id){
      this.$root.$emit('setId', id);
    }
  }
}
</script>

<style scoped>

</style>