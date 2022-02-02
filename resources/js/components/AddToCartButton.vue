<template>
    <h5 @click="$emit('addToCart')">
        <i class="fas fa-shopping-cart"></i>
    </h5>
</template>

<script>
export default {
    name: "add-to-cart-button",
    emits: [
        'addToCart'
    ]
}
</script>

<style scoped>
h5:hover {
    color: #ccc;
    cursor: pointer;
}
h5:active {
    color: #555;
}
</style>
