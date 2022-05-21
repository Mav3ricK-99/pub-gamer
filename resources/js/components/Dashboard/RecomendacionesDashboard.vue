<template>
  <div class="col-11" v-for="index in 3" :key="index">
      <Recomendacion/>
  </div>
</template>

<script>
import Recomendacion from "../Productos/Recomendacion.vue";
export default {
  components: {
    Recomendacion,
  },
};
</script>

<style>
</style>