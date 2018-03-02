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
    import detalle from './DetalleComponent';

    export default {
        components:{
            opciones, detalle
        },

        mounted() {
            console.log('ActasComponent mounted.')
        },

    }
</script>
