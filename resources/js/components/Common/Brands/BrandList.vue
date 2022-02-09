<template>
    <div class="brand-list">
        <navigator @lineMove="switchRight($event)">brand logo</navigator>
        <div class="swiper" ref="tileListContainer">
            <div class="logos-container" ref="tileList">
                <div class="logo-holder"
                     ref="tile"
                     v-for="(logo, index) in logos"
                     :key="index">
                    <img :src="logos[index]" alt="brand-logo">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navigator from "../Navigator";

export default {
    name: "brand-list",
    components: {Navigator},
    data() {
        return {
            logos: ['/assets/BrandLogos/brand1.png',
                '/assets/BrandLogos/brand2.png',
                '/assets/BrandLogos/brand3.png',
                '/assets/BrandLogos/brand4.png',
                '/assets/BrandLogos/brand5.png',
                '/assets/BrandLogos/brand6.png',
                '/assets/BrandLogos/brand7.png',
                '/assets/BrandLogos/brand8.png',
                '/assets/BrandLogos/brand9.png',
            ],
            currentPosition: 0
        }
    },
    methods: {
        switchRight(event) {
            if (event) {
                if (this.currentPosition >= -10 * (this.logos.length - 4)) {
                    this.currentPosition -= 10;
                    this.$refs.tileList.style.transform = `translate(${this.currentPosition}rem, 0)`;
                }
            } else {
                if (this.currentPosition <= -10) {
                    this.currentPosition += 10;
                    this.$refs.tileList.style.transform = `translate(${this.currentPosition}rem, 0)`;
                }
            }
        }
    }
}
</script>

<style scoped>
.brand-list {
    width: 100%;
}

.swiper {
    width: 100%;
    overflow-x: hidden;
    position: relative;
}

.logos-container {
    width: auto;
    max-height: 10rem;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    margin: 1.5rem 0;
    transition: 500ms;
    positon: relative;
}

.logo-holder {
    margin: 0 1rem;
    max-height: 100%;
    opacity: 60%;
    scroll-snap-align: start;
}

.logo-holder:hover {
    cursor: pointer;
    opacity: 100%;
}
</style>
