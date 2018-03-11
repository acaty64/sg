<template>
    <div class="panel panel-default">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">Actas: {{state.carpeta}}</div>
                    <div class="card-header">{{actas.length}} coincidencias.</div>
                    <div class="card-body">
                        <ul>
                            <li v-for='acta in actas'>
                                <a :href='href(state, acta)' target="_blank"> {{ acta }} </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import { mapState } from 'vuex';

    export default {
        mounted() {
            console.log('DetalleComponent mounted.');
        },
        computed: mapState({
            actas: (state) => state.actas,
            state: (state) => state,
        }),
        methods: {
            viewActa(acta) {
                this.$store.dispatch('viewActa', acta);
            },
            href(state, acta) { 
                return '/admin/view/pdf/'+state.carpeta+'/'+acta;
            },
        }
    }
</script>


