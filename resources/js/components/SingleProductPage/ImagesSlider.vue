<template>
    <div class="images-slider">
        <div class="prev">
            <i class="fas fa-chevron-circle-left"></i>
        </div>
        <div class="image" v-for="(image, index) in options" :key="index">
            <img  :src="'/'+image.image" alt="Product Image">
        </div>
        <div class="next">
            <i class="fas fa-chevron-circle-right"></i>
        </div>
        <div class="close" @click="$emit('closePreview')">
            <i class="far fa-times-circle"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "images-slider",
    props: [
        'options',
        'imageIndex'
    ],
    emits: [
      'closePreview'
    ],
    data() {
        return {
            image: 0,
            images: []
        }
    },
    watch() {
      options: this.setImages()
    },
    created(){
        this.setImages()
    },
    methods: {
        setImage() {
            this.image = '/'+this.product.options[0].image;
        },
        setImages() {
            for (option of this.options) {
                this.images.push(option.image);
            }
        },
        next() {

        }
    }
}
</script>

<style scoped>
.images-slider {
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(66, 66, 66, 0.8);
    z-index: 2;
}
.next, .prev, .close {
   font-size: 4rem;
}
.next:hover, .prev:hover, .close:hover {
    cursor: pointer;
    color: #ccc;
}
.next:active, .prev:active, .close:active {
    color: #555;
}

.close {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
}

</style>
