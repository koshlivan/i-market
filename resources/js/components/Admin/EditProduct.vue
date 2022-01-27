<template>
    <div class="edit-product">
        <button @click="closeWindow">Close</button>
        <div class="editor-holder">
            <div class="options">
                <add-product-variation v-for="index in additionVariations"
                                       :key="index" @optionChange="optionChange($event)"></add-product-variation>
                <button @click="addOption"><i class="fas fa-plus-square"></i>add option</button>
                <button @click="removeOption"><i class="fas fa-minus-square"></i>remove option</button>
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
</template>

<script>
import AddProductVariation from "./AddProductVariation";
import productService from "../../productService";
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
            additionModes: []
        }
    },
    methods: {
        async submitModal() {
            const product = {
                id: this.product.id,
                name: this.name,
                price: this.price,
                brand: this.brand,
                code: this.code,
                description: this.description,
            }
            const editedProduct = await productService.editProduct(product);
            for (let mode of this.additionModes) {
                await productService.createProductOption(product.id, mode.image, mode.differ);
            }
            this.$emit('editorSave', product.id);
        },
        optionChange(event) {
            console.log('edit product option change received event', event);
            this.additionModes.push(event);
            console.log('edit product option change', JSON.stringify(this.additionModes));
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
button {
    width: 8rem;
    height: 2rem;
    float: right;
    margin: 1rem;
    background-color: red;
    color: white;
}
i {
    margin-right: 0.2rem;
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
    width: 25%;
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
