<template>
    <div class="holder">
        <img src="" alt="">
        <h6>{{employee.proffecy}}</h6>
        <h5>{{employee.name}}</h5>
        <p>{{employee.about}}</p>
        <div class="socials" v-for="(social, index) in employee.socials">
            <div class="soc-holder" >
                <a href="#" v-html="social.sign"></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "employee-card",
    props: [
        'employee'
    ]
}
</script>

<style scoped>

</style>
