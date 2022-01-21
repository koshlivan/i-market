<template>
    <div class="single-product-view">
        <div class="main-look">
            <div class="main-image">
                <img :src="product.images[0]" alt="this place for image">
                <div class="product-images">
                    <img v-for="(image, index) in product.images"
                         :key="index"
                         alt="little image"
                         class="image-preview">
                </div>
            </div>
            <div class="descriptions">
                <div class="desc-bait">
                    <h5>New LCDScreen and HD Video Recording</h5>
                    <stars-rating rating="4"></stars-rating>
                    <h4>$70</h4>
                </div>
                <div class="desc-info">
                    <h6>Brand:
                        <span>Apple</span>
                    </h6>
                    <h6>Product code:
                        <span>product 20</span>
                    </h6>
                    <h6>Availability:
                        <span>In Stock</span>
                    </h6>
                </div>
                <p>More room to move. With 80GB or 160GB of storage and up to
                    40 hours of battery life, the new iPod classic lets you
                    enjoy up to 40,000 songs or up to 200 hours of video or
                    any combination wherever you go. Cover Flow. Browse
                    through your music collection by flipping..</p>
                <div class="take-params">
                    <div class="sort-by picker">
                        <label>Sort By</label>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ sortOption }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li v-for="(field, index) in sortFields"
                                    :key="index"
                                    @click="sortPicked(field)"> <p class="dropdown-item">{{ field }}</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="color-choose picker">
                        <label>Color</label>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownColor" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ colorOption }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li v-for="(color, index) in colors"
                                    :key="index"
                                    @click="colorPicked(color)"> <p class="dropdown-item">{{ color }}</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="quantity-param">
                    <label>Quantity:</label>
                    <input type="number" v-model="buyAmount" min="0">
                </div>
                <div class="icons-actions">
                    <h5><i class="fas fa-shopping-cart"></i></h5>
                    <h5><i class="fas fa-heart"></i></h5>
                    <h5><i class="fas fa-tasks"></i></h5>
                </div>
            </div>
        </div>
        <reviews-the :product="product"></reviews-the>
    </div>
</template>

<script>
import StarsRating from "../Rating/StarsRating";
import ReviewsThe from "./ReviewsThe";
export default {
    name: "single-product-view",
    components: {ReviewsThe, StarsRating},
    props: [
      'product'
    ],
    data(){
        return {
            sortOption: 'default',
            colorOption: 'default',
            sortFields: ['small', 'medium', 'as your ex has'],
            colors: ['red', 'orange', 'green', 'blue', 'gold', 'black'],
            buyAmount: 0
        }
    },
    methods: {
        sortPicked(field) {
            this.sortOption = field;
        },
        colorPicked(color) {
            this.colorOption = color;
        }
    }
}
</script>

<style scoped>
.single-product-view {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.main-look {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
}
main-image{
    width: 40%;
    border: solid 2px white;
    margin-left: 0.5rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.product-images {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
}
.desc-bait, .desc-info{
    border-bottom: solid 1px rgb(66, 66, 66);
    margin-top: 1.5rem;
    padding-bottom: 1rem;
}
.descriptions {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}
.descriptions h5, .descriptions h6 {
    font-weight: 600;
}

.descriptions h5 span, .descriptions h6 span{
    font-weight: 400;
}
p{
    margin: 1.5rem 0;
}
label {
    font-weight: 600;
    color: rgb(176, 176, 176);
}
.dropdown button {
    width: 100%;
    height: 2.5rem;
    margin: 0.5rem auto;
    background-color: white;
    color: rgb(66, 66, 66);
    text-transform: capitalize;
    text-align: left;
}
.dropdown li:hover {
    cursor: default;
    background-color: #fa4251;
}
.take-params {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    margin: 1rem 0;
}
.picker {
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: stretch;
}
.quantity-param {
    margin: 1rem 0;
}
.quantity-param input {
    height: 2.5rem;
    width: 4rem;
}
.icons-actions {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}
.icons-actions h5{
    color: rgb(156, 156, 156);
    margin: 0.5rem;
}
.icons-actions h5:hover {
    cursor: pointer;
    color: #fa4251;
}
.image-preview {
    width: 5rem;
}
</style>
