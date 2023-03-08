<template>
    <div>
        <p>{{ this.publicaciones.data }}</p>
    </div>
</template>

<script>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default {
    setup ()
    {   
        const publicaciones = computed(() => usePage().props.publicaciones)
        return {
            publicaciones
        }
    },
    name: 'Resultados',
    data() {
        return {
        };
    },
    props: {
    },
    computed: {
    },
    mounted() {
        window.Echo.channel("producto").listen(".created", (data) => {
            console.log(data);
            //this.agregarProductoTabla(data.producto);
        });
    },

    methods: {

    },
};
</script>

<style lang="scss" scoped></style>