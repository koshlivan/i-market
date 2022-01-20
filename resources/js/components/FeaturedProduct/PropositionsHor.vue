<template>
    <div class="propositions-hor">
        <navigator>top products</navigator>
        <div class="propositions">
            <product-horizont v-for="(product, index) in products"
                              :key="index"
                              :product="product"></product-horizont>
        </div>
    </div>
</template>

<script>
import Navigator from "../Navigator";
import ProductHorizont from "./ProductPreviewHor";
export default {
    name: "propositions-hor",
    components: {ProductHorizont, Navigator},
    data() {
        return {
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
            ]
        }
    }
}
</script>

<style scoped>

</style>
