<template>
    <div class="sorting-the">
        <div class="plates">
            <p :class="{active : viewModePlates}" @click="plateModeClick"><i class="fas fa-th"></i></p>
            <p :class="{active : !viewModePlates}" @click="listModeClick"><i class="fas fa-list"></i></p>
        </div>
        <div class="options">
            <div class="choose">
                <label>Sort By:</label>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ sortOption }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li v-for="(field, index) in sortFields"
                            :key="index"
                            @click="sortPicked(field)"> <p class="dropdown-item">{{ field }}</p></li>
                    </ul>
                </div>
            </div>
            <div class="choose">
                <label>Show:</label>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownShow" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ showOption }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li v-for="(showView, index) in showViews"
                            :key="index"
                            @click="showPicked(showView)"><p class="dropdown-item">{{showView}}</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "sorting-the",
    emits: [
        'sortPicked',
        'showPicked'
    ],
    data() {
        return  {
            viewModePlates : true,
            sortOption: 'default',
            showOption: 'default',
            showViews: [9, 20, 50, 100, 200],
            sortFields: ['Name (A - Z)',
                         'Name (Z - A)',
                         'Price (Lower to Higher)',
                         'Price (Higher to Lower)',
                         'Rating (Lower to Higher)',
                         'Rating (Higher to Lower)',
                         'Newest to Older',
                         'Oldest to Newer']
        }
    },
    methods: {
        listModeClick() {
            this.viewModePlates = false;
            this.$emit('viewModePlates', false);
        },
        plateModeClick() {
            this.viewModePlates = true;
            this.$emit('viewModePlates', true);
        },
        sortPicked(field) {
            this.sortOption = field;
            this.$emit('sortPick', field);
        },
        showPicked(show) {
            this.showOption = show;
            this.$emit('showPick', show);
        }
    }
}
</script>

<style scoped>
.sorting-the {
    width: 100%;
    height: 3.5rem;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    border: solid 3px white;
    border-radius: 3px;
}
.plates {
    margin-left: 1rem;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}
.plates p {
    font-size: 1.5rem;
    margin: 0 0.5rem;
}
.plates p:hover {
    cursor:pointer;
}
.options {
    padding-top: 1rem;
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: center;
    margin-right: 1rem;
}
.choose {
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding-bottom: 0.6rem;
}
.choose li:hover {
    cursor: default;
}
.choose label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #9c9c9c;
}

.active {
    color: #f93f51;
}
.option {
    margin: 0 0.5rem;
}
#dropdownSort {
    text-transform: capitalize;
    color: rgb(156, 156, 156);
}
#dropdownShow {
    text-transform: capitalize;
    color: rgb(156, 156, 156);
}
</style>
