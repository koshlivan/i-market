<template>
    <div class="holder">
        <about-cap>skills</about-cap>
        <div class="carts"
             v-for="(cart, index) in carts"
             :key="index">
            <div class="cart-self">
                <p class="technology">{{cart.name}}</p>
                <p class="percent">{{cart.progress}}</p>
                <div class="progress"
                     :style="{'background' : cart.cartColor, 'width': cart.progress}"></div>
            </div>
        </div>
    </div>
</template>

<script>
import AboutCap from "./Cap";
export default {
    name: "about-skills",
    components: {AboutCap},
    data(){
        return {
            carts: [
                {name : 'HTML/HTML5', progress: '60%', cartColor: '#337ab7'},
                {name : 'ASP.Net', progress: '40%', cartColor: '#5cb85c'},
                {name : 'Java', progress: '20%', cartColor: '#5bc0de'},
                {name : 'Javascript/JQuery', progress: '60%', cartColor: '#f0ad4e'},
                {name : 'CSS/CSS3', progress: '80%', cartColor: '#d9534f'},
            ]
        }
    }
}
</script>

<style scoped>
.cart-self {
    width: 100%;
    margin: 0.2rem 0;
    max-height: 2rem;
    background-color: white;
    position: relative;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
}
.progress {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
}
.technology{
    z-index: 1;
    font-weight: 500;
    padding-top: 0.2rem;
    margin-left: 1rem;
    color: white;
    text-shadow: 0 0 3px black;
    vertical-align: middle;
}
.percent {
    margin-right: 1rem;
    color: black;
    text-shadow: 0 0 3px white;
    vertical-align: middle;
}
</style>
