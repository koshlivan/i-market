<template>
    <div class="line-product">
        <div class="self-row">
            <div class="table-cell">
                <img :src="product.options[0].image" alt="Prod image">
            </div>
            <div class="table-cell">
                <h5>{{product.name}}</h5>
            </div>
            <div class="table-cell">
                <stars-rating :rating="product.rating"></stars-rating>
            </div>
            <div class="table-cell">
                <h5>{{product.price}}</h5>
            </div>
            <div class="table-cell">
                <h5>{{product.brand}}</h5>
            </div>
            <div class="table-cell">
                <h5>{{product.code}}</h5>
            </div>
            <div class="table-cell">
                <h5>{{availability}}</h5>
            </div>
            <div class="table-cell">
                <h5>{{product.description}}</h5>
            </div>
            <div class="table-cell">
                <p v-for="(option, index) in product.options"
                   :key="option.id">{{option.name}}</p>
            </div>
            <div class="table-cell">
                <h5></h5>
            </div>
        </div>
        <div class="self-row" v-show="isEditShow">
            <div class="table-cell">
                <img :src="product.image" alt="Prod image">
            </div>
            <div class="table-cell">
                <input type="text" v-model="naming">
            </div>
            <div class="table-cell">
                <stars-rating :rating="product.rating"></stars-rating>
            </div>
            <div class="table-cell">
                <input type="number" v-model="pricing">
            </div>
            <div class="table-cell">
                <input type="text" v-model="branding">
            </div>
            <div class="table-cell">
                <input type="text" v-model="coding">
            </div>
            <div class="table-cell">
                <input type="checkbox"><label>In stock</label>
            </div>
            <div class="table-cell">
                <textarea type="text" v-model="descriptioning" rows="3"></textarea>
            </div>
            <div class="table-cell">

            </div>
            <div class="table-cell">
                <h5>{{}}</h5>
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
import StarsRating from "../Rating/StarsRating";
import productService from "../../productService";
export default {
    name: "line-product",
    components: {StarsRating},
    props: [
        'product',
    ],
    emitted: [
        'deleteOne',
        'showEdit'
    ],
    data(){
        return {
            reviews : 0,
            isEditShow : false,
            name: this.naming,
            price: this.pricing,
            brand: this.branding,
            code: this.coding,
            description: this.descriptioning
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
       //console.log(this.product.options);
    },
    methods : {
        getReviewAmount() {
            return productService.getReviewAmount(this.product.id).length;
        },
        deleteOne() {
            axios.delete('api/products/'+this.product.id).then(response => {
                this.$emit('deleteOne');
            })
        },
        showEditWindow() {
            this.$emit('showEdit');
            //this.isEditShow = true;
        },
        saveEdited() {
            axios.put('api/users/' + this.product.id, {
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                description: this.description,
            })
                .then(response => {
                });

            this.isEditShow = false;
        }
    }
}
</script>

<style scoped>
.line-product{
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
    }
    button:first-child {
        background-color: coral;
        color: white;
    }
button:first-child:hover {
    cursor: pointer;
    background-color: #f5a68a;
}
button:first-child:active {
    cursor: pointer;
    background-color: #9c4121;
}
button:last-child {
    background-color: red;
    color: white;
}
button:last-child:hover {
    cursor: pointer;
    background-color: #c27584;
}
button:last-child:active {
    cursor: pointer;
    background-color: #580b11;
}
button i{
    margin: 0 0.5rem;
}
input {
    width: 100%;
}
</style>
