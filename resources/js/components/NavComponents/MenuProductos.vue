<template>
  <Splitbutton label="Productos" :model="this.menu" />
</template>

<script>
import Splitbutton from "primevue/splitbutton";

export default {
  mounted() {
    window.Echo.channel("producto").listen(".created", (data) => {
      //console.log(data);
      this.agregarProductoTabla(data.producto);
    });
  },
  data() {
    return {
      menu: [
        {
          class: "pt-1 pb-1",
          label: "Almacenamiento",
          items: [
            {
              class: "pt-1 pb-1",
              label: "Pendrive",
            },
            {
              class: "pt-1 pb-1",
              label: "Disco Rigido",
            },
            {
              class: "pt-1 pb-1",
              label: "Disco en estado solido",
            },
          ],
        },
      ],
    };
  },
  components: {
    Splitbutton,
  },
};
</script>

<style lang="sass" scope>
.p-splitbutton
  border: none
  outline: none
  background: $azulNavOscuro

.p-button
  background: $azulNavOscuro
  color: $colorNav
  font-family: core-sans
  font-size: $fsizeNav
  line-height: 2rem
  border: none

.p-button:enabled:hover
  background: $azulNavOscuro
  color: $colorNav
  border: none

.p-button
  &:focus
    box-shadow: none

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