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
        arch_pdf: '',
	},
    mutations:{
        carpeta: (state, carpeta) => {
            state.carpeta = carpeta;
        },
        texto: (state, texto) => {
            state.texto = texto;
        },
        arch_pdf: (state, arch_pdf) => {
            state.arch_pdf = arch_pdf;
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
            context.commit('carpeta', carpeta);
            context.commit('texto', texto);
        },
        viewActa: (context, acta) => {
            var arch_pdf = context.state.protocol+'//'+context.state.URLdomain+'/public/'+context.state.carpeta+'/'+acta;
            context.commit('arch_pdf', arch_pdf);
/*
            var request = {
                'tipo': state.carpeta,
                'arch_pdf': acta
            };
            var url = state.protocol+'//'+state.URLdomain+'/admin/view/pdf/'
            axios.post(url, request).then(response=>{
                //state.success = response.data.success;
                console.log('url viewActa: '+url);
                console.log('request.tipo viewActa: '+request.tipo);
                console.log('request.arch_pdf viewActa: '+request.arch_pdf);
            });
*/
        },


    },

});

