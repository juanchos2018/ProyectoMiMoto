require('./bootstrap');
window.Vue = require('vue').default;
import Vue from "vue";
import vSelect from "vue-select";

import vuetify from './vuetify';
import 'vuetify/dist/vuetify.min.css'
import "vue-select/dist/vue-select.css";

import { BootstrapVue,BCard , BootstrapVueIcons } from 'bootstrap-vue'
Vue.use(BootstrapVue);


Vue.component("v-select", vSelect);
Vue.component('b-card', BCard)

Vue.component('tabla-empleado', require('./components/tabla.vue').default);
Vue.component('nueva-cita', require('./views/NuevaCita.vue').default);

const app = new Vue({
    vuetify,
    el: '#app'  
    
});