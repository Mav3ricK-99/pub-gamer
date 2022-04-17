<template>
  <div class="me-5">
    <b-input-group size="sm">
      <b-form-input
        class="i-busqueda pt-2 ps-2 pb-2"
        type="search"
        v-model="busqueda"
        @keyup="resultadoBusqueda()"
        placeholder="Busqueda"
      ></b-form-input>
      <b-input-group-append>
        <b-button class="botonBusqueda">
          <BootstrapIcon size="md" icon="search" />
        </b-button>
      </b-input-group-append>
    </b-input-group>

    <b-card-group
      v-if="productos.length > 0"
      class="position-absolute d-flex flex-column"
    >
      <b-card
        v-for="prod in productos"
        :key="prod.id"
        no-body
        class="mt-2"
        style="z-index: 100"
      >
        <Link :href="'/publicacion/' + prod.id" as="b-row" type="button">
          <div
            class="d-flex flex-row"
            style="max-width: 512px; min-width: 256px"
          >
            <b-card-img
              style="width: 150px"
              :src="prod.imagen"
              class="rounded-0"
            ></b-card-img>

            <b-card-body class="d-flex flex-column">
              <b-card-title
                class="fs-5"
                v-text="prod.nombreProducto"
              ></b-card-title>
              <b-card-text class="text-muted" v-text="prod.descripcion">
              </b-card-text>
            </b-card-body>
          </div>
        </Link>
      </b-card>
    </b-card-group>
  </div>
</template>

<script>
import InputText from "primevue/inputtext";
import { Link } from "@inertiajs/inertia-vue3";
import BootstrapIcon from "@dvuckovic/vue3-bootstrap-icons";

export default {
  data() {
    return {
      busqueda: null,
      productos: [],
      query: 2,
    };
  },
  methods: {
    resultadoBusqueda: function () {
      if (this.timer) {
        clearTimeout(this.timer);
        this.timer = null;
      }
      this.timer = setTimeout(() => {
        if (this.busqueda != "") {
          axios
            .get("/busqueda/productos/" + this.busqueda)
            .then((resultado) => {
              this.productos = resultado.data;
            })
            .catch((error) => console.log(error));
        }else{
          this.productos = []
        }
      }, 1000);
    },
  },
  name: "InputBusqueda",
  components: {
    InputText,
    Link,
    BootstrapIcon,
  },
};
</script>

<style lang="sass" scoped>
.i-busqueda
  font-family: Lato
  width: 8rem
  -webkit-transition: width .200s ease-in-out
  -moz-transition: width .200s ease-in-out
  -o-transition: width .200s ease-in-out
  transition: width .200s ease-in-out

  border-left: 1px solid $azulNavOscuro
  border-top: 1px solid $azulNavOscuro
  border-bottom: 1px solid $azulNavOscuro
  border-right: 1px solid $azulNavOscuro

.i-busqueda:hover
  width: 11rem

.i-busqueda:focus
  width: 11rem
  border-left: 1px solid $azulNavOscuro
  border-top: 1px solid $azulNavOscuro
  border-bottom: 1px solid $azulNavOscuro
  border-right-color: $azulNavOscuro
  box-shadow: none
  transition: width .50s ease-in-out

.botonBusqueda
  background: $azulNav
  border-right: 1px solid $azulNavOscuro
  border-top: 1px solid $azulNavOscuro
  border-bottom: 1px solid $azulNavOscuro

.botonBusqueda:focus
  box-shadow: none
</style>