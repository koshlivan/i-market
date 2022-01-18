<template>
    <nav class="navbar">
            <ul id="menu" class="nav navbar-nav">
                <li> <a href="index.html">Home</a></li>
                <li class="collection-dropdown">
                    <a href="#"
                       @mouseleave="collectionButHide"
                       @mouseover="collectionButShow">Collection
                    </a>
                </li>
                <li> <a href="category_page.html">Shop</a></li>
                <li> <a href="blog_page.html">Blog</a></li>
                <li class="dropdown">
                    <a href="#"
                       @mouseleave="pagesButHide"
                       @mouseover="pagesButShow">Pages
                    </a>

                </li>
                <li> <a href="about.html">About us</a></li>
                <li> <a href="contact_us.html">Contact us</a></li>
            </ul>
        <collection-popup v-show="collectionHover" @mouseover="collectionPopupShow" @mouseleave="collectionPopupHide"></collection-popup>
        <pages-popup v-show="pagesHover" @mouseover="pagesPopupShow" @mouseleave="pagesPopupHide"></pages-popup>
    </nav>
</template>

<script>
import CollectionPopup from "./CollectionPopup";
import PagesPopup from "./PagesPopup";
export default {
    name: "Navigator",
    components: {PagesPopup, CollectionPopup},
    data() {
        return {
            collectionButHover: false,
            collectionPopupHover: false,
            pagesButHover: false,
            pagesPopupHover: false,
        }
    },
    computed: {
        collectionHover() {
            if (this.collectionButHover || this.collectionPopupHover) {
                return true;
            }
            if (!this.collectionButHover && !this.collectionPopupHover){
                return false;
            }
        },
        pagesHover() {
            if (this.pagesButHover || this.pagesPopupHover) {
                return true;
            }
            if (!this.pagesButHover && !this.pagesPopupHover){
                return false;
            }
        }
    },
    methods: {
        collectionButShow() {
                this.collectionButHover = true;
        },
        collectionPopupShow() {
            this.collectionPopupHover = true;
        },
        collectionButHide() {
                this.collectionButHover=false;
        },
        collectionPopupHide() {
                this.collectionPopupHover=false;
        },
        pagesPopupShow() {
            this.pagesPopupHover = true;
        },
        pagesButShow() {
            this.pagesButHover = true;
        },
        pagesPopupHide() {
            this.pagesPopupHover=false;
        },
        pagesButHide() {
            this.pagesButHover=false;
        }
    }
}
</script>

<style scoped>
.navbar{
    min-height: 4rem;
    width: 100%;
    background-color: rgb(66, 66, 66);
    position: relative;
}
.navbar>p {
    text-transform: uppercase;
    color: rgb(200, 200, 200);
    margin-left: 1rem;
    margin-top: 0.5rem;
    vertical-align: center;
    font-weight: 800;
    font-size: 1.2rem;
}

.navbar-toggle span{
    font-size: 2rem;
    vertical-align: middle;
}
#menu {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-content: stretch;
}
#menu li{
    min-height: 100%;
    margin: 0;
}
#menu li a{
    text-transform: uppercase;
    color: rgb(200, 200, 200);
    text-decoration: none;
    text-align: center;
    padding: 1rem 0.5rem;
    font-weight: 600;
    margin: 0 0.1rem;
}
#menu li:hover a{
    cursor: pointer;
    background-color: #e53a53;
}
.collection-dropdown-menu ul{
    list-style-type: none;
    list-style-image: none;
}
.collection-dropdown-menu a{
    text-align: left;
    font-size: 0.8rem;
    font-weight: 400;
    text-transform: none;
    padding: 0;
    margin: 0;
}
.popup-column li a{
    text-align: left;
    font-weight: 400;
    text-transform: none;
    margin: 0.5rem 0;
    padding: 0;
}
</style>
