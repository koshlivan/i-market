<template>
    <h5 @click="addToCart">
        <i class="fas fa-shopping-cart"></i>
    </h5>
</template>

<script>
import {eventBus} from "../../app";

export default {
    name: "add-to-cart-button",
    emits: [
        'itemsCartChange',
        'addToCart'
    ],
    methods: {
        addToCart() {
            this.$emit('addToCart');
            eventBus.$emit('itemsCartChange');
        }
    }
}
</script>

<style scoped>
h5 {
    color: white;
    text-shadow: 0 0 3px black, 0 0 5px #e53a53;
}

h5:hover {
    color: #e53a53;
    cursor: pointer;
}

h5:active {
    color: #e0354a;
}
</style>
