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
            <product-preview v-for="product in products"
                             :key="product.description"
                             :product="product"></product-preview>
        </div>
    </div>
</template>
<script>
import ProductPreview from "./ProductPreview";
export default {
    name: "feature-product",
    components: {ProductPreview},
    data(){
        return{
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
