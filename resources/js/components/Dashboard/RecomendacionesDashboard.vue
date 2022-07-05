<template>
  <div class="col-6 d-flex flex-column">
    <h3 class="tituloRecomendaciones" ref="tituloRecosRef">
      Asi nos evaluaron nuestros clientes hoy
    </h3>
    <div class="seccionRecos d-flex flex-column justify-content-around">
      <TransitionGroup name="slide-reco">
        <div v-for="producto in productos" v-show="mostrarRecomendaciones" :key="producto">
          <Recomendacion :producto="producto"/>
        </div>
      </TransitionGroup>
    </div>
  </div>
</template>

<script>
import Recomendacion from "../Productos/Recomendacion.vue";

import { useElementVisibility } from "@vueuse/core";
import { ref } from "vue";
export default {
  setup() {
    const tituloRecosRef = ref(null);
    const tituloRecosEsVisible = useElementVisibility(tituloRecosRef);
    return {
      tituloRecosRef,
      tituloRecosEsVisible,
    };
  },
  data() {
    return {
      mostrarRecomendaciones: this.tituloRecosEsVisible,
      mostrarRecomendacionesLoaded: false,
      productos: [],
    };
  },
  mounted() {
    axios.get("busqueda/productos/2").then((resultado) => {
        console.log(resultado);
        this.productos = resultado.data;
      })
      .catch((error) => console.log(error));
  },
  watch: {
    tituloRecosEsVisible(nuevoValor) {
      const tituloRecosRef = ref(null);
      if (nuevoValor && this.mostrarRecomendacionesLoaded) {
        this.mostrarRecomendaciones = true;
      }
      this.mostrarRecomendacionesLoaded = true; //Con esto eskipeo el primer cambio
    },
  },
  components: {
    Recomendacion,
  },
};
</script>

<style lang="sass" scoped>
.tituloRecomendaciones
    font-size: 46px
    color: white

.seccionRecos
    height: 100%

.slide-reco-enter-active
    transition: all 1s ease-out

.slide-reco-leave-active
    transition: all 1s cubic-bezier(1, 0.5, 0.8, 1)

.slide-reco-enter-from,
.slide-reco-leave-to
    transform: translateY(60px)
    opacity: 0
</style>
