<template>
    <form class="add-product-variation" @submit.prevent="upload">
            <label>Image for variation:</label>
            <input type="file" id="optionImage" @change="onChange">
            <input type="text" placeholder="Difference option" v-model="difference">
            <input type="submit" value="SAVE MODE">
    </form>
</template>

<script>
export default {
    name: "add-product-variation",
    emits: [
        'optionChange'
    ],
    data() {
        return {
            difference: '',
            image: null,
            imagePath: ''
        }
    },
    methods: {
        onChange(e) {
            this.image = e.target.files[0];
        },
        upload() {
            if (this.image === null  &&  this.difference === '') return;
            if (this.image !== null) {
                console.log('in if, image is filled');
                const formData = new FormData;
                formData.set('image', this.image);
                axios.post('api/attachments', formData)
                    .then( response => {
                        this.imagePath = 'storage/'+response.data;
                        console.log('saving image path: '+this.imagePath);
                        this.$emit('optionChange', {
                            differ: this.difference,
                            image: this.imagePath
                        });
                    });
            } else {
                console.log('in else, image is absent');
                this.$emit('optionChange', {
                    differ: this.difference,
                    image: this.imagePath
                })
            }
        }
    }
}
</script>

<style scoped>
.add-product-variation {
    max-width: 100%;
    box-sizing: border-box;
    margin: 1rem;
    padding: 0.5rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: stretch;
    border: solid 2px white;
}
</style>
