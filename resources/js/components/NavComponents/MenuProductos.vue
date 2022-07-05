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

<style lang="sass">
.p-splitbutton
  border: none
  outline: none
  background: $navButtonBackgroundDarker

.p-button
  background: $navButtonBackgroundDarker
  color: $navColor
  font-family: core-sans
  font-size: $navButonFontsize
  line-height: 2rem
  border: none

.p-button
  text-align: center
  text-transform: uppercase
  cursor: pointer
  font-size: 17px
  letter-spacing: 1.5px
  position: relative
  transition-duration: 0.4s
  overflow: hidden
  -webkit-box-shadow: $navButonBoxShadow
  box-shadow: $navButonBoxShadow
  border: none
  outline: none
  background: $navButtonBackground
  color: $navColor
  font-family: core-sans
  font-size: $navButonFontsize
  line-height: 1.75rem
  padding-left: 1.4rem
  padding-right: 1.4rem
  padding-top: 0.5rem
  padding-bottom: 0.5rem
  border-radius: $navButonBorderRadius

  &:hover
    background: $navButtonBackgroundDarker

  &:focus
    outline: 0

.p-button:enabled:hover
  background: $navButtonBackgroundDarker
  color: $navColor
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
