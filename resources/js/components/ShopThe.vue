<template>
    <div class="container">
        <div class="wrapper">
            <div class="side-menu">
                <side-menu>
                    <filters-side></filters-side>
                </side-menu>
                <propositions-hor></propositions-hor>
            </div>
            <div class="shop">
                <sorting-the></sorting-the>
                <paginator-the :amount="amount"></paginator-the>
            </div>
        </div>

    </div>
</template>

<script>
import PaginatorThe from "./Pagination/Paginator";
import FiltersSide from "./Filters/FiltersSide";
import SideMenu from "./SideMenu/SideMenu";
import PropositionsHor from "./FeaturedProduct/PropositionsHor";
import SortingThe from "./Sorting/SortingThe";
export default {
    name: "shop-the",
    components: {
        SortingThe,
        PropositionsHor,
        FiltersSide,
        PaginatorThe,
        SideMenu
    },
    data() {
        return {
            amount: 10,
            perPage: 2
        }
    }
}
</script>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 1.5rem;
}
.side-menu {
    width: 28%;
}
.shop {
    width: 70%;
}
</style>
