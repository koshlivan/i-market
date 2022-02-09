<template>
    <div class="menu-tiny">
        <div class="accordion" id="accordionExample">
            <router-link tag="a" class="link-to" to="/">Home</router-link>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collection
                    </button>
                </h2>
                <div id="collapseTwo"
                     class="accordion-collapse collapse"
                     aria-labelledby="headingTwo"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <collection-popup></collection-popup>
                    </div>
                </div>
            </div>
            <a href="blog_page.html">Blog</a>
            <router-link tag="a" class="link-to" to="/shop">Shop</router-link>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Pages
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <pages-popup></pages-popup>
                    </div>
                </div>
            </div>
            <router-link tag="a" class="link-to" to="/about">About Us</router-link>
            <router-link tag="a" class="link-to" to="/contacts">Contact Us</router-link>
        </div>
    </div>
</template>

<script>
import CollectionPopup from "./CollectionPopup";
import PagesPopup from "./PagesPopup";
export default {
    name: "menu-tiny",
    components: {PagesPopup, CollectionPopup}
}
</script>

<style scoped>
.menu-tiny {
    background-color: #555;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
    position: absolute;
    left: 0;
    top: 3rem;
    z-index: 5;
}
a {
    text-decoration: none;
    color: rgb(156, 156, 156);
}
</style>
