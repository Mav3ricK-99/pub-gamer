<template>
  <section>
    <SliderComponent class="shadow" />
    <hr class="hrSliderSeparador" />
  </section>
  <div
    class="container-fluid backgroundDashboard"
  >
    <div class="row justify-content-center">
      <div ref="mainRow" class="row">

        <div class="col-6 d-flex justify-content-center mt-5">
          <Imagen src="pibe1.svg" class="chicosArcade"/>
          <div class="d-flex flex-column">
            <h2 id="tituloDashboard" class="noselect">Aqui comienza tu sesion de juegos</h2>
          <Imagen src="pibe2.svg" class="chicosArcade" />
          </div>
        </div>

        <div class="col-1 d-flex justify-content-center">
          <hr ref="hrSeparador" class="hrSeparador" />
        </div>

        <div class="col-5 mt-5">
          <ProductosHotSale />
        </div>

        <!--<div class="col-6 flex-fill mt-5">
            Los comentarios que vayan de abajo para arriba uno detras del otro
            <RecomendacionesDashboard/>
          </div>!-->
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

export default {
  layout: Layout,
  components: {
    SliderComponent,
    ProductosHotSale,
    RecomendacionesDashboard,
    Imagen,
  },
  mounted() {
    window.addEventListener("load", () => {
      this.$refs.hrSeparador.style.height = "100%";
    });
  },
};
</script>

<style lang="sass" scoped>
.backgroundDashboard
    background-image: url('@/../img/dashboard.png')
    background-repeat: no-repeat
    background-size: 100%

.hrSeparador
    margin: 0
    height: 0%
    width: 10px
    background-color: $secondaryColor
    opacity: 100
    transition: height .5s ease-in

.hrSliderSeparador
    margin: 0
    width: 100%
    height: 10px
    background-color: $secondaryColor
    opacity: 100

.chicosArcade
    min-width:400px

#tituloDashboard
    font-family: Lato
    font-size: 65px
    color: white
</style>
