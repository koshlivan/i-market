<template>
    <div class="product-card" ref="card">
        <div class="image">
            <img :src="'/'+image" alt="product" @mouseover="imgHover" @mouseleave="imgBack" ref="mainImage">
        </div>
        <div class="product-info">
            <router-link tag="h4" class="clicker" :to="linkTo">{{ product.name }}</router-link>
            <div class="stars">
                <div v-for="index in 5">
                    <div :class="{'rated' : index <= product.rating}">
                        <span class="material-icons">grade</span>
                    </div>
                </div>
            </div>
            <p class="description"
               ref="description"
               :title="product.description"
               @click="showDescription">{{ product.description }}</p>
            <h3 class="price">{{ '$' + product.price }}</h3>
        </div>
        <div class="product-actions">
            <product-menu @addToCart="addToCart"></product-menu>
        </div>
    </div>

</template>

<script>
import ProductMenu from "./ProductMenu";
import productService from "../../../productService";

export default {
    name: "product-preview",
    components: {ProductMenu},
    props: [
        'product',
        'isHorizontal'
    ],
    data() {
        return {
            image: this.product.options[0].image
        }
    },
    computed: {
        linkTo() {
            return '/product/' + this.product.id;
        }
    },
    watch: {
        product() {
            this.imgBack();
        },
        isHorizontal() {
            this.styleDefine();
        }
    },
    methods: {
        imgHover() {
            if (this.product.options[1]!=null && this.product.options[1].image !== '') {
                this.image = this.product.options[1].image;
            }
        },
        imgBack() {
            this.image = this.product.options[0].image;
        },
        addToCart() {
            //productService.addToCart(2, this.product.id);
            productService.addToCartLocal(this.product.id);
        },
        styleDefine() {
            if (this.isHorizontal === true) {
                this.$refs.card.style.flexDirection = 'row';
                this.$refs.card.style.justifyContent = 'flex-start';
                this.$refs.card.style.width = '100%';
                this.$refs.mainImage.style.maxWidth = '35%';
                this.$refs.mainImage.style.minWidth = '30%';
            } else {
                this.$refs.card.style.flexDirection = 'column';
                this.$refs.card.style.justifyContent = 'space-between';
                this.$refs.card.style.width = '30%';
                this.$refs.mainImage.style.maxWidth = '100%';
            }
        },
        showDescription() {
            if (this.$refs.description.style.overflow === 'hidden') {
                this.$refs.description.style.overflow = 'auto';
            } else {
                this.$refs.description.style.overflow = 'hidden';
            }

        }
    }
}
</script>

<style scoped>
.product-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    width: 30%;
    margin: 0.5rem;
    position: relative;
    overflow: hidden;
    min-width: 150px;
}

.image img {
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

.clicker:hover {
    cursor: pointer;
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

.rated {
    color: #e53a53;
}

.product-actions {
    position: absolute;
    transition: 500ms;
    top: 0;
    left: -5rem;
}

.product-card:hover .product-actions {
    transform: translateX(100px);
}

.description {
    height: 5rem;
    overflow: hidden;
    text-align: justify;
    text-indent: 1rem;
    cursor: default;
}

h4 {
    text-transform: uppercase;
    text-align: center;
}
</style>
