import Vuex from 'vuex'
import { usePage } from "@inertiajs/inertia-vue3";

export const store = new Vuex.Store({
    state: {
        isLogueado: false,
        usuario: {},

        mostrarFormulario: false,
        formulario: "formularioRegistro",
    },
    mutations: {
        setMostrarFormulario(state, value) {
            state.mostrarFormulario = value;
        },
        setFormulario(state, formulario) {
            store.commit("setMostrarFormulario", true);
            state.formulario = formulario
        },
        setUsuario(state) {
            state.usuario = usePage().props.value.usuario;
            state.usuario != null ? state.isLogueado = true : state.isLogueado = false
        },
    },
    actions: {
    }
})
