<template>
    <div class="contenedorMarcas">
        <h3 id="tituloMarcas" class="mb-3">Estas son las marcas con las que trabajamos</h3>

        <swiper class="sliderMarcas" :spaceBetween="22" :slides-per-view="10" :centeredSlides="true" :loop="true"
            :autoplay="{
                delay: 1,
                disableOnInteraction: false,
            }" :speed="3000" :navigation="false" :modules="modules">
            <!-- Imagen esta tomando de public yno resource, sera que hay que importarlo primero? -->
            <!-- creo que es un tema del compilador de npm -->
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
            <swiper-slide>
                <Imagen width="128" height="128" src="nvidia-logo.png" />
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import Imagen from "./../Util/Imagen.vue";
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

<style lang="sass" scoped>
.contenedorMarcas
    padding: 2.5rem
    background-color: #181E23

#tituloMarcas
    font-family: 'Nunito-Bold'
    color: white
    font-size: 36px
</style>

<style>
.sliderMarcas .swiper-wrapper {
    transition-timing-function: linear
}
</style>