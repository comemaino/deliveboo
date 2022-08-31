<template>
    <div class="client_side">
      <AppHeader />
      <h1>Guest</h1>
      <router-view></router-view>
    </div>
</template>

<script>
  import AppHeader from "../components/AppHeader.vue";
export default {
  name: "App",
  components:{
    AppHeader
  },
};
</script>

<style lang="scss">
  @import "../../sass/app.scss";
</style>