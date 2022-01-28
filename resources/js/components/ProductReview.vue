<template>
    <div class="container product-review">
        <div class="product-review">
            <div class="side-menu">
                <side-menu></side-menu>
            </div>
            <div class="product-view-part">
                <single-product-view :product="product"></single-product-view>
                <navigator>related products</navigator>
                <div class="product-container">
                    <product-preview v-for="(product, index) in related"
                                     :key="product.id"
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
import productMixin from "../productMixin";
import productService from "../productService";
export default {
    name: "product-review",
    components: {BrandList, ProductPreview, Navigator, PropositionsHor, SideMenu, SingleProductView},
    mixins: [
        productMixin
    ],
    data() {
      return {

      }
    },
    computed: {
        related() {
            let arr = [];
            for (let i=0; i < 4; i++) {
                arr.push(this.products[i*3]);
            }
            return arr;
        },
        product () {
            return this.getProduct();
        }
    },
    // watch: {
    //   product() {
    //       this.getProduct();
    //   }
    // },
    methods: {
        async getProduct() {
            console.log('route params: ', this.$route.params.id);
             const product = await productService.getSingleProduct(this.$route.params.id);
            console.log('receive single product: ', JSON.stringify(product));
             return  product.data;
        }
    },
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
