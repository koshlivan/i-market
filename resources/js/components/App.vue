<template>
    <div class="wrapper">
        <Home></Home>
    </div>
</template>

<script>
import Home from './Home';
    export default {
        name: 'App',
        components: {
            Home
        },
    }
</script>

<style>
@import url('https://fonts.googleapis.com/icon?family=Material+Icons');
    .wrapper {
        box-sizing: border-box;
        color: rgb(158, 158, 158);
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: 0.5px;
        line-height: 24px;
        background-color: #1a1e21;
    }

collection-dropdown:hover .collection-dropdown-menu{
    display:flex;
}
</style>
