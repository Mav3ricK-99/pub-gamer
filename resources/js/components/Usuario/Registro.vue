<template>
  <div class="row justify-content-center">
    <div
      class="col-lg-6 position-fixed d-flex rounded shadow"
      style="
        max-height: 750px;
        padding: 0;
        top: 12rem;
        z-index: 99;
        background: #171737;
      "
    >
      <div class="flex-fill bg-cover rounded"></div>
      <div
        class="
          form-container
          col-lg-7
          pt-3
          pb-3
          ps-2
          pe-3
          d-flex
          justify-content-evenly
        "
      >
        <b-form class="col-lg-11" @submit="registrarse" @reset="reset">
          <div class="d-flex justify-content-evenly mb-3">
            <label for="inp" class="inp">
              <input v-model="formulario.nombre" type="text" required id="inp" placeholder="&nbsp;"/>
              <span class="label">Nombre</span>
              <span class="focus-bg"></span>
            </label>
             
            <label for="inp" class="inp">
              <input v-model="formulario.apellido" type="text" required id="inp" placeholder="&nbsp;"/>
              <span class="label">Apellido</span>
              <span class="focus-bg"></span>
            </label>
          </div>

          <div class="d-flex justify-content-center mb-3">

            <label for="inp" class="inp mb-2 col-lg-11">
              <input class="mb-1" v-model="formulario.email" type="email" required id="inp" placeholder="&nbsp;"/>
              <span class="label">Correo electronico</span>
              <span class="focus-bg"></span>
              <span class="fcolor-naranja">Ej. federico1999g@gmail.com</span>
            </label>
            
          </div>

          <div class="mb-3">
            
            <div class="d-flex flex-row justify-content-evenly mb-1">
              <label for="inp" class="inp">
                <input v-model="formulario.password" type="password" required id="inp" placeholder="&nbsp;"/>
                <span class="label">Contraseña</span>
                <span class="focus-bg"></span>
              </label>

              <label for="inp" class="inp">
                <input v-model="formulario.password_confirmation" type="password" required id="inp" placeholder="&nbsp;"/>
                <span class="label">Repetir contraseña</span>
                <span class="focus-bg"></span>
              </label>
            </div>
            <span ref="s" class="fcolor-naranja ps-4">
              Ej. Pub.Gamer1!
            </span>
          </div>

          <transition name="fade">
            <div v-show="mostrarErrores" class="mb-3" style="transation: all 10s">
              <ul class="list-group list-group-flush rounded">
                <li :key="error.id" v-for="error of errores" class="errorLi list-group-item">
                  {{ error }}
                </li>
              </ul>
            </div>
          </transition>

          <div class="d-flex justify-content-end">
            <button type="submit" class="rounded pt-2 pb-2 ps-3 pe-3 botonFormulario">
              <span>Continuar</span>
            </button>
          </div>
        </b-form>
      </div>
    </div>
  </div>
</template>
<script>
import pixelArt from "../../../img/pixelart.jpg";
export default {
  data() {
    return {
      formulario: {
        email: "",
        nombre: "",
        password: "",
        password_confirmation: "",
      },
      pixelArt: pixelArt,
      mostrarErrores: false,
      errores: [],
    };
  },
  methods: {
    registrarse: function (event) {
      event.preventDefault();
      axios
        .post("register", this.formulario)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          this.errores = []
          let statusCode = error.response.status;
          let mensajeErrores = error.response.data.errors;

          if(statusCode >= 500){
              alert("Hubo un problema al establecer la conexion con el servidor, por favor intente mas tarde.");
          }else if(statusCode == 422){
            this.mostrarErrores = true;
           
            Object.keys(mensajeErrores).forEach(fieldError => {
              mensajeErrores[fieldError].forEach(el => {
                this.errores.push(el);
              })
            });
            
          }else{
            alert("Error desconocido - " + response.data);
          }
          console.log(error.response);
        });
    },
    onReset(event) {
      event.preventDefault();
      formulario.email = "";
      formulario.nombre = "";
      formulario.checked = [];
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
};
</script>
<style scope lang="sass">

.fade-enter-active, .fade-leave-active 
  transition: opacity 3

.fade-enter, .fade-leave-to
  opacity: 0


$naranjaClaro: #ff5722
$naranjaPasivo: #fc602d

.fcolor-naranja
  color: $naranjaPasivo

.botonFormulario
  border: none
  outline: none
  font-size: 17px
  background: #2c365d
  color: $naranjaClaro
  font-family: core-sans
  transition: all 0.5s

.botonFormulario span 
  cursor: pointer
  display: inline-block
  position: relative
  transition: 0.25s

.errorLi
  background: #2c365d
  color: $naranjaPasivo

.botonFormulario span:after 
  content: '\00bb'
  position: absolute
  opacity: 0
  top: 0
  right: -20px
  transition: 0.25s


.botonFormulario:hover span 
  padding-right: 25px


.botonFormulario:hover span:after 
  opacity: 1
  right: 0


.bg-cover
  width: 100%
  max-height: 100%
  background: url("../../../img/pixelart.jpg") no-repeat center
  background-size: cover

.inp
  position: relative
  margin: auto
  border-radius: 3px
  overflow: hidden

  .label
    position: absolute
    top: 20px
    left: 12px
    font-size: 16px
    color: rgba($naranjaPasivo,.5)
    font-weight: 500
    transform-origin: 0 0
    transform: translate3d(0,0,0)
    transition: all .2s ease
    pointer-events: none

  .focus-bg
    position: absolute
    top: 0
    left: 0
    width: 100%
    height: 100%
    background: rgba($naranjaPasivo,.05)
    z-index: -1
    transform: scaleX(0)
    transform-origin: left

  input:-webkit-autofill,
  input:-webkit-autofill:hover, 
  input:-webkit-autofill:focus, 
  input:-webkit-autofill:active
     -webkit-transition: "color 9999s ease-out, background-color 9999s ease-out"
     -webkit-transition-delay: 9999s
  
  input
    -webkit-appearance: none
    appearance: none
    width: 100%
    border: 0
    font-family: inherit
    padding: 16px 12px 0 12px
    height: 56px
    font-size: 16px
    font-weight: 400
    background: #1d223b
    box-shadow: inset 0 -1px 0 rgba($naranjaPasivo,.3)
    color: $naranjaPasivo
    transition: all .15s ease

    &:hover
      background: rgba($naranjaPasivo,.04)
      box-shadow: inset 0 -1px 0 rgba($naranjaPasivo,.5)

    &:not(:placeholder-shown)
      + .label
        color: rgba($naranjaPasivo,.5)
        transform: translate3d(0,-12px,0) scale(.75)

    &:focus
      background: rgba($naranjaPasivo,.05)
      outline: none
      box-shadow: inset 0 -2px 0 $naranjaClaro
      + .label
        color: $naranjaClaro
        transform: translate3d(0,-12px,0) scale(.75)
        + .focus-bg
          transform: scaleX(1)
          transition: all .1s ease

.form-container
  background: #1d223b
</style>