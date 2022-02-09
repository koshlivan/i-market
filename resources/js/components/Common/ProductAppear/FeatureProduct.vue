<template>
    <div class="container">
        <div class="product-navigator">
            <h3>Featured PRODUCTS</h3>
            <div class="filters">
                <a href="#">New Arrivals</a>
                <a href="#">Bestsellers</a>
                <a href="#">Featured</a>
                <div @click="goRight(false)"><span class="material-icons">arrow_back_ios</span></div>
                <div @click="goRight(true)"><span class="material-icons">arrow_forward_ios</span></div>
            </div>
        </div>
        <div class="preview-holder">
            <div class="slider" ref="slider">
                <product-preview v-for="(product, index) in featured"
                                 :key="product.id"
                                 :product="product"></product-preview>
            </div>
        </div>
    </div>
</template>
<script>
import ProductPreview from "./ProductPreview";
import productMixin from "../../../productMixin";

export default {
    name: "feature-product",
    components: {ProductPreview},
    mixins: [
        productMixin
    ],
    data() {
        return {
            featured: [],
            currentPosition: 0
        }
    },
    methods: {
        getSomeProduct(id) {
            return axios.get('/api/products/' + id);
        },
        async setProposed() {
            let arr = [];
            for (let i = 2; i < 6; i++) {
                const singleProduct = await this.getSomeProduct(i * 2+7);
                arr.push(singleProduct.data);
            }
            this.featured = arr;
        },
        goRight(condition) {
            if (condition) {
                if (this.currentPosition >= -10 * (this.featured.length - 3)) {
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
.product-navigator {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    border-bottom: solid 2px rgb(66, 66, 66);
}

.product-navigator h3 {
    text-transform: uppercase;
    color: white;
    font-weight: bold;
    padding-left: 1rem;
}

.filters {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: stretch;
}

.filters a {
    text-decoration: none;
    margin: 0 1rem;
    color: rgb(156, 156, 156);
    vertical-align: middle;
}

.filters a:hover {
    color: #e53a53;
}

.filters a:active {
    color: #790b30;
}

.filters span:hover {
    cursor: pointer;
    color: #e53a53;
}

.filters span:active {
    cursor: pointer;
    color: #790b30;
}

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
