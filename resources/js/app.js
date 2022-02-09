import Empty404 from "./components/Pages/NotFound404/Empty404";


require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/App.vue -> <example-component></example-component>
 */

import App from './components/App';
import VueRouter from "vue-router";

Vue.use(VueRouter);
import router from './router';
import VueConfirmDialog from 'vue-confirm-dialog'

Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default);

export const eventBus = new Vue();

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
