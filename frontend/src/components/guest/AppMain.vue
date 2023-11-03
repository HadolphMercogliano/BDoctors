<script>
import axios from "axios";

export default {
  data() {
    return {
      doctors: [],
    };
  },
  created() {
    this.fetchDoctors();
  },
  methods: {
    fetchDoctors() {
      axios.get("http://127.0.0.1:8000/api/doctors").then((response) => {
        this.doctors = response.data.doctors;
        // console.log(this.restaurants);
      });
    },
  },
};
</script>
<template>
  <main class="pt-5">
    BDoctors main
    <div v-for="doctor in doctors"></div>
  </main>
</template>

<style lang="scss" scoped>
main {
  height: 100vh;
}
</style>
