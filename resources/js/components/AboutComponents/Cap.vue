<template>
    <div class="cap">
        <h3><slot></slot></h3>
    </div>
</template>

<script>
export default {
    name: "about-cap",
}
</script>

<style scoped>
    .cap {
        margin-top: 0.5rem;
        border-bottom: solid 2px rgb(66, 66, 66);
    }
    h3 {
        text-transform: uppercase;
        font-weight: 500;
        color: white;
    }
</style>
