<template>
  <b-form @submit="ingresar">
    <TituloFormulario class="mb-3">Ingreso</TituloFormulario>

    <div class="mt-3">
      <div class="col-lg-12 d-flex justify-content-center mb-1">
        <div class="col-lg-11 flex-column">
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
      <div class="col-lg-12 d-flex justify-content-center mb-1">
        <div class="col-lg-11">
          <label for="inputPass" class="inp d-flex justify-content-center">
            <input
              v-model="formulario.password"
              type="password"
              required
              id="inputPass"
              autocomplete="off"
              placeholder="&nbsp;"
            />
            <span class="label">Contraseña</span>
            <span class="focus-bg"></span>
          </label>
          <div class="divError mb-1 mt-1">
            {{ formulario.errors.password }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="d-flex justify-content-end">
        <button
          type="submit"
          :disabled="formulario.processing"
          class="rounded pt-2 pb-2 ps-3 pe-3 botonFormulario"
        >
          <span>Ingresar</span>
        </button>
      </div>
    </div>
  </b-form>
</template>

<script>
import TituloFormulario from "@/components/FormComponents/TituloFormulario.vue";
import { useForm } from "@inertiajs/inertia-vue3";

import { useStore } from "vuex";
export default {
  setup() {
    const store = useStore();
    return {
      setMostrarFormulario: (value) =>
        store.commit("setMostrarFormulario", value),
    };
  },
  data() {
    return {
      formulario: useForm({
        email: "",
        password: "",
      }),
      errores: [],
    };
  },
  methods: {
    ingresar: function () {
      this.formulario.post("/ingresar", {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          this.formulario.reset();
          this.setMostrarFormulario(false);
        },
        onError: (errors) => {
          this.formulario.reset();
          this.errores = errors;
        },
      });
    },
  },
  components: {
    TituloFormulario,
  },
};
</script>

<style lang="sass" scoped>
.fcolor-naranja
  color: $formInputColor
  font-size: 17px

.botonFormulario
  border: none
  outline: none
  font-size: 19px
  background: #19315A
  color: #FF773D
  font-family: core-sans
  margin-top: .7rem
  margin-right: 1.5rem
  transition: all 1s

  &:hover
    color: $formInputColor
    background: $backgroundBotonForm

.botonFormulario:disabled
  transition: all 0s
  background: $formInputDisabledBackground
  color: gray

.botonFormulario span
  cursor: pointer
  display: inline-block
  position: relative
  transition: 0.25s

.divError
  min-height: 20px
  color: $formInputColor
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
    top: 17px
    left: 14px
    font-size: 17px
    color: #FF773D
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
    background: rgba($formInputColor,.07)
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
    font-size: 18px
    font-weight: 400
    background: $backgroundInputForm
    border-box: $navButonBorderRadius
    box-shadow: inset 0 -1px 0 rgba($formInputColor,.4)
    color: $formInputColor
    transition: all .15s ease

    &:hover
      box-shadow: inset 0 -1px 0 rgba($formInputColor,.5)

    &:not(:placeholder-shown)
      + .label
        color: #FF773D
        transform: translate3d(0,-12px,0) scale(.75)

    &:focus
      background: rgba($formInputColor,.05)
      outline: none
      box-shadow: inset 0 -2px 0 $formInputColor
      + .label
        color: $formInputColor
        transform: translate3d(0,-12px,0) scale(.75)
        + .focus-bg
          transform: scaleX(1)
          transition: all .1s ease

.labelEmail
  .label
    left: 14px
</style>