<template>
    <nav class="ms_container mt-2">
        <div class="form-check form-check-inline">
            <span class="card"  @click="getSelectedCategory(null)" :class=" categories_id.length === 0 ? 'active' : ''">tutti </span>
        </div>
        <div class="form-check form-check-inline m-3" v-for="category in categories" :key="category.id">
            <div class="card d-flex" @click="getSelectedCategory(category.id)" :class=" categories_id.includes(category.id) ? 'active' : ''">{{ category.name }}</div>
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

<style lang="scss" scoped>
.ms_container {
    width: 90%;
    margin: 0 auto;
}

.card {
    background-color: #00cdbc;
    color: white;
    border: 1px solid #00cdbc;
    border-radius: 2rem;
    padding: .5rem 1rem;
    cursor: pointer;
    transition: all .2s ease-in-out;

}

.card:active {
    transform: scale(1.5);
}

.active {
    color: black;
    box-shadow: .5px .5px 1px 1px rgba(0,0,0,0.25);
}
</style>