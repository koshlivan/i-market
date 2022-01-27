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
                <paginator-the :amount="amount"></paginator-the>
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
            amount: 10,
            perPage: 0,
            sortMethod: '',
            sortOrder: 'asc',
            loading: true,
            products: []
        }
    },
    methods: {
      async getPaginated(perPage) {
        this.loading = true;
        const paginatedData = await productService.getPaginated(perPage);
        this.products = paginatedData.data.data;
        this.loading = false;
      },
      showPicked(event) {
        this.perPage = event;
        this.getPaginated(event);
      },
      async sortPicked(event) {
        this.loading = true;
        this.products = [];
        this.sortMethod = event.sort;
        this.sortOrder = event.order;
        const sorted = await productService.getSorted(event);
        this.products = sorted.data;
        //console.log('sorted data: ', sorted.data[0]);
        console.log('sorted data: ', JSON.stringify(sorted.data[0]));
        // console.log('products: ', JSON.stringify(this.products));
        this.loading = false;
      },
        async categoryClicked(event) {
            this.loading = true;
            this.products = [];
            const category = await axios.get('api/products?category_id='+event);//, {props:{category_id : event}});
            this.products = category.data;
            console.log('show category: ', JSON.stringify(category.data));
            this.loading = false;
        }
    },
    mounted(){
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
