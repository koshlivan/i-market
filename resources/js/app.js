import Empty404 from "./components/Empty404";


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
import ShopPage from "./components/ShopPage";
import RegistrationLogin from "./components/RegistrationLogin";
import Cart from "./components/Cart";
import Admin from "./components/Admin";
import ProductReview from "./components/ProductReview";


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
            component: ShopPage
        },
        {
            path: '/login',
            name: 'login',
            component: RegistrationLogin
        },
        {
            path: '/product/:id',
            name: 'product',
            component: ProductReview,
            props: true
        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin,
            beforeEnter: (to, from, next) => {
                if ( !localStorage.getItem('x_xsrf_token') ) {
                    alert('You have to login for begining');
                    next('/login');
                } else if ( localStorage.getItem('mayornot') === 'mayorNot') {
                    alert('You don\'t have permissions for that');
                    next('/');
                } else {
                    next();
                }
            }
        },
        {
            path: '/*',
            name: 'empty',
            component: Empty404
        },
    ]
})
// router.beforeEach((to, from, next) => {
//     if (to.name === 'admin') {
//         next('/');
//     } else {
//         next();
//     }
//
// });



export const eventBus = new Vue();

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
