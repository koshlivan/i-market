<template>
    <header id="header">
        <header-top></header-top>
        <div class="header">
            <div class="container">
                <Logo></Logo>
                <Navigator></Navigator>
            </div>
        </div>
    </header>
</template>

<script>
import HeaderTop from './ForHeader/Header-Top';
import Logo from './ForHeader/Logo';
import Navigator from "./ForHeader/Navigator";
export default {
    name: "Header",
    components: {
        Navigator,
        HeaderTop,
        Logo
    }
}
</script>

<style scoped>
    #header {
        box-sizing: border-box;
        color: rgb(158, 158, 158);
        display: block;
        font-family: "Poppins", sans-serif;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: 0.5px;
        line-height: 24px;
    }
</style>
