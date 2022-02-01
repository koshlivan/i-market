<template>
    <div id="cart-dropdown" class="cart-menu collapse" ref="cart">
        <ul>
            <li>
                <table class="table table-striped">
                    <tbody>
                    <tr class="table-row">
                        <td class="text-center"><img src="/assets/none.png" alt="iPod Classic" title="iPod Classic"></td>
                        <td class="text-left product-name">
                            <a href="#">{{  }}</a> <span class="text-left price">{{ '$' }}</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                        </td>
                        <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>Sub-Total</strong></td>
                        <td class="text-right">$2,100.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                        <td class="text-right">$2.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>VAT (20%)</strong></td>
                        <td class="text-right">$20.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Total</strong></td>
                        <td class="text-right">$2,122.00</td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li class="buttons">
<!--                <router-link tag="button" class="link-to" to="/cart">View cart</router-link>-->
                <button @click="viewCart(false)">view cart</button>
                <button>Checkout</button>
            </li>
        </ul>
    </div>
</template>

<script>
import {eventBus} from "../../app";
import productService from "../../productService";
export default {
    name: "cart-dropdown",
    props: [

    ],
    data() {
        return {
            order: {},
            carts: [],
            productIds: [],
            products: []
        }
    },

    created() {
            eventBus.$on('cartOpened', (event) => this.showCart(event))
    },
    methods : {
        showCart(yes) {
            if (yes === true ){
                axios.get('/api/orders'+1)
                .then(response => {
                    this.order = response.data;
                    this.carts = response.data.carts;

                    console.log('response carts: ', JSON.stringify(this.carts));

                    this.$refs.cart.style.height = 'auto';
                })
            } else {
                this.$refs.cart.style.height = '0';
                this.orders = [];
            }
        },
        getProducts(productArray){
            // for (id of productArray) {
            //     productService.getSingleProduct(id).
            //     then(response => {
            //         this.products.push(response.data);
            //     })
            // }
        },
        viewCart(event) {
            eventBus.$emit('cartOpened', event);
            this.$router.push('cart');
        }
    }
}
</script>

<style scoped>
#cart-dropdown {
    z-index: 2;
    width: 18rem;
    height: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
    background-color: white;
    overflow: hidden;
    position: absolute;
    top: 100%;
    right: 0;
    border: solid 1px black;
    border-radius: 2px;
    animation-duration: 1s;
    transition: height 600ms;
    transition-timing-function: cubic-bezier(.01,.66,.47,1.57);
}
.rising {
    animation-name: rising;
}
.hiding {
    animation-name: hiding;
}
button  {
    padding: 0.6rem;
    background-color: rgb(66, 66, 66);
    color: white;
    text-transform: uppercase;
    font-weight: 500;
    margin: 0 0.1rem;
}
.buttons {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
ul {
    width: 100%;
    padding: 0.5rem;
}
.table-row {
    display: flex;
    flex-direction: row;
    align-items: stretch;
}
.table-row td:first-child {
    width: 40%;
}
img {
    max-width: 100%;
}
i {
    color: rgb(66, 66, 66);
}
.cart-qty {
    width: 3rem;
}
a {
    text-decoration: none;
    color: rgb(126, 126, 126);
}
@keyframes rising {
    0%   {height: 0;}
    25%  {height: 5rem;}
    50%  {height: 10rem;}
    75%  {height: 20rem;}
    100% {height: auto;}
}
@keyframes hiding {
    0% {height: auto;}
    25%  {height: 20rem;}
    50%  {height: 10rem;}
    75%  {height: 5rem;}
    100%   {height: 0;}
}
</style>
