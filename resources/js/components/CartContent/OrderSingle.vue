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
            <div class="delete" @click.prevent="deletePosition">
                <i class="fas fa-trash-alt"></i>
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
        'quantityChange',
        'deletePosition'
    ],
    data() {
      return {
          orderQuant : this.amount
      }
    },
    computed: {
        totalPrice() {
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
            axios.post('/api/carts/'+this.order.cartId+'?amount='+this.orderQuant)
            .then( () => {
                this.$emit('quantityChange', this.orderQuant);
            });
        },
        deletePosition() {
            axios.delete('/api/carts/'+this.order.cartId)
            .then( () => {
                this.$emit('deletePosition');
            })
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
    position: relative;
}
.cell {
    padding-top: 1.2rem;
    border: solid 2px white;
    border-collapse: collapse;
    width: 100%;
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
.delete {
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: red;
    color: white;
    width: 2.5rem;
    height: 2.5rem;
    position: absolute;
    right: 0.5rem;
    bottom: 0.5rem;
}
.delete i {
    font-size: 1.5rem;
}
.delete:hover {
    cursor: pointer;
    background-color: #d05b64;
}
.delete:active {
    background-color: #5c1a1f;
    color: #d05b64;
}
</style>
