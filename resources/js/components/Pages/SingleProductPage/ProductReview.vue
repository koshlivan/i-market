<template>
    <div class="container">
        <div class="product-review">
            <div class="side-menu">
                <side-menu></side-menu>
            </div>
            <div class="product-view-part">
                <single-product-view :productId="$route.params.id"></single-product-view>
                <navigator>related products</navigator>
                <div class="product-container">
                    <product-preview v-for="(product, index) in related"
                                     :key="product.id"
                                     :product="product"></product-preview>
                </div>

            </div>

        </div>
        <brand-list></brand-list>
    </div>
</template>

<script>
import SingleProductView from "./Attachments/SingleProductView";
import SideMenu from "../../SideMenu/SideMenu";
import PropositionsHor from "../../Common/ProductAppear/PropositionsHor";
import Navigator from "../../Common/Navigator";
import ProductPreview from "../../Common/ProductAppear/ProductPreview";
import BrandList from "../../Common/Brands/BrandList";
import productMixin from "../../../productMixin";
import productService from "../../../productService";

export default {
    name: "product-review",
    components: {BrandList, ProductPreview, Navigator, PropositionsHor, SideMenu, SingleProductView},
    mixins: [
        productMixin
    ],
    data() {
        return {
            related: []
        }
    },
    computed: {

        product() {
            this.getProduct();
        }
    },
    methods: {
        async getProduct() {
            const product = await productService.getSingleProduct(this.$route.params.id);
            return product.data;
        },
        getSomeProduct(id) {
            return axios.get('/api/products/' + id);
        },
        async setProposed() {
            let arr = [];
            for (let i = 1; i < 9; i+=2) {
                let singleProduct = await this.getSomeProduct(i * 2 + 1);
                arr.push(singleProduct.data);
            }
            this.related = arr;
        },

    },
    created() {
        this.setProposed();
    }
}
</script>

<style scoped>
.product-review {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}

.side-menu {
    width: 28%;
}

.product-view-part {
    width: 70%;
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
