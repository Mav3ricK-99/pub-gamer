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
        style="width: 40%"
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
          v-if="this.usuario"
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
          <span class="ctrlSesion text-white fs-5"> Iniciar sesion </span>
          <hr class="m-0 w-100 text-white" />
          <span
            v-on:click="toggleRegistro()"
            class="ctrlSesion text-white fs-5"
          >
            Registrarse
          </span>
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
import { onUpdated } from "vue";

import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

let productos;

export default {
  setup() {
    onUpdated(() => {
      //When te logueas
      //console.log(usePage().props.value.usuario);
    });
    const usuario = computed(() => usePage().props.value.usuario);
    return { usuario };
  },
  props: {
    formularioRegistro: {
      type: Boolean,
    },
  },
  data() {
    return {
      logo: logo,
      notif: notification,
      productos: [],
    };
  },
  name: "Header",
  methods: {
    toggleRegistro: function () {
      this.$emit("mostrarRegistro", !this.formularioRegistro);
    },
  },
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
  background: #2c365d
.ctrlSesion
  font-family: core-sans
  cursor: pointer
.navButton
  border: none
  outline: none
  background: #272e4f
  color: #f2f2f0
  font-family: core-sans
  font-size: 1.125rem
  line-height: 1.75rem
  padding-left: 1.3rem
  padding-right: 1.3rem
  padding-top: 0.45rem
  padding-bottom: 0.45rem
  border-radius: 0.4rem

::v-deep(.navButton)
  .p-button
    border: none
    outline: none
    background: #272e4f
    color: #f2f2f0
    font-family: core-sans
    font-size: 1.125rem
    line-height: 1.75rem
    padding-left: 1rem
    padding-right: 1rem
  .p-button
    &:focus
      box-shadow: none

</style>

