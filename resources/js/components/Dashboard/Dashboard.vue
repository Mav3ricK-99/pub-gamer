<template>
  <section>
    <SliderComponent class="shadow" />
    <hr class="hrSliderSeparador">
  </section>
  <div class="container-fluid backgroundMainSection">
    <div class="row justify-content-center">
      <div class="col-xl-11 col-md-12 mainCol" style="height: 1080px">
        <div ref="mainRow" class="row mt-7">
          <div class="col-5">
            <ProductosHotSale />
          </div>

          <div class="col">
            <hr ref="hrSeparator" class="hrSeparador" />
          </div>
          <div class="col-6 flex-fill mt-5">
            <!--Los comentarios que vayan de abajo para arriba uno detras del otro!-->
            <RecomendacionesDashboard/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "../Layouts/AppLayout.vue";
import SliderComponent from "./SliderComponent.vue";
import ProductosHotSale from "./ProductosHotSale.vue";
import RecomendacionesDashboard from "./RecomendacionesDashboard.vue";

export default {
  layout: Layout,
  components: {
    SliderComponent,
    ProductosHotSale,
    RecomendacionesDashboard
  },
  mounted() {
    window.addEventListener("load", () => {
      this.$refs.hrSeparator.style.height = "100%";
    });
  },
};
</script>

<style lang="sass" scoped>
.backgroundMainSection
  background-image: url('@/../img/background.jpg')
  background-repeat: no-repeat
  background-size: 100%

.mainCol

  background-color: rgba(10,13,34,.99)
  color: $primaryColor

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


</style>
