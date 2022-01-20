<template>
    <div class="product-horizont">
        <img :src="image" alt="" @mouseover="imgHover" @mouseleave="imgBack">
        <div class="desriptions">
            <a class="descript" href="#">{{product.description}}</a>
            <stars-rating :rating="product.stars"></stars-rating>
            <p>{{product.price}}</p>
        </div>
    </div>
</template>

<script>
import StarsRating from "../Rating/StarsRating";
export default {
    name: "product-horizont",
    components: {StarsRating},
    props: [
        'product'
    ],
    data() {
      return {
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
.product-horizont {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
}
.desriptions {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}
img {
    height: 10rem;
    margin: 0.2rem;
}
p, a {
    margin: 1rem 0;
}
a {
    text-decoration: none;
    color: rgb(156, 156, 156);
}
.descript:hover {
    color: rgb(40, 40, 40);
    cursor: pointer;
}
</style>
