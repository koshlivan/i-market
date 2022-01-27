<template>
    <div class="product-card">
        <img :src="image" alt="product" @mouseover="imgHover" @mouseleave="imgBack">
        <h4>{{product.name}}</h4>
        <div class="stars">
            <div v-for="index in 5">
                <div :class="{'rated' : index <= product.rating}">
                <span class="material-icons">grade</span>
                </div>
            </div>
        </div>
        <p class="description">{{product.description}}</p>
        <h3 class="price">{{'$'+product.price}}</h3>
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
            image: this.product.options[0].image
        }
    },
    methods: {
        imgHover(){
            if (this.product.options[1].image !== '') {
                this.image = this.product.options[1].image;
            }
        },
        imgBack(){
            this.image = this.product.options[0].image;
        }
    }
}
</script>

<style scoped>
.product-card {
    max-width: 15rem;
    margin: 0 0.5rem;
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
.description {
    height: 5rem;
    overflow: auto;
}
h4 {
    text-transform: uppercase;
    text-align: center;
}
</style>
