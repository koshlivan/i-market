<template>
    <div class="empty-page">
        <h1>
            are you lost?
        </h1>
        <h2>
            it is no such page here!
        </h2>
        <img src="/assets/oops.jpg" alt="oops">
    </div>
</template>

<script>
export default {
    name: "Empty404",
}
</script>

<style scoped>
.empty-page {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}

h1, h2 {
    margin: 2rem 0;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    text-shadow: 0px 0px 10px #cb1a5f;
}

img {
    max-width: 50%;
    max-height: 50vh;
}
</style>
