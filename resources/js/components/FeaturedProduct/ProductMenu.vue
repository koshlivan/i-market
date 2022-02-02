<template>
    <div class="product-menu">
        <a href="#"><i class="fas fa-heart"></i></a>
        <a href="#"><i class="far fa-eye"></i></a>
        <a href="#"><i class="fas fa-tasks"></i></a>
        <add-to-cart-button @addToCart="$emit('addToCart')"></add-to-cart-button>
    </div>
</template>

<script>
import AddToCartButton from "../AddToCartButton";
export default {
    name: "product-menu",
    components: {AddToCartButton},
    emits: [
        'addToCart'
    ]
}
</script>

<style scoped>
.product-menu {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-content: flex-start;
    width: 3rem;
    height: 25rem;
}
a {
    color: white;
    font-size: 1.2rem;
    margin: 0.5rem 0;
    text-shadow: 0 0 5px black, 0 0 2px #fa4251;
}
a:hover {
    cursor: pointer;
    color: #fa4251;
}
</style>
