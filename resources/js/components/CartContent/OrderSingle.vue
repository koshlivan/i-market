<template>
    <div class="order-single">
            <div class="cell">
                <img :src="order.image" alt="order-image">
            </div>
            <div class="cell">
                {{order.name}}
            </div>
            <div class="cell">
                {{order.model}}
            </div>
            <div class="cell">
                <input type="number" min="0" @change="sendQuantity" v-model="amount">
            </div>
            <div class="cell">
                {{order.price}}
            </div>
            <div class="cell">
                {{totalPrice}}
            </div>
    </div>
</template>

<script>
export default {
    name: "order-single",
    props: [
        'order'
    ],
    emits:[
        'quantityChange'
    ],
    data() {
      return {
          orderQuant : this.amount
      }
    },
    computed: {
        totalPrice() {
            //return Number.parseFloat(this.order.price)  * Number.parseInt(this.order.quantity);
            return this.order.price  * this.order.quantity;
        },
        amount : {
            get() {
                return this.order.quantity;
            },
            set(value) {
                this.orderQuant = value;
            }
        }
    },
    methods: {
        sendQuantity(){
            this.$emit('quantityChange');
        }
    }
}
</script>

<style scoped>
.order-single {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: stretch;
    align-items: stretch;
    min-height: 4rem;
}
.cell {
    padding-top: 1.2rem;
    border: solid 2px white;
    border-collapse: collapse;
    width: 16%;
    display: flex;
    align-content: center;
    justify-content: center;
}
.cell img {
    max-width: 90%;
}
input {
    margin-top: 0;
    width: 5rem;
    height: 1.8rem;
}

</style>
