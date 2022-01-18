<template>
    <div class="container">
        <div id="main_banner" class="carousel slide" data-ride="carousel">
            <div class="indicator-holder">
                <h1 v-for="(banner, index) in images" class="indicator" @click="indicatorClick(index)">
                    <span class="material-icons">radio_button_unchecked</span>
                </h1>
            </div>
            <div class="carousel-inner">
                <img class="d-block w-100" :src="imageNow" alt="First slide">
                </div>
<!--            <div class="carousel-inner">-->
<!--                <div class="carousel-item active">-->
<!--                    <img class="d-block w-100" :src="images[0]" alt="First slide">-->
<!--                </div>-->
<!--                <div class="carousel-item">-->
<!--                    <img class="d-block w-100" :src="images[1]" alt="Second slide">-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</template>

<script>
export default {
    name: "main-banner",
    data() {
        return {
            images : ['assets/main_banner1.jpg', 'assets/main_banner2.jpg'],
            imageSrc : this.imageNow,
            imageIndex : 0
        }
    },
    computed: {
        imageNow(){
                setInterval( this.setImage, 1000);
        },
        setImage(){
            if (this.imageIndex < this.images.length) {
                return this.image[this.imageIndex];
                this.imageIndex++;
            } else {
                this.imageIndex = 0;
                return this.image[this.imageIndex];
                this.imageIndex++;
            }
        }
    },
    methods: {
        indicatorClick(index) {

        }
    }
}
</script>

<style scoped>
    #main_banner {
        position: relative;
    }
    .indicator-holder {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: 1rem;
        z-index: 1;
    }
    .indicator{
        margin: 0 0.5rem;
    }
    .indicator:hover {
        cursor: pointer;
        color: #e53a53;
    }
    .indicator:active {
        cursor: pointer;
        color: #790b30;
    }
</style>
