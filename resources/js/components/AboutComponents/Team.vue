<template>
    <div class="holder">
        <navigator :heading="heading"></navigator>

    </div>
</template>

<script>
import Navigator from "../Navigator";
export default {
    name: "Team",
    components: {Navigator},
    data(){
        return {
            heading: 'our creative team'
        }
    }
}
</script>

<style scoped>

</style>
