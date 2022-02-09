<template>
    <div class="propositions-hor">
        <navigator>top products</navigator>
        <div class="propositions">
            <product-horizont v-for="(product, index) in proposed"
                              :key="product.id"
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
            proposed: []
        }
    },
    methods: {
        getSomeProduct(id) {
            return axios.get('/api/products/' + id);
        },
        async setProposed() {
            let arr = [];
            for (let i = 1; i < 9; i+=2) {
                const singleProduct = await this.getSomeProduct(i * 2 + 1);
                arr.push(singleProduct.data);
            }
            this.proposed = arr;
        }
    },
    created() {
        this.setProposed();
    }
}
</script>

<style scoped>

</style>
