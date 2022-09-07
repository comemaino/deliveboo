<template>
    <nav class="ms_container mt-2">
        <h2>Categorie</h2>
        <div class="form-check form-check-inline m-3" v-for="category in categories" :key="category.id">
            <span @click="getSelectedCategory(category.id)" >{{ category.name }}</span>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar",
    props: {
        categories: Array,
    },
    data() {
        return {
            selectedCategory: null,
        }
    },
    methods: {
        getSelectedCategory(id) {
            this.selectedCategory = id;
            this.$emit('selectedCategory', this.selectedCategory);
        }
    },
}
</script>

<style lang="scss" scoped>
.ms_container {
    width: 80%;
    margin: 0 auto;
}

span {
    border: 1px solid #00cdbc;
    border-radius: 2rem;
    padding: .5rem 1rem;
}
</style>