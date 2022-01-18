<template>
    <div>
        <Header></Header>
        <main-banner></main-banner>
    </div>
</template>

<script>
import Header from './Header';
import MainBanner from "./MainBanner/MainBanner";
export default {
    name: "Home",
    components: {
        MainBanner,
        Header
    }
}
</script>

<style scoped>

</style>
