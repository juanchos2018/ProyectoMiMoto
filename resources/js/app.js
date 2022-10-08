require('./bootstrap');
window.Vue = require('vue').default;

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
Vue.use(BootstrapVue);



Vue.component('tabla-empleado', require('./components/tabla.vue').default);

const app = new Vue({
    el: '#app',
    
});