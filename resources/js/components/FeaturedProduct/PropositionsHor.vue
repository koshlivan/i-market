<template>
    <div class="propositions-hor">
        <navigator>top products</navigator>
        <div class="propositions">
            <product-horizont v-for="(product, index) in proposed"
                              :key="index"
                              :product="product"></product-horizont>
        </div>
    </div>
</template>

<script>
import Navigator from "../Navigator";
import ProductHorizont from "./ProductPreviewHor";
import productMixin from "../../productMixin";
export default {
    name: "propositions-hor",
    components: {ProductHorizont, Navigator},
    mixins: [
        productMixin
    ],
    computed: {
        proposed() {
            let arr = [];
            for (let i=0; i<4; i++) {
                arr.push(this.products[i*2+3]);
            }
            return arr;
        }
    }
}
</script>

<style scoped>

</style>
