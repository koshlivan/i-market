<template>
    <div class="product-horizont">
        <img :src="'/'+product.options[0].image" alt="" @mouseover="imgHover" @mouseleave="imgBack">
        <div class="desriptions">
            <a class="descript" href="#" @click="nameClicked(product.id)">{{ product.name }}</a>
            <stars-rating :rating="product.rating"></stars-rating>
            <p>{{ '$' + product.price }}</p>
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
            image: this.product.options[0].image
        }
    },
    methods: {
        imgHover() {
            if (this.product.options[1].image !== '') {
                this.image = this.product.options[1].image;
            }
        },
        imgBack() {
            this.image = this.product.options[0].image;
        },
        nameClicked(id) {
            this.$router.push({name: 'product/' + id});
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
