<template>
    <div class="container">
        <div class="for-image">
            <img src="assets/fashion.jpg" alt="fashion">
        </div>
    </div>
</template>

<script>
export default {
    name: "fashion-show"
}
</script>

<style scoped>
    .for-image{
        background-color: #211f20;
        padding-top: 2rem;
        width: 100%;
        height: 20rem;
        display: flex;
        justify-content: center;
        align-content: center;
    }
    .for-image img {
        max-width: 80%;
        max-height: 80%;
        transition: 700ms;
    }
    .for-image:hover img {
        max-width: 95%;
        max-height: 95%;
    }
</style>
