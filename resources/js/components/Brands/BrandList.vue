<template>
    <div class="container">
        <navigator :heading="heading"></navigator>
        <div class="logos-container">
            <div class="logo-holder"
                 v-for="(logo, index) in logos"
                 :key="index">
                <img :src="logos[index]" alt="">
            </div>
        </div>
    </div>
</template>

<script>
import Navigator from "../Navigator";
export default {
    name: "brand-list",
    components: {Navigator},
    data(){
        return {
            heading : 'brand logo',
            logos : ['assets/BrandLogos/brand1.png',
                     'assets/BrandLogos/brand2.png',
                    'assets/BrandLogos/brand3.png',
                    'assets/BrandLogos/brand4.png',
                    'assets/BrandLogos/brand5.png',
                    'assets/BrandLogos/brand6.png',
                    'assets/BrandLogos/brand7.png',
                    'assets/BrandLogos/brand8.png',
                    'assets/BrandLogos/brand9.png',
            ]
        }
    }
}
</script>

<style scoped>
.logos-container{
    width: 100%;
    max-height: 10rem;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: nowrap;
    align-items: stretch;
    margin: 1.5rem 0;
}
.logo-holder {
    max-height: 100%;
    opacity: 60%;
}
.logo-holder:hover {
    cursor: pointer;
    opacity: 100%;
}
</style>
