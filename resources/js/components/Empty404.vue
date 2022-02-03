<template>
    <div class="empty-page">
        <h1>
            are you lost?
        </h1>
        <h2>
            it is no such page here!
        </h2>
<!--        <input type="text" v-model="phrase">-->
<!--        <p>{{phrase}}</p>-->
<!--        <button @click="crypt"  >do</button>-->
<!--        <button @click="decrypt"  >undo</button>-->
        <img src="/assets/oops.jpg" alt="oops">
    </div>
</template>

<script>
export default {
    name: "Empty404",
    // data() {
    //     return {
    //         phrase: ''
    //     }
    // },
    // methods : {
    //     crypt() {
    //         let encrypted = CryptoJS.AES.encrypt(this.phrase, '123');
    //         this.phrase = encrypted.toString();
    //     },
    //     decrypt() {
    //         this.phrase = CryptoJS.AES.decrypt(this.phrase.toString(), '123').toString(CryptoJS.enc.Utf8);
    //     }
    // }

}
</script>

<style scoped>
.empty-page {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}
h1, h2  {
    margin: 2rem 0;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    text-shadow: 0px 0px 10px #cb1a5f;
}
img {
    max-width: 50%;
    max-height: 50vh;
}
</style>
