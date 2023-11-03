<script>
import { store } from "../../data/store";

export default {
  name: "AppCard",
  props: {
    data: Object,
  },
  data() {
    return {
      store,
    };
  },
  methods: {
    getIdRedirect(where, who) {
      this.store.selectedDoctor = who;
      this.$router.push({ name: where, params: { slug: who.slug } });
    },
  },
};
</script>

<template>
  <div class="ms_card text-center">
    <div class="card-body mt-1 p-1">
      <h5 class="card-title fw-bold mb-2 mt-2">{{ data.name }} {{ data.surname }}</h5>
      <div v-if="data.doctors" class="overflow-x-auto">
        <span class="ir-badge me-1" v-for="doctor in data.doctors">{{ doctor.name }}</span>
      </div>
      <div v-if="data.address">{{ data.address }}</div>
      <div class="mt-3 d-flex justify-content-center"></div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use "../../scss/variables" as *;

.ms_card {
  width: 288px;

  transition: all 0.2s ease-in-out;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -ms-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;

  &:hover {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
  }
}

img {
  border-radius: 20px;
  width: 288px;
  height: 200px;
  box-shadow: 0px 0px 16px 0px black;
  border: 1px solid $third_color;
}

.ms_btn {
  background-color: $primary_color;
  border-radius: 20px;

  &:hover {
    background-color: #faa856;
    box-shadow: 0px 0px 16px 0px #faa856;
  }
}

@media (max-width: 768px) {
  .ms_card {
    width: calc(100% / 2 - 50px);
  }
  img {
    border-radius: 20px;
    width: 210px;
    height: 130px;
  }
}

@media (max-width: 540px) {
  .ms_card {
    width: 100%;
  }
  img {
    border-radius: 20px;
    width: 288px;
    height: 200px;
  }
}
</style>
