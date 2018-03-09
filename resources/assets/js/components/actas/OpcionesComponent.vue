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
                    <input v-model="xtexto" class="form-control">
                </div>
                <button @click='buscar(xcarpeta, xtexto)'>Buscar</button>
            </div>
        </div>
    </div>    
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        //props: ['opciones', 'texto', 'carpeta'],
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
                //alert('buscar(carpeta, texto):'+ carpeta+' - '+texto);
                this.$store.dispatch('changeData', {carpeta, texto});
                this.$store.commit('buscar');
            }
        },
        computed: mapState({
            opciones: (state) => state.opciones,
            texto: (state) => state.texto,
            carpeta: (state) => state.carpeta 
        }),
/*
        computed: mapState(['opciones', 'texto', 'carpeta']),
*/

    }

 /*
        data(){
            return {
                texto: "",
                item: [],
                opciones:[
                    {
                        opcion: 'consejo',
                        wopcion: 'Consejo Universitario'
                    },
                    {
                        opcion: 'asamblea',
                        wopcion: 'Asamblea Universitaria'
                    },
                ],

                carpeta:"",
            }
        },
*/

    /*

<input type="radio" id="{{item.opcion}}" value="{{item.opcion}}" v-model="item">
                    <label for="{{item.opcion}}">{{item.texto}}</label>
                    <br> 

    */
</script>
