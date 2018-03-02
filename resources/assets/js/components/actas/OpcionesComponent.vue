<template>
    <div class="panel panel-default">
        <div class="container panel-body">
            <div class="row">
                <div class="col-md-1">
                    <span>Seleccione el tipo:</span>
                </div>
                <div class="col-md-4">
                    <select id="sel_tipo" v-model="carpeta" class="form-control col-md-4">
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
                    <input v-model="texto" class="form-control">
                </div>
                <button @click='buscar'>Buscar</button>
            </div>
        </div>
    </div>    
</template>

<script>
//v-on:change="opcionTipo">
    export default {
        mounted() {
            console.log('OpcionesComponent mounted.')
        },
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
        methods:{
            opcionTipo(){
                this.carpeta = this.item.opcion;
            },
            buscar(){
                alert('texto: '+this.texto);

            }
        }

    }


    /*

<input type="radio" id="{{item.opcion}}" value="{{item.opcion}}" v-model="item">
                    <label for="{{item.opcion}}">{{item.texto}}</label>
                    <br> 

    */
</script>
