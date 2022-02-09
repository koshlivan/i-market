<template>
    <div class="col-xs-6 col-sm-4 shopcart justify-content-end">
        <div id="cart" class="btn-group btn-block mtb_40">
            <button type="button" class="btn btn-cart" @click="isOpenCart">
                <span class="material-icons cart-ico">shopping_cart</span>
                <div class="shop-cart-text">
                    <span id="shippingcart">Shopping cart</span>
                    <span id="cart-total">{{ 'items (' + items + ')' }}</span>
                </div>
            </button>
        </div>
        <cart-dropdown></cart-dropdown>
    </div>
</template>

<script>
import CartDropdown from "./CartDropdown";
import {eventBus} from "../../../app";
import productService from "../../../productService";

export default {
    name: "logo-cart",
    components: {CartDropdown},
    emits: [
        'cartOpened'
    ],
    data() {
        return {
            isOpened: false,
            itemsInCart: [],
            items: 0
        }
    },
    created() {
        eventBus.$on('itemsCartChange', () => {
            this.totalItems();
        });
    },
    methods: {
        isOpenCart() {
            this.isOpened = !this.isOpened;
            eventBus.$emit('cartOpened', this.isOpened);
        },
        totalItems() {
            if (!localStorage.getItem('order')) {
                this.items = 0;
            } else {
                let orders = JSON.parse(localStorage.getItem('order'));
                this.items = orders.length;
            }
        }
    },
    mounted() {
        this.totalItems()
    }
}
</script>

<style scoped>
#cart {
    float: right;
}

.shopcart {
    position: relative;
}

.btn span {
    color: white;
}

.btn-cart {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.btn-cart:hover .cart-ico {
    cursor: pointer;
    color: #e53a53;
}

.btn-cart:active .cart-ico {
    color: #451b1b;
}

.shop-cart-text {
    display: flex;
    margin-left: 0.3rem;
    flex-direction: column;
    justify-content: center;
    align-items: stretch;
}

.cart-ico {
    font-size: 3rem;
}

#shippingcart {
    font-size: 1.2rem;
    font-weight: 600;
    text-transform: uppercase;
}

#cart-total {
    text-transform: uppercase;
    text-align: left;
}
</style>
