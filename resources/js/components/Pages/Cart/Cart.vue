<template>
    <div class="container">
        <div class="cart-page">
            <div class="side-menu">
                <side-menu></side-menu>
                <propositions-hor></propositions-hor>
            </div>
            <div class="cart-part">
                <order-list></order-list>
            </div>
        </div>
        <brand-list></brand-list>
    </div>
</template>

<script>
import SideMenu from "../../SideMenu/SideMenu";
import PropositionsHor from "../../Common/ProductAppear/PropositionsHor";
import BrandList from "../../Common/Brands/BrandList";
import OrderList from "./Attachments/OrderList";

export default {
    name: "cart-the",
    components: {OrderList, BrandList, PropositionsHor, SideMenu},
    data() {
        return {
            positions: []
        }
    },
    methods: {}
}
</script>

<style scoped>
.cart-page {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}

.side-menu {
    width: 28%;
}

.cart-part {
    width: 70%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
</style>
