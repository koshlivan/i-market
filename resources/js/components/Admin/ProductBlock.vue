<template>
    <div class="product-block">
        <title-table @addNew="addNewProduct">Product Table</title-table>
        <table-head></table-head>
        <div class="table-body">
            <line-product v-for="(product, index) in products"
                          :key="product.id"
                          :product="product"
                          @editorSave="editorSave($event, index)"
                          @showEdit="showEdit(product)"
                          @deleteOne="deleteOne(index)"></line-product>
        </div>
        <modal-add v-show="showModalProduct"
                   @submitModal="submitModal($event)"
                   @closeModal="closeModal"></modal-add>
    </div>
</template>

<script>
import productMixin from "../../productMixin";
import ModalAdd from "./ModalAdd";
import TitleTable from "./TitleTable";
import TableHead from "./TableHead";
import LineProduct from "./LineProduct";
import EditProduct from "./EditProduct";
import productService from "../../productService";
export default {
    name: "product-block",
    mixins: [
        productMixin
    ],
    components: {
        EditProduct,
        ModalAdd,
        TitleTable,
        TableHead,
        LineProduct
    },
    data() {
        return {
            showModalProduct: false,
            editShow: false,
            oneProduct: {}
        }
    },
    methods: {
        addNewProduct() {
            this.showModalProduct = true;
        },
        closeModal() {
            this.showModalProduct = false;
        },
        async submitModal(event) {
            console.log('submit modal push to products'+JSON.stringify(event));
            const newProduct = await productService.getOneProduct(event);
            this.products.push(newProduct.data);
        },
        getAllProducts() {
            axios.get('/api/products')
                .then((response) => {this.products = response.data});
        },
        deleteOne(index) {
            this.products.splice(index, 1);
        },
        async editorSave(event, index) {
            console.log('editor save index: ', event);
            const updated = await axios.get('api/products/'+event);
            console.log('editor save receive updated: ', JSON.stringify(updated.data));
            this.products.splice(index, 1, updated.data);
        }
    },

}
</script>

<style scoped>
.product-block {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
</style>
