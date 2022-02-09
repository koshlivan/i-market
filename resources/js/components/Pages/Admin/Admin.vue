<template>
    <div class="admin-management">
        <div class="windows">
            <button @click="categoriesPicked"><i class="fas fa-sitemap"></i>categories</button>
            <button @click="productsPicked"><i class="fas fa-list-ul"></i>all products</button>
            <button @click="byCategoriesPicked"><i class="fas fa-tags"></i>products by categories</button>
        </div>
        <categories-block v-show="activeCategories"></categories-block>
        <product-block v-show="activeProducts"></product-block>
        <by-categories v-show="activeByCategories"></by-categories>
    </div>
</template>

<script>
import TableHead from "./Attachments/TableHead";
import LineProduct from "./Attachments/LineProduct";
import productService from "../../../productService";
import productMixin from "../../../productMixin";
import ModalAdd from "./Attachments/ModalAdd";
import TitleTable from "./Attachments/TitleTable";
import CategoriesBlock from "./Attachments/CategoriesBlock";
import ProductBlock from "./Attachments/ProductBlock";
import ByCategories from "./Attachments/ByCategories";

export default {
    name: "admin-management",
    components: {ByCategories, ProductBlock, CategoriesBlock, TitleTable, ModalAdd, LineProduct, TableHead},
    mixins: [
        productMixin
    ],
    data() {
        return {
            activeCategories: false,
            activeProducts: false,
            activeByCategories: false
        }
    },
    methods: {
        categoriesPicked() {
            this.activeCategories = true;
            this.activeProducts = false;
            this.activeByCategories = false;
        },
        productsPicked() {
            this.activeProducts = true;
            this.activeCategories = false;
            this.activeByCategories = false;
        },
        byCategoriesPicked() {
            this.activeProducts = false;
            this.activeCategories = false;
            this.activeByCategories = true;
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

i {
    margin-right: 0.2rem;
}
</style>
