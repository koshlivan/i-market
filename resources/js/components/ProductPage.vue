<template>
    <div class="product-page">
        <div class="side-menu">
            <side-menu></side-menu>
        </div>
        <div class="product-content">

        </div>
    </div>
</template>

<script>
import SideMenu from "./SideMenu/SideMenu";
export default {
    name: "product-page",
    components: {SideMenu}
}
</script>

<style scoped>
.product-page {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}
.side-menu {
    width: 28%;
}
.product-content {
    width: 70%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}

</style>
