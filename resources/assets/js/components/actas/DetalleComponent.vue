<template>
    <div class="panel panel-default">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">ActasComponent</div>
                    <div class="card-body">
                        <ul>
                            <li v-for='acta in actas'>
                                <a :href='href(protocol, URLdomain, acta)'>{{ acta }}</a>
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
            protocol: (state) => state.protocol,
            URLdomain: (state) => state.URLdomain,
        }),
        methods: {
            href: (protocol, URLdomain, acta) => protocol+'//'+URLdomain+'/'+acta,
        }
    }
</script>
