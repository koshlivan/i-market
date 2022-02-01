<template>
    <div class="order-list">
        <div class="alert alert-success" role="alert" v-show="isHasConfirmed" @click="closeConfirmed">
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
        <div class="order-rows" >
            <order-single v-for="(order, index) in orderes"
                          :key="index"
                          :order="order"
                          @deletePosition="deletePosition(index)"
                          @quantityChange="quantityChange($event, index)">
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
    </div>
</template>

<script>
import OrderSingle from "./OrderSingle";
import PaymentOptions from "./PaymentOptions";
import InvoiceThe from "./InvoiceThe";
export default {
    name: "order-list",
    components: {InvoiceThe, PaymentOptions, OrderSingle},
    props: [
    ],
    data() {
        return {
            orderes : [
                {image: '/assets/ProductPreview/product1-1.jpg',
                name: 'Iphone',
                model: 'XS',
                price: 200,
                quantity: 2
                },
                {image: '/assets/ProductPreview/product5-1.jpg',
                    name: 'Xiaomi',
                    model: 'E334',
                    price: 300,
                    quantity: 1
                },
                {image: '/assets/ProductPreview/product3-1.jpg',
                    name: 'Nokia',
                    model: '7X',
                    price: 400,
                    quantity: 3
                },
            ],
            orderTotal: {
                totalSum: 500,
                ecoTax: 2,
                vat: 20,
                entireCost: 522
            },
            isHasConfirmed : false,
            orders: [],
            products: [],
            carts: []
        }
    },
    created() {
      this.getAllValues()
    },
    methods : {
        async getAllValues() {
            const response = await axios.get('/api/orders');

                    this.orders = response.data;
                    this.carts = this.orders[0].carts;
                    this. products = await this.setProducts(this.carts);
                    console.log('carts and products: ', this.carts, this.products);
                    await this.fillOrders(this.carts, this.products);
                    this.orderTotal.totalSum = this.calculateTotal();
        },
        buyComplete() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            this.isHasConfirmed = true;
            axios.post('/api/orders/'+2
                +'?is_done='+true)
            .then( response => {
                this.orderes = [];
            })
        },
        closeConfirmed() {
            this.isHasConfirmed = false;
        },
        goShopping() {
            this.$router.push('shop');
        },
        getProduct(id) {
           return axios.get('/api/products/'+id);
        },
        async setProducts(carts) {
            let products = [];
            for (let i=0; i<carts.length; i++) {
                const product = await this.getProduct(carts[i].product_id);
                products.push(product.data);
            }
            return products;
        },
        fillOrders(carts, products) {
            this.orderes = [];
            for (let i=0; i<carts.length; i++) {
                console.log('product: ', products[i]);
                const oneRow = {
                    cartId: carts[i].id,
                    model : products[i].name,
                    name : products[i].brand,
                    price : products[i].price,
                    quantity : carts[i].amount,
                    image : products[i].options[0].image,
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
        deletePosition(index) {
            this.orderes.splice(index, 1);
            this.orderTotal.totalSum = this.calculateTotal();
        },
        quantityChange(amount, index) {
            this.orderes[index].quantity = amount;
            this.orderTotal.totalSum = this.calculateTotal();
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
.order-rows{
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
</style>
