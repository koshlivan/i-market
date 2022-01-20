<template>
    <div class="sorting-the">
        <div class="plates">
            <p><i class="fas fa-th"></i></p>
            <p><i class="fas fa-list"></i></p>
        </div>
        <div class="options">
            <div class="choose">
                <label>Sort By:</label>
                <select name="sorting" id="sort_by">
                    <option value="rating">Rating</option>
                    <option value="price">Price</option>
                    <option value="name">Name</option>
                </select>
            </div>
            <div class="choose">
                <label>Show:</label>
                <select name="showing" id="show_number">
                    <option value="3">9</option>
                    <option value="6">20</option>
                    <option value="9">50</option>
                    <option value="9">100</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "sorting-the"
}
</script>

<style scoped>
.sorting-the {
    width: 100%;
    height: 4rem;
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
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: stretch;
    margin-right: 1rem;
}
.choose label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #9c9c9c;
}
.choose options{
    background-color: black;
    border: none;
    width: 5rem;
    height: 1.2rem;
}
.active {
    color: #f93f51;
}
</style>
