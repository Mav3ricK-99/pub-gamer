<template>
  <swiper
    :spaceBetween="30"
    :centeredSlides="true"
    :autoplay="{
      delay: 3000,
      disableOnInteraction: false,
    }"
    :navigation="true"
    :modules="modules"
    class="mySwiper"
  >
    <swiper-slide><Imagen height="590px" width="100vw" src="slider1.png"/></swiper-slide>
    <swiper-slide><Imagen height="590px" width="100vw" src="slider2.jpg"/></swiper-slide>
    <swiper-slide><Imagen height="590px" width="100vw" src="slider3.png"/></swiper-slide>
    <swiper-slide><Imagen height="590px" width="100vw" src="slider4.png"/></swiper-slide>
  </swiper>
</template>
<script>
import Imagen from "./../Util/Imagen.vue"
import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";
import "swiper/css/navigation";


// import required modules
import { Autoplay, Navigation } from "swiper";

export default {
  components: {
    Swiper,
    SwiperSlide,
    Imagen,
  },
  setup() {
    return {
      modules: [Autoplay, Navigation],
    };
  },
};
</script>
<style lang="sass">
.swiper
    background: $navButtonBackgroundDarker

.swiper-button-prev, .swiper-button-next
    color: $primaryColor


</style>
