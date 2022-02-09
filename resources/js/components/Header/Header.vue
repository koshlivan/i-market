<template>
    <header class="header-main">
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
import HeaderTop from './Attachments/Header-Top';
import Logo from './Attachments/Logo';
import Navigator from "./Attachments/Navigator";

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
.header-main {
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
