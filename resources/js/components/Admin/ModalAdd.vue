<template>
    <div class="modal-add">
        <div class="form-self">
            <button @click="closeWindow">Close</button>
            <label>Choose category</label>
            <select id="select_category" @change="categoryChoose()">
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
export default {
    name: "modal-add",
    components: {AddProductVariation},
    emits: [
        'closeModal',
        'submitModal'
    ],
    data() {
        return {
            categories: [],
            option: '',
            pickedCategory: 0,
            name: '',
            price: 0,
            brand: '',
            code: '',
            description: '',
            modalImage: 'assets/none.png',
            attachment : null,
            product_id: 0
        }
    },
    created() {
        axios.get('api/categories')
            .then( response => {this.categories = response.data});
    },
    methods: {
        submitModal() {
            let product = {
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                description: this.description,
                category_id: this.pickedCategory
            };
            productService.createProduct(product)
                .then(response => {
                    console.log(response.data);
                    this.product_id = response.data.id;
                    let option = {
                        name: this.option,
                        image: this.modalImage,
                        master: this.product_id
                    }
                    productService.createProductOption(option)
                });

            // .then( response => {
                this.$emit('submitModal', product);
            // })
            this.clearFields();
            this.closeWindow();
        },
        closeWindow() {
            this.$emit('closeModal');
        },
        categoryChoose() {
            this.pickedCategory = document.getElementById('select_category').value;
        },
        clearFields() {
            this.name = '';
            this.price = 0;
            this.brand = '';
            this.code = '';
            this.description = '';
            this.pickedCategory = 0;
            this.category_id = 0;
            this.options = [];
        },
        onAttachmentChange (e) {
            this.attachment = e.target.files[0]
        },
        saveImage() {
            const config = { 'content-type': 'multipart/form-data' }
            const formData = new FormData();
            formData.append('name', this.modalImage);
            formData.append('attachment', this.attachment);

            axios.put('api/attachments', formData, config)
                .then(response => console.log(response.data.message))
                .catch(error => console.log(error))
        },
        optionChange(event) {
            this.option = event;
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
