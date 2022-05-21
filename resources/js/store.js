import Vuex from 'vuex'
import { usePage } from "@inertiajs/inertia-vue3";

export const store = new Vuex.Store({
    state: {
        isLogueado: false,
        usuario: {},

        mostrarFormulario: false,
        formulario: "formularioRegistro",
        darkTheme: {
            // - Nav
            azulNav: "#181818",
            azulNavOscuro: "#141414",
            colorNav: "#ffffff",
            fondoNav: "linear-gradient(to bottom, #0f0f0f, #100e1f)",

            // - Forms, etc
            naranjaClaro: "#3b11d5",
            primaryColorLighter: "#3b15c2",
            secondaryColor: "#261564",
            backgroundInputForm: "#111111",
            backgroundBotonForm: "#111111",
            background: "#0a0d22fa",
            azulForm: "#1a1b20",
        },
        lightTheme: {

            primaryColor: "#15305F",
            primaryColorLighter: "#15305F",
            secondaryColor: "#261564",

            // - Nav
            navColor: "#15305F",
            navBackground: "#FBFCFF",

            // - Nav buttons
            navButtonBackground: "rgba(236, 110, 56, 0.98)",
            navButtonBackgroundDarker: "rgba(226, 93, 36, 0.98)",
            navButonBoxShadow: "0px 0px 10px 2px rgba(226, 93, 36,0.17)",
            navButonFocusBackground: "#1F222C",
            
            // - Nav input

            busquedaNavBackground: "rgba(236, 110, 56, 0.98)",
            busquedaNavNubeBackground: "#15305F",
            busquedaNavLupaHover: "#15305F",
            busquedaNavInputBackground: "rgba(236, 110, 56, 0.58)",

            // - Forms, etc
            formularioBackground: "#182B4C",
            backgroundInputForm: "#122442",
            backgroundBotonForm: "#122442",
            formInputColor: "#EC6E38",
            formInputDisabledBackground: "#656464",
            background: "red",
            
        },
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
        switchCssTheme(state, value) {
            const style = document.documentElement.style;
            let theme = state[value];
            //console.log(theme)
            for (const key in theme) {
                style.setProperty("--var-" + key, theme[key]);
            }
        }
    },
    actions: {
    }
})