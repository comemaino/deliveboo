<template>
  <nav>
    <div class="banner">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-12 banner-text">
            <h2 class="text-uppercase">
              I piatti che ami, <br />
              dove e quando vuoi
            </h2>
            <p>
              Su Deliveboo ti aspettano tantissimi ristoranti: ordina subito.
            </p>
          </div>
        </div>
        <!-- <div class="form-check form-check-inline" v-for="category in categories" :key="category.id">
          <div class="card d-flex" @click="getSelectedCategory(category.id)" :class=" categories_id.includes(category.id) ? 'active' : ''">{{ category.name }}</div>
        </div> -->
      </div>
    </div>
    <div class="form-check form-check-inline">
      <span
        class="card"
        @click="getSelectedCategory(null)"
        :class="categories_id.length === 0 ? 'active' : ''"
        >tutti
      </span>
    </div>
    <div
      class="form-check form-check-inline m-0"
      v-for="category in categories"
      :key="category.id"
    >
      <div
        class="card d-flex"
        @click="getSelectedCategory(category.id)"
        :class="categories_id.includes(category.id) ? 'active' : ''"
      >
        {{ category.name }}
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavBar",
  props: {
    categories: Array,
    categories_id: Array,
  },
  data() {
    return {
      selectedCategory: null,
    };
  },
  methods: {
    getSelectedCategory(id) {
      this.selectedCategory = id;
      this.$emit("selectedCategory", this.selectedCategory);
    },
  },
};
</script>

<style lang="scss" scoped>
.banner {
  width: 100%;
  height: 400px;
  background-image: url("../img/banner2.png");
  background-position: center;
  background-size: cover;

  .banner-text {
    padding: 9rem 5rem;
    color: #00cdbc;
  }
}

.card {
  background-color: #00cdbc;
  color: white;
  border: 1px solid #00cdbc;
  border-radius: 2rem;
  padding: 0.5rem 1rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.card:active {
  transform: scale(1.5);
}

.active {
  color: black;
  box-shadow: 0.5px 0.5px 1px 1px rgba(0, 0, 0, 0.25);
}
</style>