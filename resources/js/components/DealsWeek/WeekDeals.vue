<template>
    <div class="container">
        <navigator>deals of the week</navigator>
        <div class="preview-holder">
            <product-preview v-for="product in weeked"
                             :key="product.id"
                             :product="product"></product-preview>
        </div>
    </div>
</template>

<script>
import ProductPreview from "../FeaturedProduct/ProductPreview";
import Navigator from "../Navigator";
import productMixin from "../../productMixin";
export default {
    name: "week-deals",
    components: {Navigator, ProductPreview},
    mixins: [
        productMixin
    ],
    data(){
        return{
        }
    },
    computed: {
        weeked() {
            let arr = [];
            for (let i=0; i < 4; i++) {
                arr.push(this.products[i+6]);
            }
            console.log('array: ', JSON.stringify(arr));
            return arr;
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
    margin: 1rem 0;
}
</style>
