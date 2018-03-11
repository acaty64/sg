<template>
    <div class="panel panel-default">
        <div class="container panel-body">
            <div class="row">
                <div class="col-md-1">
                    <span>Seleccione el tipo:</span>
                </div>
                <div class="col-md-4">
                    <select id="sel_tipo" v-model="xcarpeta" class="form-control col-md-4">
                      <option v-for="item in opciones" :value="item.opcion">
                        {{ item.wopcion }}
                      </option>
                    </select>                               
                </div>
            </div>
        </div>
        <br>
        <div class="container panel-body">
            <span>Texto de búsqueda:</span> 
            <div class="row">
                <div class="col-md-4">
                    <input id="xtexto" v-model="xtexto" class="form-control">
                </div>
                <div>
                    <button @click='buscar(xcarpeta, xtexto)' id='submit'>Buscar</button>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        mounted() {
            console.log('OpcionesComponent mounted.')
        },
 
        data(){
            return {
                xcarpeta: this.$store.state.carpeta,
                xtexto: this.$store.state.texto,
            }
        },
 
        methods:{
            buscar(carpeta, texto){
                this.$store.dispatch('changeData', {carpeta, texto});
                this.$store.commit('buscar');
            }
        },
        computed: mapState({
            opciones: (state) => state.opciones,
            texto: (state) => state.texto,
            carpeta: (state) => state.carpeta 
        }),
    }

</script>
