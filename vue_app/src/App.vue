<template>
  <div>
    <div id="loader"></div>
    <Home msg="Welcome to Your Vue.js App" />
  </div>
</template>

<script>
import Home from "./components/Home.vue";

export default {
  components: {
    Home,
  },
};
</script>
<style>
#loader {
  position: fixed;
  width: 100%;
  height: 100vh;
  z-index: 1;
  overflow: visible;
  display: none;
  background: rgba(238, 238, 238, 0.5) url("../public/loader.gif") no-repeat
    center center;
}
</style>

