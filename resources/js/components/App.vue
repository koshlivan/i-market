<template>
    <div class="wrapper">
        <Header></Header>
<!--        <div class="main-block" :class="{container : showSide}">-->
<!--            <div class="side-menu">-->
<!--                <side-menu v-show="showSide"></side-menu>-->
<!--            </div>-->
<!--            <div class="content">-->
                <router-view></router-view>
<!--            </div>-->
<!--        </div>-->
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
import SideMenu from "./SideMenu/SideMenu";
    export default {
        name: 'App',
        components: {
            SideMenu,
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
        },
        computed: {
            showSide() {
                console.log('this route: ', JSON.stringify(this.$route));
                return this.$route.name !== 'home';
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
.main-block{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}
.side-menu {
    width: 28%;
}
.content {
    width: 100%;
}

</style>
