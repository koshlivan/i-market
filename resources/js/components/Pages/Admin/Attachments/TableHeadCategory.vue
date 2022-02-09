<template>
    <div class="table-head">
        <div class="head-cell" title="Sort by name" @click="sorting">
            <h5>Name</h5>
            <div class="arrows">
                <h6 :class="{active: order === 'DESC' && sort ==='name'}"><i class="fas fa-sort-up"></i></h6>
                <h6 :class="{active: order === 'ASC' && sort ==='name'}"><i class="fas fa-sort-down"></i></h6>
            </div>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../../../../app";

export default {
    name: "table-head-category",
    emits: [
        'sortCategory'
    ],
    data() {
        return {
            sort: '',
            order: 'ASC'
        }
    },
    methods: {
        sorting() {
            this.sort = 'name'
            axios.get('/api/categories?sort=' + this.sort
                + '&order=' + this.order)
                .then(response => {
                    if (this.order === 'ASC') {
                        this.order = 'DESC'
                    } else {
                        this.order = 'ASC'
                    }
                    this.$emit('sortCategory', response.data);
                })
        },
        resetSort() {
            this.sort = null;
        }
    },
    created() {
        eventBus.$on('resetSort', () => {
            this.resetSort();
        })
    }
}
</script>

<style scoped>
.table-head {
    width: 100%;
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
    line-height: 3rem;
    margin-left: 1rem;
}

.arrows {
    display: flex;
    flex-direction: column;
    justif-content: center;
    align-items: center;
    margin-right: 1rem;
}

h6 {
    color: black;
    vertical-align: middle;
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
    padding: 2px;
}

.head-cell:hover {
    cursor: default;
    background: linear-gradient(#bbb, #eee, #bbb);
}

.head-cell:active {
    background: linear-gradient(#aaa, #777, #aaa);
}

.active {
    color: white;
    text-shadow: 0 0 5px #d7255d;
}
</style>
