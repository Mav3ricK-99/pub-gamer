<template>
  <Splitbutton class="navButton" label="Productos" :model="this.menu" />
</template>

<script>
import Splitbutton from "primevue/splitbutton";

export default {
  created() {
    /*window.Echo.channel("producto").listen(".created", (data) => {
      //console.log(data);
      this.agregarProductoTabla(data.producto);
    });*/
    this.getTablaProductos();
  },
  data() {
    return {
      menu: [
        {
          icon: "pi pi-spin pi-spinner",
          class: "d-flex justify-content-center",
        },
      ],
    };
  },
  components: {
    Splitbutton,
  },
  methods: {
    getTablaProductos: function () {
      axios.get("api/menu_productos/").then((response) => {
        this.menu = response.data;
      });
    },/*
    agregarProductoTabla: function (producto) {
      let nombreCategoria = producto.subcategoria.categoria.nombre;
      let nombreSubCategoria = producto.subcategoria.nombre;

      this.menu.find((categoria) => {
        if (categoria.label === nombreCategoria) {
          categoria.items.find((subcategoria) => {
            if (subcategoria.label === nombreSubCategoria) {
              subcategoria.items.push({
                label: producto.nombreProducto,
                to: "producto/" + producto.id,
              });
            }
          });
        }
      });
    },*/
  },
};
</script>

<style lang="sass" scope>
.p-tieredmenu .p-menuitem.p-menuitem-active > .p-menuitem-link
  background: transparent

.p-tieredmenu .p-menuitem > .p-menuitem-link
  background: transparent
  padding: 5px 0 5px 0
  display: flex
  justify-content: flex-start

.p-tieredmenu .p-menuitem-active
  border: none

.p-tieredmenu .p-menuitem-link .p-menuitem-icon
  margin: 0

.p-tieredmenu .p-menuitem.p-menuitem > .p-menuitem-link .p-menuitem-icon
  color: red
  margin-left: 1rem

.p-tieredmenu .p-menuitem-link:not(.p-disabled):hover
  background: white

.p-menuitem-link
  background: black
  text-align: center

.p-tieredmenu .p-menuitem.p-menuitem-active > .p-menuitem-link .p-menuitem-text
  margin-left: .5rem

.p-tieredmenu .p-menuitem-link .p-menuitem-text
  margin-left: .5rem

.p-tieredmenu .p-menuitem-active > .p-submenu-list
  width: 105%

.p-tieredmenu .p-submenu-icon
  font-size: 1rem

.p-tieredmenu .p-menuitem-link .p-submenu-icon
  margin-left: 2rem

.p-tieredmenu .p-menuitem-link:focus
  box-shadow: none
</style>