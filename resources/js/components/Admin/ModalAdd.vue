<template>
    <div class="modal-add">
        <div class="form-self">
            <button @click="closeWindow">Close</button>
            <label>Choose category</label>
            <select ref="select_category" @change="categoryChoose()">
                <option v-for="(category, index) in categories"
                        :key="category.id"
                        :value="category.id"
                        >{{category.id+' - '+category.name}}</option>
            </select>
            <div class="editor-holder">
                <div class="photo">
                    <add-product-variation @optionChange="optionChange($event)"></add-product-variation>
                </div>
                <form class="inputs" @submit.prevent="submitModal">
                    <label>Name, Model</label>
                    <input  type="text"
                            name="name"
                            v-model="name"
                            placeholder="Model Name" >
                    <label>Price</label>
                    <input  type="number"
                            name="price"
                            v-model="price"
                            placeholder="Price">
                    <label>Brand</label>
                    <input  type="text"
                            name="brand"
                            v-model="brand"
                            placeholder="Brand">
                    <label>Product Code</label>
                    <input  type="text"
                            name="code"
                            v-model="code"
                            placeholder="Product Code">
                    <leave-rating @rating="setRating($event)"></leave-rating>
                    <label>Description</label>
                    <textarea  name="description"
                               v-model="description"
                               placeholder="Description"
                               rows="10"></textarea>
                </form>
            </div>
            <button @click="submitModal">Save</button>
        </div>
    </div>
</template>

<script>
import productService from "../../productService";
import AddProductVariation from "./AddProductVariation";
import LeaveRating from "../SingleProductPage/LeaveRating";
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
            rating: 0,
            price: 0,
            brand: '',
            code: '',
            description: '',
            attachment : null,
        }
    },
    created() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get('api/categories')
                .then( response => {this.categories = response.data});
        },
       async submitModal() {
            console.log('start submit, chek option and image: '+this.imagePath, this.option);
            const product = {
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                rating: this.rating,
                description: this.description,
                category_id: this.pickedCategory
            };

            const newProduct = await productService.createProduct(product).catch( error => {
                alert(error.response.data.message);
            });
           console.log('image and options before sending to service: ', newProduct.data.id, this.imagePath, this.option);
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
        },
        optionChange(event) {
            this.option = event.differ;
            this.imagePath = event.image;
            console.log('saved options values: '+this.option, this.imagePath);
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
        background-color:black;
        color: white;
        border: solid 2px white;
    }
    label {
        margin: 0 2rem;
    }
    .form-self textarea {
        margin: 0.2rem 1rem;
        background-color:black;
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
    .photo{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: stretch;
        margin: 1rem;
    }
    .photo img{
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
