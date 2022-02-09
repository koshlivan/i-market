<template>
    <div id="cart-dropdown" class="cart-menu collapse" ref="cart">
        <ul>
            <li>
                <cart-dropdown-item
                    v-for="(position, index) in positions"
                    :key="index"
                    :position="position"
                    @positionRemoved="positionRemoved(index)"
                    @update:amount="amountChanges($event, index)">
                </cart-dropdown-item>
            </li>
            <li>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>Sub-Total</strong></td>
                        <td class="text-right">{{ '$' + totalSum }}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>{{ 'Eco Tax (' + invoice.eco + ')' }}</strong></td>
                        <td class="text-right">{{ '$' + invoice.eco }}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>{{ 'VAT (' + invoice.vat + ')' }}</strong></td>
                        <td class="text-right">{{ '$' + invoice.vat }}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Total</strong></td>
                        <td class="text-right">{{ '$' + totalSumWithVAt }}</td>
                    </tr>
                    </tbody>
                </table>
            </li>
            <li class="buttons">
                <button @click="viewCart(false)">view cart</button>
                <button>Checkout</button>
            </li>
        </ul>
    </div>
</template>

<script>
import {eventBus} from "../../../app";
import productService from "../../../productService";
import CartDropdownItem from "./CartDropdownItem";

export default {
    name: "cart-dropdown",
    components: {CartDropdownItem},
    emits: [
        'itemAmountChange'
    ],
    data() {
        return {
            order: {},
            carts: [],
            productIds: [],
            products: [],
            positions: [],
            totalForProducts: 0,
            invoice: {
                eco: 2,
                vat: 20
            },
        }
    },
    computed: {
        totalSumWithVAt() {
            return this.totalSum + this.invoice.eco + this.invoice.vat;
        },
        totalSum() {
            let sum = 0;
            for (let position of this.positions) {
                sum += position.price * position.amount;
            }
            return sum;
        }
    },
    created() {
        eventBus.$on('cartOpened', (event) => this.showCart(event));
    },
    methods: {
        async showCart(yes) {
            if (yes === true) {
                this.getCartItems();
                this.$refs.cart.style.height = 'auto';
            } else {
                this.$refs.cart.style.height = '0';
                this.positions = [];
            }
        },
        getCartItems() {
            productService.cartItems().then(carts => {
                this.carts = carts;
                this.positions = [];
                for (let order of this.carts) {
                    const ord = {
                        image: order.product.options[0].image,
                        price: order.product.price,
                        model: order.product.brand,
                        name: order.product.name,
                        amount: order.amount
                    }
                    this.positions.push(ord);
                }
            })
        },
        viewCart(event) {
            eventBus.$emit('cartOpened', event);
            this.$router.push({name: 'cart'});
        },
        amountChanges(newAmount, index) {
            let orders = JSON.parse(localStorage.getItem('order'));
            orders[index].amount = newAmount;
            localStorage.setItem('order', JSON.stringify(orders));
            eventBus.$emit('itemAmountChange')
            this.positions[index].amount = newAmount;
        },
        positionRemoved(index) {
            this.positions.splice(index, 1);
            eventBus.$emit('itemsCartChange');
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
    transition-timing-function: cubic-bezier(.01, .66, .47, 1.57);
}

button {
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

.table-row td:first-child {
    width: 40%;
}

img {
    max-width: 100%;
}

i {
    color: rgb(66, 66, 66);
}

a {
    text-decoration: none;
    color: rgb(126, 126, 126);
}
</style>
