<template>
    <!--Falta media queryyyyss y arreglar precio y stock en <768px!-->
  <div class="col-xl-5 col-md-9 card-prod">
    <Link href="/" as="div">
      <Imagen
        height="170px"
        width="100%"
        src="slider1.png"
        class="imagen-card-prod"
      />
      <div class="contenedorInfoProd noselect">
        <h3 class="tituloCard noselect">
          {{ $attrs.producto.nombreProducto }}
        </h3>
        <div class="d-flex justify-content-center flex-row">
          <div class="col-xl-7 text-center">
            <span class="spanStock">{{ getStock }}</span>
          </div>
          <div class="col-xl-5 text-center">
            <span class="spanPrecio">{{ getPrecio }}</span>
          </div>
        </div>
        <div class="d-flex flex-column">
          <div class="descProducto">
            {{ getDescripcion }}
          </div>
        </div>
      </div>
    </Link>

    <div class="col-12">
      <hr id="hrCardProds" />
      <button class="botonComprar d-flex justify-content-center align-items-center" @click="switchBoton()">
        <div ref="layer" class="layer"><span class="spanBotonCardProd">AGREGADO</span></div>
        <i class="pi pi-plus-circle add-icon" />
        <span class="spanBotonCardProd">COMPRAR</span>
      </button>
    </div>
  </div>
</template>

<script>
import Imagen from "../Util/Imagen.vue";
import { Link } from '@inertiajs/vue3';

export default {
  computed: {
    getStock() {
      let mensajeDeStock;
      let cantidadStock = this.$attrs.producto.stock;
      if (cantidadStock < 5) {
        mensajeDeStock = "Ya casi se agotan!";
      } else if (cantidadStock > 4 && cantidadStock < 10) {
        mensajeDeStock = "Quedan pocas!";
      } else if (cantidadStock > 10) {
        mensajeDeStock = cantidadStock + " disponibles";
      }

      return mensajeDeStock;
    },
    getPrecio() {
      return "$" + this.$attrs.producto.stock;
    },
    getDescripcion() {
      return this.$attrs.producto.descripcion.replace(/^(.{25}[^\s]*).*/, "$1");
    },
  },
  methods: {
      switchBoton: function () {
          this.$refs.layer.style.top = "0px"
          setTimeout(() => {
              this.$refs.layer.style.top = "-70px"
          }, 2200);
      }
  },
  components: {
    Imagen,
    Link,
  },
};
</script>

<style lang="sass" scoped>
.card-prod
    border-radius: 4px
    background: $backgroundCard
    min-width: 15vw

.tituloCard
    color: $primaryColorLighter
    font-size: 41px
    text-align: center
    text-shadow: 1px 3px 6px rgba(0,24,130,0.30)
    font-family: "Lato"

.imagen-card-prod
    border-top-left-radius: 4px
    border-top-right-radius: 4px

.spanPrecio, .spanStock
    font-family: "Lato"
    font-size: 19px
    text-align: center

.spanPrecio
    color: $secondaryColorLighter
    text-shadow: 1px 2.5px 5px rgba(255,255,255,0.1)

.descProducto
    padding: 6px
    text-align: left
    text-overflow: ellipsis
    max-height: 70px
    word-break: break-all
    font-size: 15px
    margin-top: 3px
    margin-bottom: 3px

.contenedorInfoProd
    padding: 5px

.add-icon
    color: $primaryColorLighter!important
    font-size: 2.5rem!important

.botonComprar
    width: 100%
    border: none
    outline: none
    background-color: transparent
    display: block
    padding: 10px
    position: relative
    @include transition(all 0.5s ease)
    overflow: hidden

.spanBotonCardProd
    color: $primaryColorLighter
    letter-spacing: 2px
    font-size: 25px
    font-family: "Lato"
    margin-left: 1rem

#hrCardProds
    margin: 0
    background: $primaryColorLighter

.layer
    color: #fff
    position: absolute
    top: -70px
    width: 100%
    left: 0
    padding: 11px
    background-color: $secondaryColor
    border-bottom-left-radius: 4px
    border-bottom-right-radius: 4px
    @include transition(all 0.5s ease)

@media (min-width: 768px)
        .card-prod
            margin-bottom: 3rem
            max-width: 300px

</style>
