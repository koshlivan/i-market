<template>
        <div class="admin-management">
            <div class="windows">
                <button @click="categoriesPicked"><i class="fas fa-sitemap"></i>categories</button>
                <button @click="productsPicked"><i class="fas fa-list-ul"></i>products</button>
            </div>
            <categories-block v-show="activeCategories"></categories-block>
            <product-block v-show="activeProducts"></product-block>
        </div>
</template>

<script>
import TableHead from "./Admin/TableHead";
import LineProduct from "./Admin/LineProduct";
import productService from "../productService";
import productMixin from "../productMixin";
import ModalAdd from "./Admin/ModalAdd";
import TitleTable from "./Admin/TitleTable";
import CategoriesBlock from "./Admin/CategoriesBlock";
import ProductBlock from "./Admin/ProductBlock";
export default {
    name: "admin-management",
    components: {ProductBlock, CategoriesBlock, TitleTable, ModalAdd, LineProduct, TableHead},
    mixins: [
        productMixin
    ],
    data() {
        return {
            activeCategories: false,
            activeProducts: false,

        }
    },
    methods: {
        categoriesPicked() {
            this.activeCategories = true;
            this.activeProducts = false;
        },
        productsPicked() {
            this.activeProducts = true;
            this.activeCategories = false;
        }
    }
}
</script>

<style scoped>
.windows {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
    margin: 1rem;
}
button {
    padding: 0.6rem 1.5rem;
    text-transform: uppercase;
}
i{
    margin-right: 0.2rem;
}
</style>
