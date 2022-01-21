<template>
    <div class="product-card">
        <img :src="image" alt="product" @mouseover="imgHover" @mouseleave="imgBack">
        <div class="stars">
            <div v-for="(star, index) in stars">
                <div :class="{'rated' : index < product.stars}">
                <span class="material-icons">grade</span>
                </div>
            </div>
        </div>
        <p class="description">{{product.description}}</p>
        <h3 class="price">{{product.price}}</h3>
        <div class="product-actions">
            <product-menu></product-menu>
        </div>
    </div>

</template>

<script>
import ProductMenu from "./ProductMenu";
export default {
    name: "product-preview",
    components: {ProductMenu},
    props: [
       'product'
    ],
    data(){
        return {
             stars : 5,
            image: this.product.image
        }
    },
    methods: {
        imgHover(){
            this.image = this.product.image2;
        },
        imgBack(){
            this.image = this.product.image;
        }
    }
}
</script>

<style scoped>
.product-card {
    max-width: 15rem;
    position: relative;
    overflow-x: hidden;
}
.product-card img{
    max-width: 100%;
    max-height: 100%;
}
img {
    transition: 200ms;
}
.stars {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
.price, .description {
    text-align: center;
}
.rated{
    color: #e53a53;
}
.product-actions {
    position: absolute;
    transition: 500ms;
    top: 0;
    left: -5rem;
}
.product-card:hover .product-actions{
    transform: translateX(100px);
}
</style>
