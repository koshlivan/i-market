<template>
    <div class="edit-product">
        <button @click="closeWindow"><i class="fas fa-times-circle"></i>Close</button>
        <div class="editor-holder">
            <div class="options">
                <h4>Options for product</h4>
                <div class="existed-options" v-for="(option, index) in product.options" :key="option.id">
                    <img :src="option.image" alt="image">
                    <h6>{{ option.name }}</h6>
                </div>
                <add-product-variation
                    v-for="(variant, index) in additionVariations"
                    :key="index" @optionChange="optionChange($event)">
                </add-product-variation>
                <button @click="addOption"><i class="fas fa-plus-square"></i>add new option</button>
                <button @click="removeOption"><i class="fas fa-minus-square"></i>remove new option</button>
            </div>
            <form class="inputs" @submit.prevent="submitModal">
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
                <label>Description</label>
                <textarea name="description"
                          v-model="description"
                          placeholder="Description"
                          rows="10"></textarea>
            </form>
        </div>
        <button @click="submitModal"><i class="fas fa-save"></i>Save</button>
    </div>
</template>

<script>
import AddProductVariation from "./AddProductVariation";
import productService from "../../../../productService";

export default {
    name: "edit-product",
    components: {AddProductVariation},
    props: [
        'product'
    ],
    emits: [
        'closeEdit',
        'editorSave'
    ],
    data() {
        return {
            name: this.product.name,
            price: this.product.price,
            brand: this.product.brand,
            code: this.product.code,
            description: this.product.description,
            additionVariations: 0,
            additionModes: [],
            options: []
        }
    },
    methods: {
        async submitModal() {
            let product = {
                id: this.product.id,
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                description: this.description,
            }
            await productService.editProduct(product)
                .catch( error => {console.log(error.response.data)});
            for (let mode of this.additionModes) {
                await productService.createProductOption(product.id, mode.image, mode.differ)
                .catch( error => {console.log(error.response.data)});
            }
            this.$emit('editorSave', product.id);
        },
        optionChange(event) {
            this.additionModes.push(event);
        },
        closeWindow() {
            this.$emit('closeEdit');
        },
        addOption() {
            ++this.additionVariations;
        },
        removeOption() {
            if (this.additionVariations > 0) {
                --this.additionVariations;
                if (this.additionModes.length > this.additionVariations) {
                    this.additionModes.pop();
                }
            }
        }
    }
}
</script>

<style scoped>
.edit-product {
    background-color: rgba(66, 66, 66, 0.85);
    width: 100%;
    height: 100vh;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
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

.existed-options {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
    margin: 1rem 0;
}

.existed-options img {
    max-width: 20%;
}

.existed-options h6 {
    color: white;
    text-shadow: 0 0 5px black;
    text-transform: capitalize;
    margin-left: 1rem;
    font-weight: 500;
}

button {
    padding: 0.8rem 1rem;
    float: right;
    margin: 1rem;
    background-color: #aaa;
    color: black;
    text-transform: uppercase;
    font-weight: 500;
}

i {
    margin-right: 0.2rem;
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
    width: 25%;
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

h4 {
    text-transform: uppercase;
    color: white;
}
</style>
