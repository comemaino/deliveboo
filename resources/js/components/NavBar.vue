<template>
  <nav>
    <!-- <input v-for="category in categories" :key="category.id">{{category.name}}> -->
    <div class="form-check form-check-inline" v-for="category in categories" :key="category.id">
    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"  :value="category.id">
    <label class="form-check-label" for="inlineRadio1">{{category.name}}</label>
    </div>
  </nav>
</template>

<script>
export default {
    name:"NavBar",
    props:{
        categories: Array,
    },
    data() {
        return{
            selectedCategory:null,
        }
    },
    methods:{
        getSelectedCategory(){

        }
    },
}
</script>

<style>

</style>