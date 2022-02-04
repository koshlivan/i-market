<template>
    <div class="categories-block">
        <div class="categories-lines">
        <title-table @addNew="addNew">Categories Table</title-table>
        <add-category-line @addCategory="addCategory($event)"
                           v-show="addCategoryLine"
                           @cancelNew="cancelNew"></add-category-line>
            <div class="width-65">
                <table-head-category @sortCategory="sortCategory($event)"></table-head-category>
                <line-category v-for="(category, index) in categories"
                               :key="category.id"
                               @deleteOne="deleteOne(index)"
                               :category="category"></line-category>
            </div>
        </div>
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
        axios.get('/api/categories')
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
        },
        sortCategory(categories) {
            this.categories = categories;
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
.categories-lines {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}
.width-65 {
    width: 65%;
}
</style>
