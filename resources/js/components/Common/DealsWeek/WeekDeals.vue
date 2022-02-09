<template>
    <div class="container">
        <navigator @lineMove="lineMove($event)">deals of the week</navigator>
        <div class="preview-holder">
            <div class="slider" ref="slider">
                <product-preview
                    v-for="product in weeked"
                    :key="product.id"
                    :product="product">
                </product-preview>
            </div>
        </div>
    </div>
</template>

<script>
import ProductPreview from "../ProductAppear/ProductPreview";
import Navigator from "../Navigator";
import productMixin from "../../../productMixin";

export default {
    name: "week-deals",
    components: {Navigator, ProductPreview},
    mixins: [
        productMixin
    ],
    data() {
        return {
            weeked: [],
            currentPosition: 0
        }
    },
    methods: {
        getSomeProduct(id) {
            return axios.get('/api/products/' + id);
        },
        async setProposed() {
            let arr = [];
            for (let i = 15; i <= 18; i++) {
                const singleProduct = await this.getSomeProduct(i);
                arr.push(singleProduct.data);
            }
            this.weeked = arr;
        },
        lineMove(condition) {
            if (condition) {
                if (this.currentPosition >= -10 * (this.weeked.length - 3)) {
                    this.currentPosition -= 10;
                    this.$refs.slider.style.transform = `translate(${this.currentPosition}rem, 0)`;
                }
            } else {
                if (this.currentPosition <= -10) {
                    this.currentPosition += 10;
                    this.$refs.slider.style.transform = `translate(${this.currentPosition}rem, 0)`;
                }
            }
        }
    },
    created() {
        this.setProposed();
    }
}
</script>

<style scoped>
.preview-holder {
    position: relative;
    overflow-x: hidden;
    min-height: 20rem;
}
.slider {
    display: flex;
    min-width: 900px;
    min-height: 500px;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    position: relative;
    transition: 600ms;
}
</style>
