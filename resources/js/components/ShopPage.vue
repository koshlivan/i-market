<template>
    <div class="container">
        <div class="wrapper">
            <div class="side-menu">
                <side-menu @categoryClicked="categoryClicked($event)">
                    <filters-side></filters-side>
                </side-menu>
                <propositions-hor></propositions-hor>
            </div>
            <div class="shop">
                <sorting-the @showPicked="showPicked($event)"
                             @sortPicked="sortPicked($event)"></sorting-the>
                <div class="spinner-border loading" role="status" v-show="loading">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="view-container">
                    <product-preview v-for="(product, index) in products"
                                     :key="index"
                                     :product="product"></product-preview>
                </div>
                <paginator-the :amount="totalPages"
                               @pagePicked="pagePicked($event)"
                               @next="goNext($event)"
                               :current-page="currentPage"></paginator-the>
            </div>
        </div>
        <brand-list></brand-list>
    </div>
</template>

<script>
import PaginatorThe from "./Pagination/Paginator";
import FiltersSide from "./Filters/FiltersSide";
import SideMenu from "./SideMenu/SideMenu";
import PropositionsHor from "./FeaturedProduct/PropositionsHor";
import SortingThe from "./Sorting/SortingThe";
import ProductPreview from "./FeaturedProduct/ProductPreview";
import BrandList from "./Brands/BrandList";
import productService from "../productService";

export default {
    name: "shop-the",
    components: {
        BrandList,
        ProductPreview,
        SortingThe,
        PropositionsHor,
        FiltersSide,
        PaginatorThe,
        SideMenu
    },
    data() {
        return {
            perPage: 9,
            currentPage: 1,
            totalPages: 1,
            sortMethod: 'id',
            sortOrder: 'asc',
            loading: true,
            products: [],
            category_id : null
        }
    },
    methods: {
        async getPaginated() {
            this.loading = true;
            const paginatedData = await productService.getPaginated({
                    per_page: this.perPage,
                    page: this.currentPage,
                    sort: this.sortMethod,
                    order: this.sortOrder,
                    category_id: this.category_id
                });
            this.products = paginatedData.data.data;
            this.loading = false;
            //this.currentPage = paginatedData.data.current_page;
            this.totalPages = paginatedData.data.last_page;
        },
        showPicked(event) {
            this.perPage = event;
            this.getPaginated(event);
        },
        sortPicked(event) {
            this.sortMethod = event.sort;
            this.sortOrder = event.order;
            this.getPaginated()
        },
        async categoryClicked(category_id) {
            this.category_id = category_id;
            this.getPaginated();
        },
        pagePicked(page) {
            this.currentPage = page;
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
    mounted() {
        this.getPaginated(9)
    }
}
</script>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 1.5rem;
}

.side-menu {
    width: 28%;
}

.shop {
    width: 70%;
}

.view-container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    align-content: stretch;
}

.loading {
    width: 3rem;
    height: 3rem;
    margin: 2rem;
    color: red;
}
</style>
