<template>
  <div class="navBox sticky-top">
    <div class="col-10 d-flex flex-row justify-content-around align-items-center">
      <img :src="logo" />
      <div
        class="
          d-flex
          justify-content-around
          align-items-center
          flex-fill
          botones
        "

      >
        <MenuProductos/>
        <Link href="./usuario">
          <button class="navButton">Ofertas</button>
        </Link>

        <Link href="./ayuda">
          <button class="navButton">Ayuda</button>
        </Link>
      </div>
      <div class="d-flex align-items-center">
        <InputBusqueda />
        <div
          v-if="this.isLogueado"
          class="
            col-lg-2
            d-flex
            flex-row
            align-items-center
            justify-content-evenly
          "
        >
          <img width="26" :src="notif" />
          <PerfilDropDown />
        </div>
        <div v-else class="d-flex flex-column align-items-center">
          <button v-on:click="setFormulario('formularioRegistro')" ref="registro" class="buttonReg mb-1">Registrarse</button>
          <span class="spanInicioSesion">¿Ya formas parte del Pub? <span role='button' ref="inicio" v-on:click="setFormulario('formularioIngreso')">Inicia sesion</span></span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import logo from "../../logos/pubgamer.png";
import notification from "../../logos/notification.png";
import InputBusqueda from "./NavComponents/InputBusqueda.vue";
import MenuProductos from "./NavComponents/MenuProductos.vue";
import PerfilDropDown from "./Usuario/PerfilDropdown.vue";

import { computed } from 'vue'
import { useStore } from 'vuex'

export default {
  setup() {
    const store = useStore()
    return {

      usuario: computed(() => store.state.usuario),
      isLogueado: computed(() => store.state.isLogueado),

      setFormulario: (formulario) => store.commit("setFormulario", formulario),
    }
  },
  data() {
    return {
      logo: logo,
      notif: notification,
    };
  },
  name: "Header",
  components: {
    Link,
    InputBusqueda,
    PerfilDropDown,
    MenuProductos,
  },
};
</script>

<style lang="sass" scoped>
.botones
  max-width: 600px

.navContent
  width: 70vw

.navBox
  width: 100%
  height: auto
  background: $navBackground
  display: flex
  justify-content: center
  box-shadow: 0 .5rem 1rem rgba(0,0,0,0.25)!important

.spanInicioSesion
  font-family: Lato
  font-size: .95rem
  color: $navColor
  cursor: default

.buttonReg
  font-size: $navButonFontsize
  font-family: core-sans
  background: $navButtonBackground
  color: $navColor
  padding-left: 1.6rem
  padding-right: 1.6rem
  padding-top: 0.45rem
  padding-bottom: 0.45rem
  border: none
  outline: none
  cursor: pointer
  border-radius: $navButonBorderRadius
</style>

