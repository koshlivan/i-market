<template>
    <div class="leave-review">
        <h4>Write a review</h4>
        <div class="name">
            <label>Your Name</label>
            <input type="text" placeholder="From Who">
        </div>
        <div class="review-self">
            <label>Your Review</label>
            <textarea name="comment" placeholder="Leave your review" rows="5"></textarea>
            <p><mark>Note:</mark>HTML is not translated!</p>
        </div>
        <leave-rating></leave-rating>
        <div class="button-send">
            <button>continue</button>
        </div>
    </div>
</template>

<script>
import LeaveRating from "./LeaveRating";
export default {
    name: "leave-review",
    components: {LeaveRating}
}
</script>

<style scoped>
.leave-review {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
h4 {
    text-transform: capitalize;
    margin: 1rem 0;
    text-align: left;
}
.name {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.name label {
    text-align: left;
    margin: 0.5rem 0;
}
.name input {
    height: 2.5rem;
}
.review-self {
    margin: 1rem 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.review-self label {
    text-align: left;
    margin: 0.5rem 0;
}
.review-self p{
    margin: 0.5rem 0;
}
mark {
    background-color: #6c022d;
}
.button-send button {
    width: 7rem;
    height: 2.5rem;
    float: right;
    color: white;
    background-color: rgb(66, 66, 66);
    border: none;
    text-transform: uppercase;
    margin-bottom: 2rem;
}
.button-send button:hover {
    cursor: pointer;
    background-color: rgb(86, 86, 86);
}
.button-send button:active {
    color: rgb(66, 66, 66);
    background-color: rgb(46, 46, 46);
}
</style>
