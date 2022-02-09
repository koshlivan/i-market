<template>
    <div class="container">
        <div class="wrapper">
            <div class="side-menu">
                <side-menu></side-menu>
            </div>
            <div class="about-info">
                <img src="assets/About/dafoe.jpg" alt="">
                <h2>the mini Design is nice way to stole design variant</h2>
                <p>{{ blaBla }}</p>
                <button>hire me</button>
                <div class="carts row">
                    <about-doings></about-doings>
                    <about-skills></about-skills>
                </div>
                <team></team>
            </div>
        </div>
    </div>
</template>

<script>
import SideMenu from "../../SideMenu/SideMenu";
import AboutDoings from "./Attachments/Doings";
import AboutSkills from "./Attachments/Skills";
import Team from "./Attachments/Team";

export default {
    name: "About",
    components: {
        Team,
        SideMenu,
        AboutDoings,
        AboutSkills
    },
    data() {
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

.side-menu {
    width: 28%;
}

.about-info {
    width: 70%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}

.about-info img {
    max-width: 100%;
    margin-top: 3rem;
}

.about-info h2 {
    margin-top: 1.5rem;
    padding-left: 0.5rem;
    text-transform: uppercase;
    font-weight: 500;
}

.about-info p {
    text-indent: 2rem;
    text-align: justify;
}

.about-info button {
    max-width: 6rem;
    height: 3rem;
    background-color: #424242;
    text-transform: uppercase;
    color: white;
    border: none;
}

.about-info button:hover {
    background-color: #626262;
    text-shadow: 0 0 3px white;
}

.about-info button:active {
    background-color: #222222;
    color: #424242;
}

.carts {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-content: stretch;
    height: 25rem;
    overflow: hidden;
}
</style>
