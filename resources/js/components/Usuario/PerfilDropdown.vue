<template>
  <div class="dropdown">
    <b-avatar
      size="3em"
      text="FG"
      data-bs-toggle="dropdown"
      data-bs-display="static"
      aria-expanded="false"
      style="width:600px"
    ></b-avatar>
    
    <ul class="dropdown-menu dropdown-menu-center">
      <li><h6 class="dropdown-header">Mi perfil</h6></li>
      <li><a class="dropdown-item" href="#">Pedidos</a></li>
      <li><a class="dropdown-item" href="#">En el carrito</a></li>
      <li><a class="dropdown-item" href="#">Preferencias</a></li>
      <li><a class="dropdown-item" href="#">Editar perfil</a></li>
      <li><h6 class="dropdown-header">Productos</h6></li>
      <li><a class="dropdown-item" href="#">Lo mas vendido</a></li>
      <li><a class="dropdown-item" href="#">Favoritos</a></li>
      <li><hr class="dropdown-divider" /></li>
      <li><Link class="dropdown-item" href="/logout" preserve-scroll>Cerrar sesion</Link></li>
    </ul>
  </div>
</template>

<script>
import { nextTick } from 'vue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Link
  },
  created: function () {
    nextTick(function () {
      $(".dropdown").on("show.bs.dropdown", function () {
        $(this).find(".dropdown-menu").first().stop(true, true).slideDown(410);
      });

      $(".dropdown").on("hide.bs.dropdown", function () {
        $(this).find(".dropdown-menu").first().stop(true, true).slideUp(370);
        //overflow: visible
      });
    });
  },
  name: "PerfilDropDown",
};
</script>

<style lang="sass" scoped>
.dropdown-menu-center
  right: auto
  left: 50%
  -webkit-transform: translate(-50%, 0)
  -o-transform: translate(-50%, 0)
  transform: translate(-50%, 0)

</style>