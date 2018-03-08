
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('actas-component', require('./components/actas/ActasComponent.vue'));

import { store } from './components/actas/store.js';

const app = new Vue({
    el: '#app',
    store: store,
});

/*
import Vue from 'vue';
import VueRouter from 'vue-router';
import NoteApp from './components/notes/NoteApp.vue';
import routes from './routes';
import notesStore from './store/notesStore';

Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

window.events = new Vue();

window.flash = function(message, type = 'success') {
    window.events.$emit('flash', message, type);
};

new Vue({
    el: '#app',
    render: h => h(NoteApp),
    router,
    store: notesStore,
});

*/