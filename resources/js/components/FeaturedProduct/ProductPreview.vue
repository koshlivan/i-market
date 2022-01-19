<template>
    <div class="product-card">
        <img :src="product.image" alt="product">
        <div class="stars">
            <div v-for="(star, index) in stars">
                <div :class="{'rated' : index < product.stars}">
                <span class="material-icons">grade</span>
                </div>
            </div>
        </div>
        <p class="description">{{product.description}}</p>
        <h3 class="price">{{product.price}}</h3>
    </div>

</template>

<script>
export default {
    name: "product-preview",
    props: [
       'product'
    ],
    data(){
        return {
             stars : 5
        }
    }
}
</script>

<style scoped>
.product-card {
    max-width: 15rem;
}
.product-card img{
    max-width: 100%;
    max-height: 100%;
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
</style>
