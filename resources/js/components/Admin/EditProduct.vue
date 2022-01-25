<template>
    <div class="edit-product">
        <button @click="closeWindow">Close</button>
<!--        <label>Choose category</label>-->
<!--        <select id="select_category" @change="categoryChoose()">-->
<!--            <option v-for="(category, index) in categories"-->
<!--                    :key="category.id"-->
<!--                    :value="category.id"-->
<!--            >{{category.id+' - '+category.name}}</option>-->
<!--        </select>-->
        <div class="editor-holder">
            <div class="options">
                <add-product-variation v-for="(variation, index) in variations"
                                       :key="variation.id"></add-product-variation>
                <button @click="addOption">+option</button>
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
export default {
    name: "edit-product",
    components: {AddProductVariation},
    props: [
      'product'
    ],
    emits: [
        'closeEdit'
    ],
    data() {
        return {
            //categories: [],
            //pickedCategory: 0,
            name: this.product.name,
            price: this.product.price,
            brand: this.product.brand,
            code: this.product.code,
            description: this.product.description,
            modalImage: 'assets/none.png',
            attachment : null,
            variations: []
        }
    },
    methods: {
        submitModal() {

        },
        closeWindow() {
            this.$emit('closeEdit');
        },
        addOption() {
            this.variations.push({name: '', image: ''});
        }
    }
}
</script>

<style scoped>
.edit-product {
    width: 100%;
    margin: 1rem 0;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
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
