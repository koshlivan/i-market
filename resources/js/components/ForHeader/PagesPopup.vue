<template>
    <ul class="dropdown-menu" @mouseover="$emit('mouseover')" @mouseleave="$emit('mouseleave')">
        <li> <router-link tag="a" class="link-to" to="/cart">Cart</router-link></li>
        <li> <a href="#">Checkout</a></li>
        <li> <router-link tag="a" class="link-to" to="/product/2">Product Detail Page</router-link></li>
        <li> <a href="#">Single Post</a></li>
    </ul>
</template>

<script>
export default {
    name: "pages-popup"
}
</script>

<style scoped>
    ul {
        display: flex;
        background-color: rgb(66, 66, 66);
        list-style-type: none;
        list-style-image: none;
        flex-direction: column;
        justify-content: flex-start;
        align-items: stretch;
        position: absolute;
        top: 3.5rem;
        left: 50%;
    }
    a {
        text-decoration: none;
        color: rgb(205, 205, 205);
        font-weight: 500;
        padding: 0.5rem;
    }
    li:hover {
        background-color: #e53a53;
    }
</style>
