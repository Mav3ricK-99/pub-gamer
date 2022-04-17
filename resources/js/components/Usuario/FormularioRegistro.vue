<template>
  <b-form class="col-lg-7 ps-2 pe-2" @submit="registrarse">
    <TituloFormulario>Registro</TituloFormulario>
    <div class="col-lg-12 d-flex mt-2 mb-1">
      <div class="col-lg-6">
        <label for="inputNombre" class="inp d-flex justify-content-center">
          <input
            v-model="formulario.nombre"
            type="text"
            required
            id="inputNombre"
            placeholder="&nbsp;"
          />
          <span class="label">Nombre</span>
          <span class="focus-bg"></span>
        </label>
        <div class="divError mb-1 mt-1">
          {{ formulario.errors.nombre }}
        </div>
      </div>
      <div class="col-lg-6">
        <label for="inputApellido" class="inp d-flex justify-content-center">
          <input
            v-model="formulario.apellido"
            type="text"
            required
            id="inputApellido"
            placeholder="&nbsp;"
          />
          <span class="label">Apellido</span>
          <span class="focus-bg"></span>
        </label>
        <div class="divError mb-1 mt-1">
          {{ formulario.errors.apellido }}
        </div>
      </div>
    </div>

    <div class="col-lg-12 d-flex mb-1">
      <div class="col-lg-12 flex-column">
        <label
          for="inputEmail"
          class="inp labelEmail d-flex justify-content-center"
        >
          <input
            class="mb-1 align-items-center"
            v-model="formulario.email"
            type="email"
            required
            id="inputEmail"
            placeholder="&nbsp;"
          />
          <span class="label">Correo electronico</span>
          <span class="focus-bg"></span>
        </label>
        <span class="fcolor-naranja">Ej. federico1999g@gmail.com</span>
        <div class="divError mb-1 mt-1">
          {{ formulario.errors.email }}
        </div>
      </div>
    </div>

    <div class="col-lg-12 d-flex mb-1">
      <div class="col-lg-6">
        <label for="inputPass" class="inp d-flex justify-content-center">
          <input
            v-model="formulario.password"
            type="password"
            required
            id="inputPass"
            autocomplete="on"
            placeholder="&nbsp;"
          />
          <span class="label">Contraseña</span>
          <span class="focus-bg"></span>
        </label>
        <div class="divError mb-1 mt-1">
          {{ formulario.errors.password }}
        </div>
      </div>
      <div class="col-lg-6">
        <label for="inputPassConf" class="inp d-flex justify-content-center">
          <input
            v-model="formulario.password_confirmation"
            type="password"
            required
            id="inputPassConf"
            autocomplete="on"
            placeholder="&nbsp;"
          />
          <span class="label">Repetir contraseña</span>
          <span class="focus-bg"></span>
        </label>
        <span ref="s" class="fcolor-naranja"> Ej. Pub.Gamer1! </span>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button
        type="submit"
        :disabled="formulario.processing"
        class="rounded pt-2 pb-2 ps-3 pe-3 botonFormulario"
      >
        <span>Continuar</span>
      </button>
    </div>
  </b-form>
</template>

<script>
import TituloFormulario from "@/components/FormComponents/TituloFormulario.vue";
import { useForm } from "@inertiajs/inertia-vue3";

import { useStore } from 'vuex'
export default {
  setup() {
    const store = useStore()
    return {
      setMostrarFormulario: (value) => store.commit("setMostrarFormulario", value),
    }
  },
  data() {
    return {
      formulario: useForm({
        email: "",
        nombre: "",
        apellido: "",
        password: "",
        password_confirmation: "",
      }),
      errores: [],
    };
  },
  methods: {
      registrarse: function () {
      this.formulario.post("/register", {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          this.formulario.reset();
          this.setMostrarFormulario(false)
        },
        onError: (errors) => {
          this.formulario.reset("password", "password_confirmation");
          this.errores = errors;
        },
      });
    }
  },
  components: {
    TituloFormulario
  }
};
</script>

<style lang="sass" scoped>
.fcolor-naranja
  color: $naranjaPasivo
  margin-left: 2rem

.botonFormulario
  border: none
  outline: none
  font-size: 17px
  background: #2c365d
  color: $naranjaClaro
  font-family: core-sans
  margin-right: .7rem
  margin-top: .7rem

.botonFormulario:disabled
  transition: all 0
  background: #333a54
  color: gray

.botonFormulario span
  cursor: pointer
  display: inline-block
  position: relative
  transition: 0.25s

.divError
  min-height: 20px
  color: $naranjaPasivo
  margin-left: 25px
  font-size: 13px

.botonFormulario span:after
  content: '\00bb'
  position: absolute
  opacity: 0
  top: 0
  right: -20px
  transition: 0.15s

.botonFormulario:hover span
  padding-right: 25px

.botonFormulario:hover span:after
  opacity: 1
  right: 0

.inp
  position: relative
  width: 100%
  border-radius: 3px
  overflow: hidden

  .label
    position: absolute
    top: 20px
    left: 25px
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
    width: 85%
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

    &[type=email]
      width: 92%

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

.labelEmail
  .label
    left: 29px
</style>