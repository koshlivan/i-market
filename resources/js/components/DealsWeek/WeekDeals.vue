<template>
    <div class="container">
        <navigator :heading="heading"></navigator>
        <div class="preview-holder">
            <product-preview v-for="product in products"
                             :key="product.description"
                             :product="product"></product-preview>
        </div>
    </div>
</template>

<script>
import ProductPreview from "../FeaturedProduct/ProductPreview";
import Navigator from "../Navigator";

export default {
    name: "week-deals",
    components: {Navigator, ProductPreview},
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
            ],
            heading: 'deals of the week'
        }
    }
}
</script>

<style scoped>
.product-navigator {
    margin-top: 1rem;
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
