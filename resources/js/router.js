import VueRouter from "vue-router";
import Home from "./components/Pages/Home/Home";
import About from "./components/Pages/About/About";
import ContactUs from "./components/Pages/ContactUs/ContactUs";
import ShopPage from "./components/Pages/Shop/ShopPage";
import RegistrationLogin from "./components/Pages/LoginRegister/RegistrationLogin";
import ProductReview from "./components/Pages/SingleProductPage/ProductReview";
import Cart from "./components/Pages/Cart/Cart";
import Admin from "./components/Pages/Admin/Admin";
import Empty404 from "./components/Pages/NotFound404/Empty404";

const router = new VueRouter({
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
                if (!localStorage.getItem('x_xsrf_token')) {
                    alert('You have to login for begining');
                    next('/login');
                } else if (localStorage.getItem('mayornot') === 'mayorNot') {
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

export default router;
