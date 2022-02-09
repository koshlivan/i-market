<template>
    <div class="order-list">
        <div class="confirmation" role="alert" v-show="isHasConfirmed" @click="closeConfirmed">
            Congratulations, your order has been sent!
        </div>
        <table>
            <tr>
                <th>image</th>
                <th>product name</th>
                <th>model</th>
                <th>quantity</th>
                <th>unit price</th>
                <th>total</th>
            </tr>
        </table>
        <div class="order-rows">
            <order-single v-for="(order, index) in orderes"
                          :key="index"
                          :order="order"
                          @deletePosition="deletePosition(index)"
                          @update:amount="quantityChange($event, index)"
                          :index="index">
            </order-single>
        </div>
        <h4>What would you like to do next?</h4>
        <p>Choose if you have a discount code or reward points
            you want to use or would like to estimate your delivery cost.
        </p>
        <payment-options></payment-options>
        <invoice-the :order-total="orderTotal"></invoice-the>
        <div class="options-buttons">
            <button @click="goShopping">continue shopping</button>
            <button @click="buyComplete">checkout</button>
        </div>
        <div class="loading" v-show="loading">
            <div class="spinner-border text-danger" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script>
import OrderSingle from "./OrderSingle";
import PaymentOptions from "./PaymentOptions";
import InvoiceThe from "./InvoiceThe";
import productService from "../../../../productService";
import {eventBus} from "../../../../app";

export default {
    name: "order-list",
    components: {InvoiceThe, PaymentOptions, OrderSingle},
    emits: [
        'itemsCartChange'
    ],
    data() {
        return {
            orderes: [],
            orderTotal: {
                totalSum: 0,
                ecoTax: 2,
                vat: 20,
                entireCost: 0
            },
            isHasConfirmed: false,
            orders: [],
            products: [],
            carts: [],
            loading: false,
        }
    },
    computed: {
        calculateWithVat() {
            return this.calculateTotal() + this.orderTotal.ecoTax + this.orderTotal.vat;
        },
    },
    created() {
        eventBus.$on('itemsCartChange', () => {
            this.getOrders();
        })
        eventBus.$on('itemAmountChange', () => {
            this.getOrders();
        })
        this.getOrders();
    },
    methods: {
        getOrders() {
            productService.cartItems().then(orders => {
                this.orders = orders;
                this.orderes = [];
                for (let order of this.orders) {
                    let ord = {
                        image: order.product.options[0].image,
                        price: order.product.price,
                        model: order.product.brand,
                        name: order.product.name,
                        quantity: order.amount
                    }
                    this.orderes.push(ord);
                    this.orderTotal.totalSum = this.calculateTotal();
                    this.calculateEntire();
                }
            });
        },
        async buyComplete() {
            if (!localStorage.getItem('x_xsrf_token')) {
                alert('You have to log in to complete operation');
            } else {
                this.loading = true;
                let user = await axios.get('/api/user');
                let order = await axios.post('/api/orders', {
                    is_done: 1,
                    user_id: user.data.id
                });

                for (let i = 0; i < this.orderes.length; i++) {
                    let cart = {
                        order: order.data.id,
                        product: this.orders[i].product.id,
                        amount: this.orderes[i].quantity
                    }
                    await this.fillCart(cart)
                    .catch( error => {
                        console.log(error.response.data.message);
                    });
                }
                this.orderes = [];
                localStorage.removeItem('order');
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                this.isHasConfirmed = true;
                this.loading = false;
                this.orderTotal.totalSum = this.calculateTotal();
                this.calculateEntire();
                eventBus.$emit('itemsCartChange');
            }
        },
        fillCart(cart) {
            return axios.post('/api/carts', {
                order: cart.order,
                product: cart.product,
                amount: cart.amount
            })
        },
        closeConfirmed() {
            this.isHasConfirmed = false;
        },
        goShopping() {
            this.$router.push('shop');
        },
        getProduct(id) {
            return axios.get('/api/products/' + id);
        },
        async setProducts(carts) {
            let products = [];
            for (let i = 0; i < carts.length; i++) {
                let product = await this.getProduct(carts[i].product_id);
                products.push(product.data);
            }
            return products;
        },
        fillOrders(carts, products) {
            this.orderes = [];
            for (let i = 0; i < carts.length; i++) {
                let oneRow = {
                    cartId: carts[i].id,
                    model: products[i].name,
                    name: products[i].brand,
                    price: products[i].price,
                    quantity: carts[i].amount,
                    image: products[i].options[0].image,
                };

                this.orderes.push(oneRow);
            }
        },
        calculateTotal() {
            let total = 0;
            for (let row of this.orderes) {
                total += row.quantity * row.price;
            }
            return total;
        },
        calculateEntire() {
            this.orderTotal.entireCost
                = this.orderTotal.totalSum
                + this.orderTotal.ecoTax
                + this.orderTotal.vat;
        },

        deletePosition(index) {
            this.orderes.splice(index, 1);
            this.orderTotal.totalSum = this.calculateTotal();
        },
        quantityChange(amount, index) {
            this.orderes[index].quantity = amount;
            this.orderTotal.totalSum = this.calculateTotal();
            this.orderTotal.entireCost
                = this.orderTotal.totalSum
                + this.orderTotal.ecoTax
                + this.orderTotal.vat;
        }
    }
}
</script>

<style scoped>
.order-list {
    width: 100%;
    margin: 2rem 0;
}

table {
    border: solid 2px white;
    width: 100%;
}

th {
    text-transform: capitalize;
    text-align: center;
    font-weight: 600;
    border: solid 2px white;
    border-collapse: collapse;
    height: 2.5rem;
    color: rgb(200, 200, 200);
    width: 15%;
}

.order-rows {
    width: 100%;
}

h4 {
    margin: 2rem 0;
}

.options-buttons {
    margin: 2rem 0;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
}

.options-buttons button {
    padding: 0.6rem 2rem;
    background-color: rgb(156, 156, 156);
    text-transform: uppercase;
    border: none;
    color: white;
}

.options-buttons button:hover {
    cursor: pointer;
    background-color: rgb(176, 176, 176);
}

.options-buttons button:active {
    color: rgb(66, 66, 66);
    background-color: rgb(100, 100, 100);
}

.confirmation {
    width: 100%;
    height: 4rem;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #7eb37e;
    color: white;
    border: dotted 2px #36c636;
    border-radius: 3px;
    font-weight: 600;
    font-size: 1.5rem;
    margin: 2rem 0;
}

.loading {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(128, 128, 128, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 2;
}
</style>
