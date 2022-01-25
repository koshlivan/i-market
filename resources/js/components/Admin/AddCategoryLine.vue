<template>
    <div class="add-category-line">
        <div class="inputs">
            <label>Enter New Category:</label>
            <input type="text" placeholder="Category Name" v-model="categoryName">
        </div>
        <div class="actions">
            <button @click="addNewCategory"><i class="fas fa-plus-square"></i>add</button>
            <button @click="cancelNew"  ><i class="fas fa-window-close"></i>cancel</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "add-category-line",
    emits: [
        'cancelNew',
        'addCategory'
    ],
    data() {
        return {
            categoryName: ''
            }
    },
    methods : {
        addNewCategory() {
            axios.post('api/categories', {
                name: this.categoryName
            })
            .then(response => {
                this.$emit('addCategory', response.data);
                this.categoryName = '';
            })
        },
        cancelNew() {
            this.$emit('cancelNew');
            this.categoryName = '';
        }
    }
}
</script>

<style scoped>
.add-category-line {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    margin: 1rem 0;
    padding: 0.5rem;
}
.actions, .inputs{
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}
button {
    text-transform: uppercase;
}
i {
    margin-right: 0.2rem;
}
</style>
