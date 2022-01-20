<template>
    <div class="product-menu">
        <a href="#"><i class="fas fa-heart"></i></a>
        <a href="#"><i class="far fa-eye"></i></a>
        <a href="#"><i class="fas fa-tasks"></i></a>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</template>

<script>
export default {
    name: "product-menu"
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
}
a:hover {
    cursor: pointer;
    color: #fa4251;
}
</style>
