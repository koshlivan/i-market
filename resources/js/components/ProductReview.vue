<template>
    <div class="container product-review">
        <div class="product-review">
            <div class="side-menu">
                <side-menu></side-menu>
                <propositions-hor></propositions-hor>
            </div>
            <div class="product-view-part">
                <single-product-view :product="products[0]"></single-product-view>
                <navigator>related products</navigator>
                <div class="product-container">
                    <product-preview v-for="(product, index) in products"
                                     :key="index"
                                     :product="product"></product-preview>
                </div>
                <brand-list></brand-list>
            </div>
        </div>

    </div>
</template>

<script>
import SingleProductView from "./SingleProductPage/SingleProductView";
import SideMenu from "./SideMenu/SideMenu";
import PropositionsHor from "./FeaturedProduct/PropositionsHor";
import Navigator from "./Navigator";
import ProductPreview from "./FeaturedProduct/ProductPreview";
import BrandList from "./Brands/BrandList";
export default {
    name: "product-review",
    components: {BrandList, ProductPreview, Navigator, PropositionsHor, SideMenu, SingleProductView},
    data() {
        return {
            products : [
        {description : 'New IPS Screen'
            , price : '$1M'
            , images : ['assets/ProductPreview/product1-1.jpg',
                        'assets/ProductPreview/product3-1.jpg',
                        'assets/ProductPreview/product9-1.jpg']
            , stars : 5
            , reviews: ['Not bad', 'the worst quality', 'piece of s*', 'good enough', 'wow!']
        },
        {description : 'New TFT Screen'
            , price : '$70'
            , images : ['assets/ProductPreview/product3-1.jpg',
                        'assets/ProductPreview/product5-1.jpg']
            , stars : 2,
            reviews: ['Not bad', 'the worst quality', 'piece of s*', 'good enough', 'wow!']
        },
        {description : 'New CRT Screen'
            , price : '$300k'
            , images : ['assets/ProductPreview/product5-1.jpg',
                       'assets/ProductPreview/product9-1.jpg']
            , stars : 4,
            reviews: ['Not bad', 'the worst quality', 'piece of s*', 'good enough', 'wow!']
        },
        {description : 'Old LCD Screen'
            , price : '$500 000'
            , images : ['assets/ProductPreview/product9-1.jpg',
                        'assets/ProductPreview/product1-1.jpg']
            , stars : 3,
            reviews: ['Not bad', 'the worst quality', 'piece of s*', 'good enough', 'wow!']
        }
            ]
        }
    }
}
</script>

<style scoped>
.product-review{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}
.side-menu {
    width: 28%;
}
.product-view-part {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.product-container {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    overflow-x: auto;
}
</style>
