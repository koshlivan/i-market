<template>
    <div class="line-product">
        <edit-product
            @closeEdit="closeEdit"
            @editorSave="editorSave($event)"
            v-show="isEditShow"
            :product="product">
        </edit-product>
        <div class="self-row">
            <div class="table-cell">
                <h5>{{ categoryName }}</h5>
            </div>
            <div class="table-cell">
                <img :src="product.options[0].image" alt="Prod image">
            </div>
            <div class="table-cell">
                <h5>{{ product.name }}</h5>
            </div>
            <div class="table-cell">
                <stars-rating :rating="product.rating"></stars-rating>
            </div>
            <div class="table-cell">
                <h5>{{ product.price }}</h5>
            </div>
            <div class="table-cell">
                <h5>{{ product.brand }}</h5>
            </div>
            <div class="table-cell">
                <h5>{{ product.code }}</h5>
            </div>
            <div class="table-cell">
                <h5>{{ availability }}</h5>
            </div>
            <div class="table-cell">
                <h5>{{ product.description }}</h5>
            </div>
            <div class="table-cell">
                <p v-for="(option, index) in product.options"
                   :key="option.id">{{ option.name }}</p>
            </div>

        </div>
        <div class="actions">
            <button @click="showEditWindow"><i class="fas fa-arrow-up"></i>edit<i class="fas fa-arrow-up"></i></button>
            <button @click="saveEdited" v-show="isEditShow"><i class="fas fa-arrow-up"></i>Save Changes</button>
            <button @click="deleteOne"><i class="fas fa-arrow-up"></i>delete<i class="fas fa-arrow-up"></i></button>

        </div>
    </div>
</template>

<script>
import StarsRating from "../../../Common/Rating/StarsRating";
import productService from "../../../../productService";
import EditProduct from "./EditProduct";

export default {
    name: "line-product",
    components: {StarsRating, EditProduct},
    props: [
        'product',
    ],
    emitted: [
        'deleteOne',
        'editorSave'
    ],
    data() {
        return {
            reviews: 0,
            isEditShow: false,
            name: this.naming,
            price: this.pricing,
            brand: this.branding,
            code: this.coding,
            description: this.descriptioning,
            categoryName: ''
        }
    },
    computed: {
        availability() {
            if (this.product.in_stock > 0) {
                return "In Stock";
            } else {
                return "Out of Stock";
            }
        },
        naming: {
            get() {
                return this.product.name;
            },
            set(value) {
                this.name = value;
            }
        },
        pricing: {
            get() {
                return this.product.price;
            },
            set(value) {
                this.price = value;
            }
        },
        branding: {
            get() {
                return this.product.brand;
            },
            set(value) {
                this.brand = value;
            }
        },
        coding: {
            get() {
                return this.product.code;
            },
            set(value) {
                this.code = value;
            }
        },
        descriptioning: {
            get() {
                return this.product.description;
            },
            set(value) {
                this.description = value;
            }
        },
    },
    created() {
        this.productCategory()
        //console.log(this.product.options);
    },
    methods: {
        getReviewAmount() {
            return productService.getReviewAmount(this.product.id).length;
        },
        deleteOne() {
            if (!confirm('Do you really wanna delete item with few options of it?')) {
                return
            }

            axios.delete('/api/products/' + this.product.id).then(response => {
                this.$emit('deleteOne');
            })

        },
        showEditWindow() {
            //this.$emit('showEdit');
            this.isEditShow = true;
        },
        async saveEdited() {
            await axios.put('/api/users/' + this.product.id, {
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                description: this.description,
            });
            this.closeEdit();
        },
        closeEdit() {
            this.isEditShow = false;
            this.oneProduct = {};
        },
        editorSave(event) {
            this.$emit('editorSave', event);

            this.closeEdit()
        },
        productCategory() {
            axios.get('/api/categories/' + this.product.category_id)
                .then(response => {
                    this.categoryName = response.data.name;
                })
        }
    }
}
</script>

<style scoped>
.line-product {
    width: auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}

.self-row {
    width: 100%;
    height: 5rem;
    display: flex;
    flex-direction: row;
    justify-content: stretch;
    align-items: stretch;
    border: solid 2px gray;
}

.table-cell {
    display: flex;
    flex-direction: column;
    width: 100%;
    justify-content: center;
    align-items: center;
    border-right: solid 1px gray;
    padding: 2px;
    overflow: auto;
}

.table-cell img {
    max-width: 100%;
    max-height: 100%;
}

.table-cell h5 {
    text-transform: capitalize;
}

button {
    text-transform: uppercase;
    padding: 0.6rem 2rem;
    margin-bottom: 0.2rem;
    color: white;
    background-color: #665;
    text-shadow: 0 0 5px #3ae6ca;
    font-weight: 500;
}

button:hover {
    cursor: pointer;
    background-color: #888;
    text-shadow: 0 0 10px #3ae6ca;;
}

button:active {
    cursor: pointer;
    background-color: #333;
}

button i {
    margin: 0 0.5rem;
}

input {
    width: 100%;
}

h4 {
    text-transform: uppercase;
    color: white;
    margin-top: 0.8rem;
    margin-left: 1rem;
}
</style>
