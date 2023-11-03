<script>
import { store } from "../../data/store";
import axios from "axios";

export default {
  name: "AppDoctorShow",

  data() {
    return {
      store,
      doctor: {},
    };
  },
  created() {
    axios.get(`http://127.0.0.1:8000/api/doctors/${this.$route.params.id}`).then((response) => {
      this.doctor = response.data.results[0];
    });
  },
};
</script>

<template>
  <div class="mt-5">{{ this.doctor }}</div>
  <div class="ms_card text-center">
    <div class="card-body mt-1 p-1">
      <img :src="this.doctor.photo" alt="" />
      <h5 class="card-title fw-bold mb-2 mt-2">{{ this.doctor.name }} {{ this.doctor.surname }}</h5>
    </div>
    <div>{{ this.doctor.address }}</div>
    <div class="mt-3 d-flex justify-content-center"></div>
  </div>
</template>

<style lang="scss" scoped></style>
