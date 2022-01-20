<template>
    <div class="holder">
        <img :src="employee.image" alt="">
        <h6>{{employee.prophecy}}</h6>
        <h5>{{employee.name}}</h5>
        <p>{{employee.about}}</p>
        <div class="soc-keeper">
            <div class="socials" v-for="(social, index) in employee.socials">
                <div class="soc-holder" >
                    <a :href="social.link" v-html="social.sign"></a>
                </div>
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
    .holder {
        max-width: 28%;
        margin: 0 0.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: stretch;
    }
    img {
        filter: grayscale(100%);
    }
    img:hover {
        filter: grayscale(0%);
    }
    .soc-keeper {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: stretch;
        margin-bottom: 4rem;
    }
    .soc-holder {
        margin: 0 0.2rem;
        padding: 0.7rem 1rem;
        background-color: white;
        border-radius: 2px;
    }
    h6, h5 {
        margin-top: 0.5rem;
        text-transform: uppercase;
    }
    a {
        color:rgb(66, 66, 66);
        background-color: white;
        font-size: 20px;
    }
    a:hover{
        color: black;
        cursor: pointer;
    }
    a span{
        vertical-align: middle;
        padding-bottom: 0.6rem;
    }
</style>
