<template>
    <div class="table-head">
        <div class="head-cell" title="Sort by" @click="sortBy('category_id')">
            <h5>Category</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='category_id' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='category_id' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell">
            <h5>Preview</h5>
        </div>
        <div class="head-cell" title="Sort by" @click="sortBy('name')">
            <h5>Name</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='name' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='name' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell" title="Sort by" @click="sortBy('rating')">
            <h5>Rating</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='rating' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='rating' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell" title="Sort by" @click="sortBy('price')">
            <h5>Price</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='price' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='price' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell" title="Sort by" @click="sortBy('brand')">
            <h5>Brand</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='brand' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='brand' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell" title="Sort by" @click="sortBy('code')">
            <h5>Code</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='code' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='code' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell" title="Sort by" @click="sortBy('in_stock')">
            <h5>Available</h5>
            <div class="arrows">
                <h6 :class="{active: sorting==='in_stock' && order==='DESC'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: sorting==='in_stock' && order==='ASC'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
        <div class="head-cell">
            <h5>Description</h5>
        </div>
        <div class="head-cell">
            <h5>Options</h5>
        </div>
    </div>
</template>

<script>
export default {
    name: "table-head",
    emits: [
        'sortProducts'
    ],
    data() {
        return {
            sorting: '',
            order: 'ASC'
        }
    },
    methods: {
        sortBy(sorting) {
            this.sorting = sorting;
            axios.get('/api/products?sort=' + sorting
                + '&order=' + this.order
                + '&per_page=' + 10)
                .then(response => {
                    this.$emit('sortProducts', {
                        products: response.data,
                        sort: this.sorting,
                        order: this.order
                    });
                    if (this.order === 'ASC') {
                        this.order = 'DESC';
                    } else {
                        this.order = 'ASC';
                    }
                })
        }
    }
}
</script>

<style scoped>
.table-head {
    width: auto;
    height: 3rem;
    background: linear-gradient(gray, white, gray);
    display: flex;
    flex-direction: row;
    justify-content: stretch;
    align-items: stretch;
}

h5 {
    color: black;
    vertical-align: center;
    margin-left: 0.5rem;
    line-height: 3rem;
}

h6 {
    color: black;
    vertical-align: middle;
    margin-top: 0.2rem;
}

h6:hover {
    color: #454444;
    text-shadow: 2px 2px 4px #6a6868;
}

h6:active {
    color: #2d2c2c;
    text-shadow: 0 0 4px #090909;
}

.head-cell {
    display: flex;
    width: 100%;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    border-right: solid 1px gray;
}

.head-cell:hover {
    cursor: default;
    background: linear-gradient(#777, #ddd, #777);
}

.head-cell:active {
    background: linear-gradient(#555, #aaa, #555);
}

.arrows {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-right: 0.5rem;
    height: 100%;
}

.active {
    color: white;
    text-shadow: 0 0 5px #c60956;
}
</style>
