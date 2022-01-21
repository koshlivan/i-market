<template>
    <div class="wrapper">
        <Header></Header>
        <router-view></router-view>
        <my-footer></my-footer>
        <go-to-top @goToTop="topFunction"></go-to-top>
    </div>
</template>

<script>
import Home from './Home';
import Header from './Header';
import MyFooter from "./Footer/Footer";
import AboutSkills from "./AboutComponents/Skills";
import AboutDoings from "./AboutComponents/Doings";
import GoToTop from "./GoToTopButton";
    export default {
        name: 'App',
        components: {
            GoToTop,
            AboutDoings,
            AboutSkills,
            MyFooter,
            Home,
            Header
        },
        methods :{
            topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        }
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
        background-color: black;
    }

collection-dropdown:hover .collection-dropdown-menu{
    display:flex;
}
</style>
