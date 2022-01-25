<template>
    <div class="table-head">
        <div class="head-cell">
            <h5>Preview</h5>
        </div>
        <div class="head-cell">
            <h5>Name</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Rating</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Price</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Brand</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Code</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Available</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Description</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Options</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
        <div class="head-cell">
            <h5>Reviews</h5>
            <div class="arrows">
                <h4><i class="fas fa-sort-up"></i></h4>
                <h4><i class="fas fa-sort-down"></i></h4>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "table-head"
}
</script>

<style scoped>
.table-head{
    width: 100%;
    height: 5rem;
    background: linear-gradient(gray, white, gray);
    display: flex;
    flex-direction: row;
    justify-content: stretch;
    align-items: stretch;
}
h5 {
    color: black;
    vertical-align: center;
    line-height: 5rem;
}
h4 {
    color:  black;
    vertical-align: middle;
    padding-top: 0.5rem;
}
h4:hover {
    color: #454444;
    text-shadow: 2px 2px 4px #6a6868;
}
h4:active {
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
    background: linear-gradient(#fc035e, #ee6094, #fc035e);
}
.head-cell:active {
    background: linear-gradient(#ee6094, #fc035e, #ee6094);
}
</style>
