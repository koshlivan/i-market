<template>
    <div class="product-block">
        <edit-product @closeEdit="closeEdit" v-show="editShow" :product="oneProduct"></edit-product>
        <title-table @addNew="addNewProduct">Product Table</title-table>
        <table-head></table-head>
        <div class="table-body">
            <line-product v-for="(product, index) in products"
                          :key="product.id"
                          :product="product"
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
        submitModal(event) {
            this.products.push(event);
        },
        getAllProducts() {
            axios.get('/api/products')
                .then((response) => {this.products = response.data});
        },
        deleteOne(index) {
            this.products.splice(index, 1);
        },
        showEdit(product){
            this.oneProduct = product;
            this.editShow = true;
        },
        closeEdit() {
            this.editShow = false;
            this.oneProduct = {};
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
