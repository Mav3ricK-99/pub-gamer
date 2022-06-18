<template>
  <Header ref="header" />
  <Transition>
    <ControlFormSesion v-if="mostrarFormulario" v-click-outside="cerrarModal" />
  </Transition>
  <slot />
</template>

<script>
import Header from "../Header.vue";
import ControlFormSesion from "../Usuario/ControlFormSesion.vue";

import vClickOutside from "click-outside-vue3";

import { useStore } from "vuex";
import { computed, onMounted, onUpdated } from "vue";

export default {
  setup() {
    const store = useStore();

    onMounted(() => {
      store.commit("setUsuario");
    });
    onUpdated(() => {
      store.commit("setUsuario");
    });

    return {
      mostrarFormulario: computed(() => store.state.mostrarFormulario),
      formulario: computed(() => store.state.formulario),
      usuario: computed(() => store.state.usuario),

      setMostrarFormulario: (value) =>
        store.commit("setMostrarFormulario", value),
      setFormulario: (formulario) => store.commit("setFormulario", formulario),
    };
  },
  directives: {
    clickOutside: vClickOutside.directive,
  },
  methods: {
    cerrarModal: function (event) {
      let botonRegistrarse = this.$refs["header"].$refs["registro"];
      let botonInicio = this.$refs["header"].$refs["inicio"];
      if (event.target != botonRegistrarse && event.target != botonInicio) {
        this.setMostrarFormulario(false);
      }
    },
  },
  components: {
    Header,
    ControlFormSesion,
  },
};
</script>

<style lang="sass" scoped>
.v-enter-active, .v-leave-active
  transition: opacity 0.25s ease

.v-enter-from, .v-leave-to
  opacity: 0
</style>
