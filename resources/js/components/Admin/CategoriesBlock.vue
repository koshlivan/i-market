<template>
    <div class="categories-block">
        <title-table @addNew="addNew">Categories Table</title-table>
        <add-category-line @addCategory="addCategory($event)"
                           v-show="addCategoryLine"
                           @cancelNew="cancelNew"></add-category-line>
        <table-head-category></table-head-category>
        <line-category v-for="(category, index) in categories"
                       :key="category.id"
                       @deleteOne="deleteOne(index)"
                       :category="category"></line-category>
    </div>
</template>

<script>
import TitleTable from "./TitleTable";
import LineCategory from "./LineCategory";
import TableHeadCategory from "./TableHeadCategory";
import AddCategoryLine from "./AddCategoryLine";
export default {
    name: "categories-block",
    components: {
        AddCategoryLine,
        TitleTable, LineCategory, TableHeadCategory
    },
    data() {
        return {
            categories: [],
            addCategoryLine: false
        }
    },
    created() {
        axios.get('api/categories')
        .then( response => {
            this.categories = response.data;
        })
    },
    methods: {
        addNew() {
            this.addCategoryLine = true;
        },
        cancelNew() {
            this.addCategoryLine = false;
        },
        addCategory(category) {
            this.categories.push(category);
        },
        deleteOne(index) {
            this.categories.splice(index, 1);
        }
    }
}
</script>

<style scoped>
.categories-block {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
</style>
