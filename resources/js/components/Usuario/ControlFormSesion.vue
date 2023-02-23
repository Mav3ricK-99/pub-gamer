<template>
  <div class="container-fluid" style="z-index:999">
    <div class="col-12 col-lg-7 shadow modalRegistro">
      <div class="d-flex">
        <util-img width="512px" height="720px" src="pixelart.jpg" />
        <div class="form-container col-7 pt-3 pb-3 d-flex justify-content-evenly flex-column">
          <Transition name="slide-up">
            <component class="componenteFormulario col-7" :is="formulario"></component>
          </Transition>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import formularioRegistro from "./FormularioRegistro.vue";
import formularioIngreso from "./FormularioIngreso.vue";
import utilImg from "../Util/Imagen.vue";
import { useStore } from "vuex";
import { computed } from "vue";

export default {
  setup() {
    const store = useStore();
    return {
      formulario: computed(() => store.state.formulario),
    };
  },
  components: {
    formularioRegistro,
    formularioIngreso,
    utilImg,
  },
};
</script>
<style scoped lang="sass">
.componenteFormulario
  position: absolute

.v-enter-active, .v-enter-to
  position: absolute
  z-index: 999

.slide-up-enter-active, .slide-up-leave-active
  transition: all 1s ease-out

.slide-up-enter-from
  opacity: 0
  transform: translateX(35px)

.slide-up-leave-to
  opacity: 0
  transform: translateX(-35px)

.modalRegistro
  flex: 0 0 auto
  position: fixed
  padding: 0
  top: 10rem
  z-index: 99
  left: 50%
  transform: translateX(-50%)

.form-container
  background: $formBgrnUserSessionForm
  border-top-right-radius: .25rem
  border-bottom-right-radius: .25rem
</style>