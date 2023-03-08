import Vuex from 'vuex'
import { usePage } from '@inertiajs/vue3'

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
            if (usePage().props.value) {
                state.usuario = usePage().props.value.usuario;
                state.usuario != null ? state.isLogueado = true : state.isLogueado = false
            }
        },
    },
    actions: {
        /* getProducts(store) { //No lo estoy unsado /async-util tampoco . . espero la oportunidad
            doAsync(store, { https://medium.com/@lachlanmiller_52885/a-pattern-to-handle-ajax-requests-in-vuex-2d69bc2f8984
                url: 'http://localhost:8000/',
                mutationTypes: types.GET_INFO_ASYNC
            })
        }, */
    }
})
