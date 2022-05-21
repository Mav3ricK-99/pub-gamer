<template>
    <div class="search me-3">
      <input
        type="text"
        v-model="busqueda"
        @keyup="resultadoBusqueda()"
        placeholder="Busqueda"
      />
      <div class="symbol">
        <svg class="cloud">
          <use xlink:href="#cloud" />
        </svg>
        <svg class="lens">
          <use xlink:href="#lens" />
        </svg>
      </div>
    </div>

    <!-- SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="cloud">
        <path
          d="M31.714,25.543c3.335-2.17,4.27-6.612,2.084-9.922c-1.247-1.884-3.31-3.077-5.575-3.223h-0.021
	C27.148,6.68,21.624,2.89,15.862,3.931c-3.308,0.597-6.134,2.715-7.618,5.708c-4.763,0.2-8.46,4.194-8.257,8.919
	c0.202,4.726,4.227,8.392,8.991,8.192h4.873h13.934C27.784,26.751,30.252,26.54,31.714,25.543z"
        />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="lens">
        <path
          d="M15.656,13.692l-3.257-3.229c2.087-3.079,1.261-7.252-1.845-9.321c-3.106-2.068-7.315-1.25-9.402,1.83
	s-1.261,7.252,1.845,9.32c1.123,0.748,2.446,1.146,3.799,1.142c1.273-0.016,2.515-0.39,3.583-1.076l3.257,3.229
	c0.531,0.541,1.404,0.553,1.95,0.025c0.009-0.008,0.018-0.017,0.026-0.025C16.112,15.059,16.131,14.242,15.656,13.692z M2.845,6.631
	c0.023-2.188,1.832-3.942,4.039-3.918c2.206,0.024,3.976,1.816,3.951,4.004c-0.023,2.171-1.805,3.918-3.995,3.918
	C4.622,10.623,2.833,8.831,2.845,6.631L2.845,6.631z"
        />
      </symbol>
    </svg>

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
        } else {
          this.productos = [];
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
<style lang="sass">
.search
  --text-color: var(--var-busquedaNavLupaHover)
  --primary-color: var(--var-busquedaNavBackground)
  --border-radius:3px
  --width:200px
  --height:50px
  background: var(--primary-color)
  width: auto
  height: var(--height)
  position: relative
  overflow: hidden
  border-radius: var(--border-radius)
  -webkit-box-shadow: $navButonBoxShadow
  box-shadow: $navButonBoxShadow
  display: flex
  justify-content: center
  align-items: center
  

  input[type="text"]
    position: relative
    width: var(--height)
    height: var(--height)
    font: 400 18px core-sans, sans-serif
    color: var(--text-color)
    background: $busquedaNavInputBackground
    border: 0
    box-sizing: border-box
    outline: none
    padding: 0 0 0 38px
    transition: width 0.6s ease
    z-index: 10
    opacity: 0
    cursor: pointer

    &::placeholder 
      color: $navColor
      opacity: 1
    
    &:focus
      z-index: 0
      opacity: 1
      width: var(--width)

      ~ .symbol
        &::before
          width: 0%

        &:after
          clip-path: inset(0% 0% 0% 100%)
          transition: clip-path 0.04s linear 0.105s

        .cloud
          top: -30px
          left: -30px
          transform: translate(0, 0)
          transition: all 0.6s ease

        .lens
          top: 17.5px
          left: 12px
          transform: translate(0, 0)
          fill: var(--var-busquedaNavLupaHover)
          transition: top 0.5s ease 0.1s, left 0.5s ease 0.1s, fill 0.3s ease

  .symbol
    height: 100%
    width: 100%
    position: absolute
    top: 0
    z-index: 1
    display: flex
    justify-content: center
    align-items: center

    &:before
      content: ""
      position: absolute
      right: 0
      width: 100%
      height: 100%
      background: var(--primary-color)
      z-index: -1
      transition: width 0.6s ease

    &:after
      content: ""
      position: absolute
      top: 21px
      left: 21px
      width: 20px
      height: 20px
      border-radius: 50%
      background: var(--primary-color)
      z-index: 1
      clip-path: inset(0% 0% 0% 0%)
      transition: clip-path 0.04s linear 0.225s

    .cloud, .lens
      position: absolute
      fill: $busquedaNavNubeBackground
      stroke: none
      top: 50%
      left: 50%

    .cloud
      width: 35px
      height: 32px
      transform: translate(-50%, -60%)
      transition: all 0.6s ease

    .lens
      fill: $busquedaNavNubeBackground
      width: 16px
      height: 16px
      z-index: 2
      top: 24px
      left: 24px
      transition: top 0.3s ease, left 0.3s ease, fill 0.2s ease 0.2s
</style>