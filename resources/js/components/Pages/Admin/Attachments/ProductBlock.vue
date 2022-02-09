<template>
    <div class="product-block">
        <title-table @addNew="addNewProduct">Product Table</title-table>
        <div class="main-table">
            <table-head @sortProducts="sortProducts($event)"></table-head>
            <div class="table-body">
                <line-product v-for="(product, index) in products"
                              :key="product.id"
                              :product="product"
                              @editorSave="editorSave($event, index)"
                              @showEdit="showEdit(product)"
                              @deleteOne="deleteOne(index)">
                </line-product>
            </div>
        </div>
        <paginator-the :amount="amount"
                       :current-page="currentPage"
                       @pagePicked="pagePicked($event)"
                       @next="goNext($event)">
        </paginator-the>
        <modal-add v-show="showModalProduct"
                   @submitModal="submitModal($event)"
                   @closeModal="closeModal">
        </modal-add>
    </div>
</template>

<script>
import productMixin from "../../../../productMixin";
import ModalAdd from "./ModalAdd";
import TitleTable from "./TitleTable";
import TableHead from "./TableHead";
import LineProduct from "./LineProduct";
import EditProduct from "./EditProduct";
import productService from "../../../../productService";
import PaginatorThe from "../../../Common/Pagination/Paginator";

export default {
    name: "product-block",
    mixins: [
        productMixin
    ],
    components: {
        PaginatorThe,
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
            oneProduct: {},
            perPage: 10,
            sort: '',
            order: ''
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
            const newProduct = await productService.getSingleProduct(event);
            this.products.push(newProduct.data);
        },
        getAllProducts() {
            axios.get('/api/products',{params :{per_page : 10}})
                .then((response) => {
                    this.products = response.data.data;
                    this.amount = response.last_page;
                    this.currentPage = response.current_page;
                });
        },
        deleteOne(index) {
            this.products.splice(index, 1);
        },
        async editorSave(id, index) {
            let updated = await axios.get('/api/products/' + id);
            this.products.splice(index, 1, updated.data);
        },
        sortProducts(sortData) {
            this.products = sortData.products.data;
            this.sort = sortData.sort,
                this.order = sortData.order,
                this.amount = sortData.products.last_page;
            this.currentPage = sortData.products.current_page;
        },
        async getPaginated() {
            const paginatedData = await productService.getPaginated({
                per_page: this.perPage,
                page: this.currentPage,
                sort: this.sort,
                order: this.order,
                /*category_id: this.category_id*/
            });
            this.products = paginatedData.data.data;
            this.amount = paginatedData.data.last_page;
        },
        pagePicked(needPage) {
            this.currentPage = needPage;
            this.getPaginated();
        },
        goNext(event) {
            if (event === true) {
                this.pagePicked(++this.currentPage);
            }
            if (event === false) {
                this.pagePicked(--this.currentPage);
            }
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

.main-table {
    overflow-x: auto;
}
</style>
