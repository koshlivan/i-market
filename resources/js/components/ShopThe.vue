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
                <div class="view-container">
                    <product-preview v-for="(product, index) in products"
                                     :key="index"
                                     :product="product"></product-preview>
                </div>
                <paginator-the :amount="amount"></paginator-the>
            </div>
        </div>
        <brand-list></brand-list>
    </div>
</template>

<script>
import PaginatorThe from "./Pagination/Paginator";
import FiltersSide from "./Filters/FiltersSide";
import SideMenu from "./SideMenu/SideMenu";
import PropositionsHor from "./FeaturedProduct/PropositionsHor";
import SortingThe from "./Sorting/SortingThe";
import ProductPreview from "./FeaturedProduct/ProductPreview";
import BrandList from "./Brands/BrandList";
export default {
    name: "shop-the",
    components: {
        BrandList,
        ProductPreview,
        SortingThe,
        PropositionsHor,
        FiltersSide,
        PaginatorThe,
        SideMenu
    },
    data() {
        return {
            amount: 10,
            perPage: 2,
            products: [
                {description : 'New IPS Screen'
                    , price : '$1M'
                    , image : 'assets/ProductPreview/product1-1.jpg'
                    , image2: 'assets/ProductPreview/product3-1.jpg'
                    , stars : 5},
                {description : 'New TFT Screen'
                    , price : '$70'
                    , image : 'assets/ProductPreview/product3-1.jpg'
                    , image2: 'assets/ProductPreview/product5-1.jpg'
                    , stars : 2},
                {description : 'New CRT Screen'
                    , price : '$300k'
                    , image : 'assets/ProductPreview/product5-1.jpg'
                    , image2: 'assets/ProductPreview/product9-1.jpg'
                    , stars : 4},
                {description : 'Old LCD Screen'
                    , price : '$500 000'
                    , image : 'assets/ProductPreview/product9-1.jpg'
                    , image2: 'assets/ProductPreview/product1-1.jpg'
                    , stars : 3},
                {description : 'Old LCD Screen'
                    , price : '$500 000'
                    , image : 'assets/ProductPreview/product3-1.jpg'
                    , image2: 'assets/ProductPreview/product9-1.jpg'
                    , stars : 3},
                {description : 'Old LCD Screen'
                    , price : '$500 000'
                    , image : 'assets/ProductPreview/product5-1.jpg'
                    , image2: 'assets/ProductPreview/product1-1.jpg'
                    , stars : 1},
                {description : 'Old LCD Screen'
                    , price : '$500 000'
                    , image : 'assets/ProductPreview/product1-1.jpg'
                    , image2: 'assets/ProductPreview/product5-1.jpg'
                    , stars : 2},
            ]
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
.view-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    align-content: stretch;
}
</style>
