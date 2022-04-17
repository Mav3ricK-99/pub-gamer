<template>
  <div class="row justify-content-center">
    <div class="col-lg-7 position-fixed d-flex shadow modalRegistro" >
      <div class="flex-fill bg-cover"></div>
      <div
        class="
          form-container
          col-lg-7
          pt-3
          pb-3
          d-flex
          justify-content-evenly
          flex-column
        "
        style="min-height:27rem"
      >

        <Transition name="slide-up">
          <component class="componenteFormulario" :is="formulario"></component>
        </Transition>
      </div>
    </div>
  </div>
</template>
<script>
import formularioRegistro from "./FormularioRegistro.vue";
import formularioIngreso from "./FormularioIngreso.vue";
import { useStore } from 'vuex'
import { computed } from 'vue'

export default {
  setup() {
    const store = useStore()
    return {
      formulario: computed(() => store.state.formulario),
    }
  },
  components: {
    formularioRegistro,
    formularioIngreso,
  },
}
</script>
<style scope lang="sass">
.componenteFormulario
  position: absolute
  top: 2rem

.slide-up-enter-active, .slide-up-leave-active
  transition: all 1s ease-out

.slide-up-enter-from
  opacity: 0
  transform: translateX(35px)

.slide-up-leave-to
  opacity: 0
  transform: translateX(-35px)

.modalRegistro
  max-height: 750px
  padding: 0
  top: 12rem
  z-index: 99

.bg-cover
  width: 100%
  max-height: 100%
  background: url("@/../img/pixelart.jpg") no-repeat center
  background-size: cover
  border-top-left-radius: .25rem
  border-bottom-left-radius: .25rem

.form-container
  background: $azulForm
  border-top-right-radius: .25rem
  border-bottom-right-radius: .25rem
</style>