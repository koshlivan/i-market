<template>
    <div class="my-footer">
        <footer-header></footer-header>
        <footer-map></footer-map>
    </div>
</template>

<script>
import FooterHeader from "./FooterTop";
import FooterMap from "./FooterMap";

export default {
    name: "my-footer",
    components: {FooterMap, FooterHeader}
}
</script>

<style scoped>
.my-footer {
    background-color: rgb(66, 66, 66);
    max-width: 100%;
}
</style>
