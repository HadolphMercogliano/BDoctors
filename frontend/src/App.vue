<script>
import AppHeader from "./components/partials/AppHeader.vue";

export default {
  data() {
    return {
      title: "BDoctors",
    };
  },
  components: { AppHeader },
};
</script>
<template>
  <AppHeader></AppHeader>
  <router-view></router-view>
</template>

<style lang="scss"></style>
