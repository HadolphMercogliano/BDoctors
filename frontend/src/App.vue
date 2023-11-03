<script>
import AppMain from "./components/guest/AppMain.vue";
import AppHeader from "./components/partials/AppHeader.vue";

export default {
  data() {
    return {
      title: "BDoctors",
    };
  },
  components: { AppHeader, AppMain },
};
</script>
<template>
  <AppHeader></AppHeader>
  <router-view></router-view>
  <!-- <AppMain></AppMain> -->
</template>

<style lang="scss"></style>
