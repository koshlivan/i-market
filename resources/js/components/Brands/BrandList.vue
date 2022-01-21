<template>
    <div class="brand-list">
        <navigator>brand logo</navigator>
        <div class="logos-container">
            <div class="logo-holder"
                 v-for="(logo, index) in logos"
                 :key="index">
                <img :src="logos[index]" alt="brand-logo">
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
.brand-list {
    width: 100%;
}
.logos-container{
    width: 100%;
    max-height: 10rem;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    margin: 1.5rem 0;
    overflow-x: auto;
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
