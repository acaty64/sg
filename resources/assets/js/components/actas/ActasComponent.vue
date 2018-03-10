<template>
    <div>
        <div v-if="loading">
            <img src="http://www.gifmania.com/Gif-Animados-Web/Imagenes-Rotulos-Webs/Rotulos-Cargando/Chargement-62163.gif" alt="rótulos cargando - GIFMANIA" />
        </div>
        <div v-else>            
            <div>
                <opciones/>
            </div>    
            <div>
                <detalle/>
            </div>
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
        computed: mapState(['opciones', 'texto', 'carpeta', 'arch_pdf', 'loading']),
        mounted() {
            console.log('ActasComponent mounted.')
        },

    }
</script>
