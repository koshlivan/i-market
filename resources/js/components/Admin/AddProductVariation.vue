<template>
    <div class="add-product-variation">
            <label>Image for variation:</label>
            <input type="file" id="optionImage">
            <input type="text" placeholder="Difference option" v-model="difference" @blur="$emit('optionChange', difference)">
    </div>
</template>

<script>
export default {
    name: "add-product-variation",
    emits: [
        'optionChange'
    ],
    data() {
        return {
            difference: ''
        }
    },
}
</script>

<style scoped>
.add-product-variation {
    max-width: 100%;
    box-sizing: border-box;
    margin: 1rem;
    padding: 0.5rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: stretch;
    border: solid 2px white;
}
</style>
