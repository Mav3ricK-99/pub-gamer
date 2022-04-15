<template>
  <Header
    :formularioRegistro="formularioRegistro"
    @mostrarRegistro="mostrarRegistro"
  />
  <Registro v-if="formularioRegistro" />
  <slot />
</template>

<script>
import Header from "../Header.vue";
import Registro from "../Usuario/Registro.vue";

export default {
  data() {
    return {
      formularioRegistro: false,
      messages: [],
    };
  },
  components: {
    Header,
    Registro,
  },
  methods: {
    mostrarRegistro: function (toggle) {
      this.formularioRegistro = toggle;
    },
  },
};
</script>