<template>
    <nav>
        <div class="form-check form-check-inline" v-for="category in categories" :key="category.id">
            <span @click="getSelectedCategory(category.id)" :class=" categories_id.includes(category.id) ? 'active' : ''">{{ category.name }}</span>
        </div>
        <div class="form-check form-check-inline">
            <span @click="getSelectedCategory(null)" :class=" categories_id.length === 0 ? 'active' : ''">Reset</span>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar",
    props: {
        categories: Array,
        categories_id: Array
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

<style scoped>
.active {
    color: red;
}
</style>