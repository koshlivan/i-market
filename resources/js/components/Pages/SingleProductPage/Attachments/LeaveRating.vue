<template>
    <div class="leave-rating">
        <div class="rating">
            <h5>Rating</h5>
            <p>Bad</p>
            <input type="radio"
                   name="rate"
                   v-for="index in 5"
                   :key="index" value="index" @change="$emit('rating', index)">
            <p>Good</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "leave-rating",
    emits: [
        'rating'
    ],

}
</script>

<style scoped>
.leave-rating {
    width: 100%;
}

.rating {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}

.rating h5 {
    padding-top: 0.5rem;
    margin-left: 0.5rem;
    vertical-align: middle;
}

.rating p {
    margin: 0 0.5rem;
    vertical-align: middle;
}
</style>
