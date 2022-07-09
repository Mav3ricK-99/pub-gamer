<template>
  <Transition name="slide-fade">
    <div v-if="mostrarProductosHotSale" class="hotSaleDiv d-flex flex-column">
      <h3 class="tituloHotSale noselect">Lo mas vendido</h3>
      <div
        class="d-flex flex-row flex-md-wrap justify-content-around mt-5 mb-4"
      >
        <!-- SWIPPER TIENE MEDIA QUERY INTEGRADA AL COMPONENTE - revisar!-->
        <swiper
          :centeredSlides="true"
          :centeredSlidesBounds="true"
          :autoplay="{
            delay: 5000,
            disableOnInteraction: false,
          }"
          :navigation="true"
          :modules="modules"
          :slides-per-view="3"
          :space-between="120"
          virtual
          class="sliderProductos"
        >
          <swiper-slide
            v-for="(producto, index) in productosMasVendidos"
            :key="index"
            :virtualIndex="index"
            ><CardProductos :producto="producto"
          /></swiper-slide>
        </swiper>
      </div>
    </div>
  </Transition>
</template>

<script>
import CardProductos from "../Productos/CardProductos.vue";

import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";
import "swiper/css/navigation";

import { Autoplay, Navigation, Virtual } from "swiper";

export default {
  setup() {
    return {
      modules: [Autoplay, Navigation, Virtual],
    };
  },
  data() {
    return {
      mostrarProductosHotSale: false,
      productosMasVendidos: [],
    };
  },
  mounted() {
    setTimeout(() => {
      this.mostrarProductosHotSale = true;
    }, 550);

    this.getProductosMasVendidos();
  },
  methods: {
    getProductosMasVendidos: function () {
      axios.get("api/producto/").then((response) => {
        this.productosMasVendidos = response.data;
        //Falta catchear los errores
      });
    },
  },
  components: {
    CardProductos,
    Swiper,
    SwiperSlide,
  },
};
</script>

<style lang="sass" scoped>
.tituloHotSale
    font-size: 55px
    text-align: center
    color: #fff
    align-self: center
    text-shadow: 3px 3px 3px $secondaryColorLighter
    padding-bottom: 1rem
    border-bottom: 3px solid $secondaryColorLighter
    letter-spacing: 1.7px

.slide-fade-enter-active
    transition: all 0.3s ease-out

.slide-fade-leave-active
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1)

.slide-fade-enter-from, .slide-fade-leave-to
    transform: translateX(80px)
    opacity: 0

.sliderProductos
    width: 100vw
    background: transparent
</style>
<style lang="sass">
.sliderProductos .swiper-button-prev, .sliderProductos .swiper-button-next
    color: $secondaryColor
</style>
