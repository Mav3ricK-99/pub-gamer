<template>
  <div>
    <span class="p-input-icon-left">
      <i class="pi pi-search" />
      <InputText type="text" v-model='busqueda'/>
    </span>
    <ul v-if="productos.length > 0">
        <li v-for="prod in productos" :key="prod.id" v-text="prod.nombreProducto"></li>
    </ul>
  </div>
</template>

<script>
import InputText from "primevue/inputtext";
export default {
    data (){
        return {
            busqueda: null,
            productos: []
        }
    },
     watch: {
        busqueda(after, before) {
            this.resultadoBusqueda(this.busqueda);
        }
    },
    methods: {
        resultadoBusqueda: function(busqueda) {
            axios.get("/busqueda/productos/"+busqueda)
            .then((resultado) => {
                this.productos = resultado.data;
            }).catch(error => (console.log(error)));
        }
    },
    name: "InputBusqueda",
    components: {
        InputText,
    },
};
</script>

<style lang="scss" scoped>

    .p-inputtext{
        transition: 200ms;
        transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        width:40px;
    }

    .p-inputtext:hover, .p-inputtext:focus, .p-inputtext:active{
        width:195px;
    }
</style>