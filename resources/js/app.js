require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/App.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('App', require('./components/App.vue').default);
import App from './components/App';
//import VueGoogleMaps from '@fawmi/vue-google-maps'
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './components/Home';
import About from './components/About';
import ContactUs from './components/ContactUs';
import ShopThe from "./components/ShopThe";
import RegistrationLogin from "./components/RegistrationLogin";
import ProductReview from "./components/ProductReview";
import Cart from "./components/Cart";
import Admin from "./components/Admin";


const router = new VueRouter( {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactUs
        },
        {
            path: '/shop',
            name: 'shop',
            component: ShopThe
        },
        {
            path: '/login',
            name: 'login',
            component: RegistrationLogin
        },
        {
            path: '/product/1',
            name: 'product',
            component: ProductReview
        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin
        }
    ]
})

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
// app.use(VueGoogleMaps, {
//     load: {
//         key: '',
//     },
// }).mount('#app')
