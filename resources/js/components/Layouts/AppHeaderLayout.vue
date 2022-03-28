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
      >
        <Splitbutton
          styleClass="p-tieredmenu"
          class="navButton"
          label="Productos"
          :model="getProductosItems(prod)"
        />
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
        <div v-if="isLogueado">
          <img width="26" :src="notif" />

          <button class="navButton ms-3">Perfil</button>
        </div>
        <div v-else class="d-flex flex-column align-items-center">
          <span class="ctrlSesion text-white fs-5"> Iniciar sesion </span>
          <hr class="m-0 w-100 text-white" />
          <span v-on:click="mostrarRegistro()" class="ctrlSesion text-white fs-5"> Registrarse </span>
        </div>
      </div>
    </div>
  </div>

  <Registro v-if="formularioRegistro" />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import logo from "../../../logos/pubgamer.png";
import notification from "../../../logos/notification.png";
import InputBusqueda from "../InputBusqueda.vue";
import Splitbutton from "primevue/splitbutton";
import Registro from "../Usuario/Registro.vue";

let productos;
export default {
  data() {
    return {
      logo: logo,
      notif: notification,
      prod: [
        {
          label: "File",
          icon: "pi pi-fw pi-file",
          items: [],
        },
      ],
      isLogueado: false,
      formularioRegistro: true,
    };
  },
  name: "AppHeaderLayout",
  components: {
    Link,
    InputBusqueda,
    Splitbutton,
    Registro,
  },
  methods: {
    getProductosItems: function (xd) {
      xd[0].items = [
        {
          label: "XD",
          icon: "pi pi-fw pi-file",
          style: "border:none;padding:0",
          class: "bg-[#272e4f] navButton",
        },
      ];
      return xd;
    },
    mostrarRegistro: function () {
      this.formularioRegistro = true;
    },
  },
};
</script>

<style lang="scss" scoped>
.navContent {
  width: 70%;
}

.navBox {
  background: #2c365d;
}

.ctrlSesion {
  font-family: core-sans;
  cursor: pointer;
}

.navButton {
  border: none;
  outline: none;
  background: #272e4f;
  color: #f2f2f0;
  font-family: core-sans;
  font-size: 1.125rem;
  line-height: 1.75rem;
  padding-left: 1rem; /* 16px */
  padding-right: 1rem; /* 16px */
  padding-top: 0.375rem; /* 6px */
  padding-bottom: 0.375rem; /* 6px */
  border-radius: 0.375rem;
}

::v-deep(.navButton) {
  .p-button {
    border: none;
    outline: none;
    background: #272e4f;
    color: #f2f2f0;
    font-family: core-sans;
    font-size: 1.125rem;
    line-height: 1.75rem;
    padding-left: 1rem; /* 16px */
    padding-right: 1rem; /* 16px */
    padding-top: 0.375rem; /* 6px */
    padding-bottom: 0.375rem; /* 6px */
  }

  .p-button:focus {
    box-shadow: none;
  }

  .p-menu {
    background: red;
  }

  .p-submenu-list {
    background: red;
  }
}
</style>

