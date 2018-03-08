<template>
    <div>
        <div>
            <opciones/>
        </div>    
        <div>
            <detalle/>
        </div>
    </div>
</template>

<script>
    import opciones from './OpcionesComponent';
    import detalle  from './DetalleComponent';
    import {mapState} from 'vuex';

    export default {
        components:{
            opciones, detalle
        },
        computed: mapState(['opciones', 'texto', 'carpeta']),
        mounted() {
            console.log('ActasComponent mounted.')
        },

    }
</script>
