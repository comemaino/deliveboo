<template>
    <nav>
        <div class="form-check form-check-inline" v-for="category in categories" :key="category.id">
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

<style>
</style>