<template>
  <div class="client_side">
    <AppHeader />
    <router-view></router-view>
    <AppFooter />
  </div>
</template>

<script>
import AppHeader from "../components/AppHeader.vue";
import AppFooter from "../components/AppFooter.vue";
export default {
  name: "App",
  components: {
    AppHeader,
    AppFooter
  },
};
</script>

<style lang="scss">
@import "../../sass/app.scss";

body {
  font-family: Arial, Helvetica, sans-serif;
}
</style>