<template>
    <div class="product-navigator">
        <h3>{{heading}}</h3>
        <div class="filters">
            <div><span class="material-icons">arrow_back_ios</span></div>
            <div><span class="material-icons">arrow_forward_ios</span></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "navigator",
    props: [
        'heading'
    ]
}
</script>

<style scoped>
.product-navigator {
    margin-top: 1rem;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    border-bottom: solid 2px rgb(66, 66, 66);
}
.product-navigator h3{
    text-transform: uppercase;
    color: white;
    font-weight: bold;
    padding-left: 1rem;
}
.filters {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: stretch;
}
.filters span:hover {
    cursor: pointer;
    color: #e53a53;
}
.filters span:active {
    cursor: pointer;
    color: #790b30;
}
</style>
