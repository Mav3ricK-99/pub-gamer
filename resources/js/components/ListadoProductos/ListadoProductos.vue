<template>
    <section class="d-flex justify-content-center p-3 bg-white rounded">
        <Filtros/>
        <Resultados/>
    </section>
</template>

<script>
import Layout from "../Layouts/AppLayout.vue";
import Filtros from "./Filtros.vue";
import Resultados from "./Resultados.vue";

export default {
    name: 'ListadoProductos',
    data() {
        return {

        };
    },
    layout: Layout,
    mounted() {

    },
    components: {
    Filtros,
    Resultados
},

    methods: {

    },
};
</script>

<style lang="scss" scoped></style>