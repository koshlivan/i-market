<template>
    <div class="modal-add">
        <div class="form-self">
            <button @click="closeWindow">Close</button>
            <label>Choose category</label>
            <select ref="select_category" @change="categoryChoose()" required>
                <option value="">--- Choose one below ---</option>
                <option v-for="(category, index) in categories"
                        :key="category.id"
                        :value="category.id"
                >{{ category.id + ' - ' + category.name }}
                </option>
            </select>
            <div class="editor-holder">
                <div class="photo">
                    <h3 v-show="!step2">Choose the photo, enter color or option and click SAVE MODE</h3>
                    <add-product-variation @optionChange="optionChange($event)"></add-product-variation>
                </div>
                <form class="inputs" @submit.prevent="submitModal" v-show="step2">
                    <label>Name, Model</label>
                    <input type="text"
                           name="name"
                           v-model.trim="name"
                           placeholder="Model Name">
                    <label>Price</label>
                    <input type="number"
                           name="price"
                           v-model="price"
                           placeholder="Price">
                    <label>Brand</label>
                    <input type="text"
                           name="brand"
                           v-model.trim="brand"
                           placeholder="Brand">
                    <label>Product Code</label>
                    <input type="text"
                           name="code"
                           v-model.trim="code"
                           placeholder="Product Code">
                    <leave-rating @rating="setRating($event)"></leave-rating>
                    <label>Description</label>
                    <textarea name="description"
                              v-model="description"
                              placeholder="Description"
                              rows="10"></textarea>
                </form>
            </div>
            <button @click="submitModal" v-show="step2">Save</button>
        </div>
    </div>
</template>

<script>
import productService from "../../../../productService";
import AddProductVariation from "./AddProductVariation";
import LeaveRating from "../../SingleProductPage/Attachments/LeaveRating";
import {eventBus} from "../../../../app";

export default {
    name: "modal-add",
    components: {LeaveRating, AddProductVariation},
    emits: [
        'closeModal',
        'submitModal'
    ],
    data() {
        return {
            categories: [],
            option: '',
            imagePath: '',
            pickedCategory: 1,
            name: '',
            rating: 3,
            price: 0,
            brand: '',
            code: '',
            description: '',
            attachment: null,
            step2: false
        }
    },
    created() {
        eventBus.$on('categoryChange', () => {
            this.getCategories()
        })
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data
                });
        },
        async submitModal() {
            let product = {
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                rating: this.rating,
                description: this.description,
                category_id: this.pickedCategory
            };

            let newProduct = await productService.createProduct(product).catch(error => {
                alert(error.response.data.message);
            });
            await productService.createProductOption(newProduct.data.id, this.imagePath, this.option);
            this.$emit('submitModal', newProduct.data.id);
            this.clearFields();
            this.closeWindow();
        },
        closeWindow() {
            this.$emit('closeModal');
        },
        categoryChoose() {
            //this.pickedCategory = document.getElementById('select_category').value;
            this.pickedCategory = this.$refs.select_category.value;
        },
        clearFields() {
            this.name = '';
            this.price = 0;
            this.brand = '';
            this.code = '';
            this.description = '';
            this.pickedCategory = 1;
            this.option = '';
            this.imagePath = '';
            this.$refs.select_category.selectedIndex = 0;
        },
        optionChange(event) {
            this.option = event.differ;
            this.imagePath = event.image;
            this.step2 = true;
        },
        setRating(event) {
            this.rating = event;
        }
    }
}
</script>

<style scoped>
.modal-add {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(128, 128, 128, 0.8);
}

.form-self {
    min-width: 80%;
    min-height: 80%;
    background-color: black;
    border-radius: 3px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
    margin-top: 4rem;
}

.form-self button {
    width: 6rem;
    float: right;
    margin: 1rem;
    background-color: darkred;
    color: white;
}

.form-self input {
    margin: 0.2rem 1rem;
    background-color: black;
    color: white;
    border: solid 2px white;
}

label {
    margin: 0 2rem;
}

.form-self textarea {
    margin: 0.2rem 1rem;
    background-color: black;
    color: white;
    border: solid 2px white;
}

.form-self textarea {
    color: greenyellow;
}

select {
    height: 2.5rem;
    margin: 1rem;
}

.photo {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
    margin: 1rem;
}

.photo img {
    width: 95%;
}

.inputs {
    display: flex;
    width: 70%;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}

.editor-holder {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
}
</style>
