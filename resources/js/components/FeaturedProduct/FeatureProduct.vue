<template>
    <div class="container">
        <div class="product-navigator">
            <h3>Featured PRODUCTS</h3>
            <div class="filters">
                <a href="#">New Arrivals</a>
                <a href="#">Bestsellers</a>
                <a href="#">Featured</a>
                <div><span class="material-icons">arrow_back_ios</span></div>
                <div><span class="material-icons">arrow_forward_ios</span></div>
            </div>
        </div>
        <div class="preview-holder">
            <product-preview v-for="(product, index) in featured"
                             :key="product.id"
                             :product="product"></product-preview>
        </div>
    </div>
</template>
<script>
import ProductPreview from "./ProductPreview";
import productMixin from "../../productMixin";

export default {
    name: "feature-product",
    components: {ProductPreview},
    mixins: [
        productMixin
    ],
    data() {
      return {
          featured : []
      }
    },
    methods: {
        getSomeProduct(id) {
            return axios.get('/api/products/'+id);
        },
        async setProposed() {
            let arr = [];
            for (let i=1; i<5; i++) {
                const singleProduct = await  this.getSomeProduct(i*3);
                arr.push(singleProduct.data);
            }
            this.featured = arr;
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
.product-navigator h3{
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
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: stretch;
}
</style>
