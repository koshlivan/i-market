<template>
    <div id="cart-dropdown" class="cart-menu collapse" ref="cart">
        <ul>
            <li>
                <cart-dropdown-item v-for="(position, index) in positions"
                                    :key="index"
                                    :position="position"
                                    @positionRemoved="positionRemoved(index)"
                                    @update:amount="amountChanges($event, position.cart_id, index)"></cart-dropdown-item>

            </li>
            <li>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>Sub-Total</strong></td>
                        <td class="text-right">{{ '$'+totalSum }}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>{{ 'Eco Tax ('+invoice.eco+')' }}</strong></td>
                        <td class="text-right">{{ '$'+invoice.eco}}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>{{ 'VAT ('+invoice.vat+')' }}</strong></td>
                        <td class="text-right">{{ '$'+invoice.vat}}</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Total</strong></td>
                        <td class="text-right">{{ '$'+totalSumWithVAt }}</td>
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
import CartDropdownItem from "./CartDropdownItem";
export default {
    name: "cart-dropdown",
    components: {CartDropdownItem},
    props: [

    ],
    data() {
        return {
            order : {},
            carts : [],
            productIds : [],
            products : [],
            positions: [],
            totalForProducts : 0,
            invoice : {
                eco : 2,
                vat : 20
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
              sum += position.price*position.amount;
          }
            return sum;
        }
    },
    created() {
            eventBus.$on('cartOpened', (event) => this.showCart(event));
    },
    methods : {
        async showCart(yes) {
            if (yes === true ){
                this.positions = [];
                axios.get('/api/orders/'+1)
                .then(response => {
                    this.carts = response.data.carts;
                    this.mergeToPosition(this.carts);
                    this.$refs.cart.style.height = 'auto';
                })
            } else {
                this.$refs.cart.style.height = '0';
                this.positions = [];
            }
        },
        mergeToPosition(carts) {
          for (let i=0; i < carts.length; i++) {
              let position = {};
              position.cart_id = carts[i].id;
              position.amount = carts[i].amount;
              position.price = carts[i].product.price;
              position.name = carts[i].product.name;
              position.image = carts[i].product.options[0].image;

              this.positions.push(position);
          }
        },
        viewCart(event) {
            eventBus.$emit('cartOpened', event);
            this.$router.push({name : 'cart'});
        },
        amountChanges(newAmount, id, index) {
            axios.put('/api/carts/'+id
                                        +'?amount='
                                        +newAmount)
            .then( () => this.positions[index].amount = newAmount);
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
