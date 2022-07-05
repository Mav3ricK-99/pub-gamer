<template>
  <div class="d-flex flex-column recomendacion">
    <h4 class="nombreRecomendacion">Simon ha comentado sobre</h4>
    <div class="col-11 d-flex ml-2">
      <Imagen :src="producto.imagen" width="150" height="150" />
      <div>
        <Rating v-model="val" :stars="5" :cancel="false" />
        <blockquote class="textoRecomendacion">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod magni
          deleniti fuga saepe nulla reprehenderit dolor! Aut ut quas mollitia
          aspernatur fugiat, quis facere nihil nobis nisi earum, iure illo.
        </blockquote>
      </div>
    </div>
  </div>
</template>

<script>
import Imagen from "./../Util/Imagen.vue";
import Rating from "primevue/rating";

export default {
  props: {
    producto: Object,
  },
  data() {
    return {
      recomendacion: {
        nombreUsuario: "FG",
        puntuacion: 4,
      },
    };
  },
  components: {
    Imagen,
    Rating,
  },
};
</script>

<style lang="sass">
.recomendacion
    background-color: $primaryColorDarker
    padding: 1rem 0 1rem 1.3rem
    font-family: "Lato"
    border-radius: 3px
    //-webkit-box-shadow: 3px 1px 6px 2px rgba(59,17,213,0.05)
    //box-shadow: 3px 1px 6px 2px rgba(59,17,213,0.05)
    border-left: 4px solid $secondaryColorLigther

.nombreRecomendacion
    color: $secondaryColor
    font-size: 28px
    transition: all .5s

.textoRecomendacion
    font-size: 19px
    color: white
    margin-left: 2rem

blockquote::before
    content: open-quote

blockquote::after
    content: close-quote

blockquote
    quotes: "“" "”" "‘" "’"
</style>

<style lang="sass">
.p-rating
    margin-left: 2rem

.p-rating .p-rating-icon
    color: #3c9dfd !important

    &:focus
        box-shadow: none !important
</style>
