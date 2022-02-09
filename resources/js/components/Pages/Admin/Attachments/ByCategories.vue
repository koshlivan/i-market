<template>
    <div class="by-categories">
        <div class="tags">
            <button
                class="category-tag"
                @click="pickCategory(category.id)"
                v-for="category in categories"
                :key="category.id">
                {{ category.name }}
            </button>
        </div>
        <div class="products">

            <line-product
                v-for="(product, index) in products"
                :key="product.id"
                @deleteOne="deleteOne(index)"
                @editorSave="editorSave($event, index)"
                :product="product"
            ></line-product>
        </div>

    </div>
</template>

<script>
import LineProduct from "./LineProduct";
import {eventBus} from "../../../../app";

export default {
    name: "by-categories",
    components: {LineProduct},
    data() {
        return {
            categories: [],
            products: []
        }
    },
    created() {
        eventBus.$on( 'categoryChange', () => {this.getCategories();})
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('/api/categories', {params : {products : true}})
                .then(response => {
                    this.categories = response.data;
                })
                .catch(error => {
                    console.log(error.response.data.message);
                })
        },
        pickCategory(category) {
            axios.get('/api/categories/' + category + '?products=true')
                .then(response => {
                    this.products = response.data.products;
                })
                .catch(error => {
                    console.log('get category with product error: ', error.response.data.message);
                })
        },
        deleteOne(index) {
            this.products.splice(index, 1);
        },
        async editorSave(id, index) {
            let updated = await axios.get('/api/products/' + id);
            this.products.splice(index, 1, updated.data);
        },
    }
}
</script>

<style scoped>
.by-categories {
    width: 100%;
}

.tags {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: stretch;
    flex-wrap: wrap;
    margin: 1rem 0;
}

.category-tag {
    padding: 0.5rem 1rem;
    text-transform: uppercase;
    margin: 0 0.2rem;
}

.products {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
</style>
