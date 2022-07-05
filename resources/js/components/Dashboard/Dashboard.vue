<template>
  <section>
    <SliderComponent class="shadow" />
    <hr class="hrRojo hrHorizontal" />
  </section>
  <div class="container-fluid">
    <div class="row justify-content-center backgroundDashboard">
      <div ref="mainRow" class="row">
        <div class="col-6 d-flex justify-content-center mt-5">
          <Transition name="slide-chico">
            <p v-if="mostrarChicos">
              <Imagen src="pibe1.svg" class="chicosArcade" />
            </p>
          </Transition>

          <div class="d-flex flex-column">
            <h2 id="tituloDashboard" class="noselect">
              Aqui comienza tu sesion de juegos
            </h2>
            <Transition name="slide-chica">
              <p v-if="mostrarChicos">
                <Imagen src="pibe2.svg" class="chicosArcade" />
              </p>
            </Transition>
          </div>
        </div>

        <div class="col-separador d-flex justify-content-center">
          <hr
            class="hrRojo hrVertical"
            :class="{ hrVerticalActive: mostrarChicos }"
          />
        </div>

        <div class="col-5 mt-5 flex-fill">
          <ProductosHotSale />
        </div>
      </div>
    </div>
    <div class="row justify-content-around backgroundSeccionRecomendaciones">
      <div>
        <hr
          ref="hrSeparadorChicos"
          :class="{ hrChicosActive: hrChicosEsVisible }"
          class="hrRojo hrSeparadorChicos"
        />
      </div>
      <div class="row mt-5 justify-content-around pb-4">
        <RecomendacionesDashboard />
        <Imagen
          class="col-5 imagenRecomendaciones"
          src="imagenRecomendaciones.png"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Imagen from "./../Util/Imagen.vue";
import Layout from "../Layouts/AppLayout.vue";
import SliderComponent from "./SliderComponent.vue";
import ProductosHotSale from "./ProductosHotSale.vue";
import RecomendacionesDashboard from "./RecomendacionesDashboard.vue";

import { useElementVisibility } from "@vueuse/core";
import { ref } from "vue";

export default {
  setup() {
    const hrSeparadorChicos = ref(null);
    const hrChicosEsVisible = useElementVisibility(hrSeparadorChicos);

    return {
      hrSeparadorChicos,
      hrChicosEsVisible,
    };
  },
  data() {
    return {
      mostrarChicos: false,
    };
  },
  layout: Layout,
  components: {
    SliderComponent,
    ProductosHotSale,
    RecomendacionesDashboard,
    Imagen,
  },
  mounted() {
    window.addEventListener("load", () => (this.mostrarChicos = true));
  },
};
</script>

<style lang="sass" scoped>
.backgroundDashboard
    background-image: url('@/../img/dashboard.png')
    background-repeat: no-repeat
    background-size: 100%

.col-separador
    width: auto
    padding: 0

.hrVertical
    height: 0%
    width: 10px
    transition: height .45s ease-in

.hrSeparadorChicos
    width: 0
    margin-left: -.75rem !important
    height: 10px

.hrHorizontal
    margin: 0
    width: 100%
    height: 10px

.hrChicosActive
    transition: width .45s ease-out
    width: -webkit-calc(50% + 1.4rem)

.hrVerticalActive
    height: 100%

.hrRojo
    margin: 0
    padding: 0
    opacity: 100
    background-color: $secondaryColor

.chicosArcade
    min-width: 400px

.backgroundSeccionRecomendaciones
    background-color: #1C232B

.imagenRecomendaciones
    border-radius: 3px
    -webkit-box-shadow: 2px 1px 50px 20px rgba(0,0,0,0.35)
    box-shadow: 2px 1px 50px 20px rgba(0,0,0,0.35)

#tituloDashboard
    font-family: Lato
    font-size: 68px
    color: white

.slide-chico-enter-active
    transition: all 0.55s ease-out

.slide-chico-leave-active
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1)

.slide-chico-enter-from,
.slide-chico-leave-to
    transform: translateX(-50px)
    opacity: 0

.slide-chica-enter-active
    transition: all 0.55s ease-out

.slide-chica-leave-active
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1)

.slide-chica-enter-from,
.slide-chica-leave-to
    transform: translateY(50px)
    opacity: 0
</style>
