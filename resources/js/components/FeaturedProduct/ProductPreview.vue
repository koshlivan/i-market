<template>
    <div class="product-card">
        <div class="image">
            <img :src="image" alt="product" @mouseover="imgHover" @mouseleave="imgBack">
        </div>
        <div class="product-info">
            <router-link tag="h4" class="clicker" :to="linkTo">{{product.name}}</router-link>
            <div class="stars">
                <div v-for="index in 5">
                    <div :class="{'rated' : index <= product.rating}">
                        <span class="material-icons">grade</span>
                    </div>
                </div>
            </div>
            <p class="description">{{product.description}}</p>
            <h3 class="price">{{'$'+product.price}}</h3>
        </div>
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
    computed: {
      linkTo() {
          return '/product/'+this.product.id;
      }
    },
    watch: {
        product(){
            this.imgBack();
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
    /*max-width: 15rem;*/
    max-width: 30%;
    min-width: 23%;
    margin: 0.5rem;
    position: relative;
    overflow: hidden;
}
.image img{
    max-width: 100%;
    max-height: 100%;
}
.product-info {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.clicker:hover{
    cursor:pointer;
}
.image {
    width: 100%;
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
@media (orientation: portrait) {
    .product-card {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: stretch;
    }
    .image {
        width: 33%;
    }
    .product-info {
        width: 65%;
    }
}
</style>
