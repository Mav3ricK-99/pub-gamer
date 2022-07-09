<template>
  <div class="container-fluid seccionFooter">
    <div class="col-3 d-flex align-items-end">
      <img :src="logo" />
      <div class="d-flex flex-column">
        <h3 class="nombreMarca cajaDivLogo">PubGamer</h3>
        <h4 class="sloganMarca cajaDivLogo">Hecho para gamers</h4>
        <span class="spanPropiedad cajaDivLogo"
          >Todos los logos y marcas pertenecen a Pubgamer S.A.</span
        >
      </div>
    </div>
    <div class="col-5 d-flex justify-content-center align-items-center">
      <ul class="navFooter">
        <li class="itemNav">
          <a>Inicio</a>
        </li>
        <li class="itemNav">
          <a>Ver catalogo</a>
        </li>
        <li class="itemNav">
          <a>Ayuda con un pago</a>
        </li>
      </ul>
      <hr class="hrRojo separadorNavFooter" />
      <ul class="navFooter">
        <li class="itemNav">
          <a>Hacer una consulta</a>
        </li>
        <li class="itemNav">
          <a>Realizar un reclamo</a>
        </li>
        <li class="itemNav">
          <a>Contactanos</a>
        </li>
      </ul>
      <div class="red-social"></div>
    </div>
  </div>
</template>

<script>
import logo from "../../logos/pubgamerLogo.png";
export default {
  data() {
    return {
      logo: logo,
    };
  },
};
</script>

<style lang="sass" scoped>
.seccionFooter
    display: flex
    background: $backgroundFooter
    padding: 1.5rem 2.5rem 1.5rem 2.5rem

.nombreMarca
    font-size: 42px
    font-family: Nunito-Bold
    color: $secondaryColor

.sloganMarca
    font-size: 18px
    font-family: Nunito-Medium
    color: $secondaryColorLighter

.spanPropiedad
    color: white
    font-size: 12px
    font-family: Nunito-Light

.cajaDivLogo
    padding-left: 1rem
    margin-bottom: 0

.navFooter
    width: 15rem
    list-style-type: none
    margin-left: -40px

a
    transition: all .45s ease-in

.itemNav
    color: white
    margin-bottom: .5rem
    display: block
    padding: .5rem 1rem .5rem 1rem
    font-family: Nunito-Light
    font-size: 17px
    border-bottom: 2px solid transparent
    transition: border .45s ease-out

    &:hover
        border-bottom: 2px solid $secondaryColorLighter

        a
            padding-left: 1rem

.separadorNavFooter
    width: 2px
    height: 100%
    margin-left: 2.5rem
    margin-right: 3rem

.red-social
    background: red
    clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%)
    width: 200px
    height: 150px
</style>
