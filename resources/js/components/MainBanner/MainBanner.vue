<template>
    <div class="container">
        <div id="main_banner" class="carousel slide">
            <div class="indicator-holder">
                <h1 v-for="(banner, index) in images"
                    class="indicator"
                    :class="{'indicator-active' : index===imageIndex}"
                    @click="indicatorClick(index)">
                    <span class="material-icons">radio_button_unchecked</span>
                </h1>
            </div>
            <div class="carousel-image">
                <img class="d-block mw-100 mh-75" :src="imageNow" alt="First slide">
                <div class="banner-text"
                     :class="{'lefted' : images[imageIndex].placeLeft, 'righted' : !images[imageIndex].placeLeft}">
                    <h4 class="text-uppercase">{{images[imageIndex].description}}</h4>
                    <h1 class="text-uppercase">{{images[imageIndex].lure}}</h1>
                    <a href="#" class="text-uppercase">buy now</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "main-banner",
    data() {
        return {
            images : [
                {src : 'assets/main_banner1.jpg', description: 'wow wow wow', lure: 'buy buy now', placeLeft: false},
                {src : 'assets/main_banner2.jpg', description: 'blow your mind', lure: 'change your life', placeLeft: true},
                {src : 'assets/main_banner3.jpeg', description: 'how did you live without it?', lure: 'your main buy', placeLeft: false}],
            imageSrc : this.imageNow,
            imageIndex : 0,
        }
    },
    computed: {
        imageNow : {
            get() {
                return this.images[this.imageIndex].src;
            },
            set(value) {
                this.imageSrc = value;
            }
        },
    },
    mounted(){
        this.changeIndexInTime(2500)
    },
    methods: {
        indicatorClick(index) {
            this.imageNow = this.images[index];
            this.imageIndex = index;
        },
        changeIndexInTime(interval) {
            setInterval(() => {
                if (this.imageIndex < this.images.length-1) {
                    ++this.imageIndex;
                } else {
                    this.imageIndex = 0;
                }
            }, interval);
        },
    },

}
</script>

<style scoped>
    #main_banner {
        position: relative;
        max-height: 50vh;
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
    .indicator-active {
        color: #e53a53;
    }
    .carousel-image {
        position: relative;
    }
    .carousel-image img {
        max-height: 100%;
    }
    .banner-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }
    .lefted {
        left: 10%;
    }
    .righted {
        right: 10%
    }
    .banner-text h4, .banner-text h1 {
        text-shadow: 0 0 3px #e53a53, 0 0 5px black;
        color: white;
        font-weight: 600;
    }
    .banner-text a {
        text-decoration: none;
        background-color: #e53a53;
        padding: 0.5rem 1.5rem;
        color: rgb(205, 205, 205);
    }
    .banner-text a:hover {
        cursor: pointer;
        background-color: #ea427b;
    }
    .banner-text a:active {
        cursor: pointer;
        background-color: #790b30;
    }


</style>
