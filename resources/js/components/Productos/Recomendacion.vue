<template>
  <div class="d-flex flex-column divReco">
    <h4 class="nombreReco">Simon dice</h4>
    <div class="col-8 align-self-center">
      <blockquote class="textoReco">XDDDDDDD</blockquote>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      recomendacion: {
        nombreUsuario: "FG",
        puntuacion: 4,
      },
    };
  },
};
</script>

<style lang="sass" scoped>
.divReco
    background-color: $navButtonBackgroundDarker
    margin-bottom: 4rem
    padding: 1rem
    font-family: "Lato"
    border-box: 5px
    -webkit-box-shadow: 3px 1px 6px 2px rgba(59,17,213,0.1)
    box-shadow: 3px 1px 6px 2px rgba(59,17,213,0.1)

.nombreReco
    font-size: 28px

.textoReco
    font-size: 18px

blockquote::before
    content: open-quote

blockquote::after
    content: close-quote

blockquote
    quotes: "“" "”" "‘" "’"
</style>