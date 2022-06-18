<template>
  <Transition name="slide-fade">
    <div v-if="mostrarProductosHotSale" class="hotSaleDiv d-flex flex-column">
      <h3 class="tituloHotSale noselect">Lo mas vendido</h3>
      <div
        class="d-flex flex-row flex-md-wrap justify-content-around mt-5 mb-4"
      >
        <CardProductos
          v-for="(producto, i) in productosMasVendidos"
          :key="i"
          :producto="producto"
        />
      </div>
    </div>
  </Transition>
</template>

<script>
import CardProductos from "../Productos/CardProductos.vue";
import { Inertia } from "@inertiajs/inertia";
export default {
  data() {
    return {
      mostrarProductosHotSale: false,
      productosMasVendidos: [],
    };
  },
  mounted() {
    setTimeout(() => {
      this.mostrarProductosHotSale = true;
    }, 550);

    this.getProductosMasVendidos();
  },
  methods: {
    getProductosMasVendidos: function () {
      axios.get("api/producto/").then((response) => {
        this.productosMasVendidos = response.data;
        //Falta catchear los errores
      });
    },
  },
  components: {
    CardProductos,
  },
};
</script>

<style scoped lang="sass">
.tituloHotSale
    font-size: 45px
    text-align: center
    color: #fff
    align-self: center
    text-shadow: 3px 3px 3px $secondaryColorLigther
    padding-bottom: 1rem
    border-bottom: 3px solid $secondaryColorLigther

.hotSaleDiv

.slide-fade-enter-active
    transition: all 0.3s ease-out

.slide-fade-leave-active
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1)

.slide-fade-enter-from, .slide-fade-leave-to
    transform: translateX(-80px)
    opacity: 0
</style>
