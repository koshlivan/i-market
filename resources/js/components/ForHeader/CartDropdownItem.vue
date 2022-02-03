<template>
    <div class="cart-dropdown-item">
            <div class="preview">
                <img :src="'/'+position.image" alt="iPod Classic" title="iPod Classic">
            </div>
            <div class="name-qnty">
                <a href="#">{{ position.name }}</a> <span class="text-left price">{{ '$'+position.price }}</span>
                <input class="quantity" name="product_quantity" min="1" v-model="amount" type="number">
            </div>
            <div class="delete" @click="deletePosition">
                <a class="close-cart"><i class="fa fa-times-circle"></i></a>
            </div>
    </div>
</template>

<script>
export default {
    name: "cart-dropdown-item",
    props: [
      'position'
    ],
    emits: [
        'update:amount',
        'positionRemoved'
    ],
    data() {
        return {
        }
    },
    computed : {
        amount : {
            get() {
                return this.position.amount;
            },
            set(value) {
                this.$emit('update:amount', value);
            }
        }
    },
    methods : {
        deletePosition() {
            let orders = JSON.parse( localStorage.getItem('order') );
            orders.splice(this.index, 1);
            localStorage.setItem('order', JSON.stringify(orders));
            this.$emit('positionRemoved');
            // if ( confirm("Are you sure? Position will be deleted") ) {
            //     axios.delete('/api/carts/'+this.position.cart_id)
            //     .then( () => {
            //         this.$emit('positionRemoved');
            //     })
            // }
        }
    }
}
</script>

<style scoped>
.cart-dropdown-item {
    width: 100%;
    padding: 0.5rem;
    heigth: 5rem;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    border-bottom: solid 1px #ddd;
    position: relative;
}
.preview {
    width: 30%;
    margin: 0.3rem;
}
.preview img {
    width: 100%;
}
.delete {
    position: absolute;
    top: 3%;
    right: 3%;
}
.delete a {
    color: #555;
    font-size: 0.8rem;
}
.delete:hover a i{
    cursor: pointer;
    color: #222;
}
.delete:active a i{
    color: #aaa;
}
.quantity {
    width: 3rem;
    margin-bottom: 0.3rem;
}
.name-qnty {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    margin: 0.2rem 1rem;
}
.name-qnty a {
    color: #666;
    text-decoration: none;
    text-transform: capitalize;
    font-weight: 500;
}
</style>
