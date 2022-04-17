<template>
  <div class="navBox w-100 d-flex flex-row justify-content-center shadow-sm">
    <div class="w-75 d-flex flex-row justify-content-evenly align-items-center">
      <img :src="logo" width="425" />
      <div
        class="
          d-flex
          flex-row
          justify-content-evenly
          flex-fill
          align-items-center
        "
        style="width: 30%"
      >
        <!-- Habria que hacer el nav de 0 con column, esto de arriba va a romper -!-->
        <MenuProductos/>
        <Link href="./usuario">
          <button class="navButton">Ofertas</button>
        </Link>

        <Link href="./ayuda">
          <button class="navButton">Ayuda</button>
        </Link>
      </div>

      <div
        class="d-flex flex-row justify-content-end align-items-center"
        style="width: 40%"
      >
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
.navContent
  width: 70%

.navBox
  background: $azulNav

.spanInicioSesion
  font-family: Lato
  font-size: .85rem
  color: $colorNav
  cursor: default

.buttonReg
  font-size: $fsizeNav
  font-family: core-sans
  background: $azulNavOscuro
  color: $colorNav
  padding-left: 1.3rem
  padding-right: 1.3rem
  padding-top: 0.45rem
  padding-bottom: 0.45rem
  border: none
  outline: none
  cursor: pointer
  border-radius: $bradiusNav

.navButton
  border: none
  outline: none
  background: $azulNavOscuro
  color: $colorNav
  font-family: core-sans
  font-size: $fsizeNav
  line-height: 1.75rem
  padding-left: 1.3rem
  padding-right: 1.3rem
  padding-top: 0.45rem
  padding-bottom: 0.45rem
  border-radius: $bradiusNav
</style>

