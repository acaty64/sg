import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
	state:{
        texto: "",
        actas: [],
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
        carpeta: "consejo",
        protocol: window.location.protocol,
        URLdomain: window.location.host,
	},
    mutations:{
        carpeta: (state, carpeta) => {
            state.carpeta = carpeta;
        },
        texto: (state, texto) => {
            state.texto = texto;
        },
        buscar: (state) => {
            var request = {
                'carpeta': state.carpeta,
                'texto': state.texto
            };
            console.log('request: ', request);
            var url = state.protocol+'//'+state.URLdomain+'/api/pdf/'
            axios.post(url, request).then(response=>{
                state.actas = response.data.data;
                console.log('state.actas: ', state.actas);
            });
        },
	},
    actions:{
        changeData: (context, {carpeta, texto})=> {
console.log('changeData: '+texto );
            context.commit('carpeta', carpeta);
            context.commit('texto', texto);
        },
        viewActa: (context, {tipo, acta}) => {
            var request = {
                'tipo': tipo,
                'arch_pdf': acta
            };
            var url = state.protocol+'//'+state.URLdomain+'/api/pdf/'
            axios.post(url, request).then(response=>{
                //state.success = response.data.success;
                console.log('ok viewActa');
            });
        },


    },

});

