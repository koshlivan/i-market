<template>
    <div class="stars">
        <div v-for="index in 5">
            <div :class="{'rated' : index <= rating}">
                <span class="material-icons">grade</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "stars-rating",
    props: [
        'rating'
    ]
}
</script>

<style scoped>
.stars {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
.rated{
    color: #e53a53;
}
span {
    font-size: 1em;
}
</style>
