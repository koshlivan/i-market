<template>
    <div class="container">
        <div class="wrapper">
            <side-menu></side-menu>
            <div class="about-info">
                <img src="assets/About/dafoe.jpg" alt="">
                <h2>the mini Design is nice way to stole design variant</h2>
                <p>{{blaBla}}</p>
                <button>hire me</button>
                <div class="carts">
                    <about-doings></about-doings>
                    <about-skills></about-skills>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SideMenu from "./SideMenu/SideMenu";
import AboutDoings from "./AboutComponents/Doings";
import AboutSkills from "./AboutComponents/Skills";
export default {
    name: "About",
    components: {
        SideMenu,
        AboutDoings,
        AboutSkills
    },
    data(){
        return {
            blaBla: 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'
        }
    }
}
</script>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 1.5rem;
}

</style>
