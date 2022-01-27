<template>
    <div class="pre-table">
        <h5><slot></slot></h5>
        <div class="adder" @click="$emit('addNew')"><i class="fas fa-plus-circle"></i></div>
    </div>
</template>

<script>
export default {
    name: "title-table",
    emits: [
        'addNew'
    ]
}
</script>

<style scoped>
.pre-table {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    margin-top: 2rem;
}
h5  {
    text-transform: uppercase;
    color: white;
    font-weight: 600;
}
.adder {
    position: fixed;
    right: 2rem;
    bottom: 10%;
    margin: 1rem;
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    background-color: green;
    color: white;
    font-size: 1.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
}
.adder:hover {
    background-color: #5fbf5f;
    cursor: pointer;
}
.adder:active {
    background-color: #0f500f;
    color: #668066;
}
</style>
