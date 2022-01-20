<template>
    <div class="container">
        <div class="map-holder">
            <ul>
                <li><h3>information</h3></li>
                <li><router-link tag="a" class="link-to" to="/about">About Us</router-link></li>
                <li><a href="#">delivery information</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">terms and conditions</a></li>
                <li><router-link tag="a" class="link-to" to="/contacts">Contact Us</router-link></li>
            </ul>
            <ul>
                <li><h3>services</h3></li>
                <li><a href="#">returns</a></li>
                <li><a href="#">site map</a></li>
                <li><a href="#">wish list</a></li>
                <li><a href="#">my account</a></li>
                <li><a href="#">order history</a></li>
            </ul>
            <ul>
                <li><h3>extras</h3></li>
                <li><a href="#">brands</a></li>
                <li><a href="#">gift sertificates</a></li>
                <li><a href="#">affiliates</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">newsletter</a></li>
            </ul>
            <ul>
                <li><h3>contacts</h3></li>
                <li><p>warehouse & offices</p></li>
                <li><p>12345 Avenu name, zaporizhzhya ukraine</p></li>
                <li><p>(012)-345-67-89</p></li>
                <li><p>email@mail.com</p></li>
                <li><a href="#">www.site.com</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "footer-map"
}
</script>

<style scoped>
ul {
    list-style-image: none;
    list-style-type: none;
}
.map-holder {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-content: stretch;
}
.map-holder h3 {
    color: white;
    text-transform: uppercase;
    font-weight: bolder;
}
.map-holder a {
    text-decoration: none;
    text-transform: capitalize;
    color: rgb(156, 156, 156);
}
.map-holder a:hover {
    cursor: pointer;
    color: #e53a53;
}
.map-holder a:active {
    color: #790b30;
}
.map-holder p {
    text-transform: capitalize;
    padding: 0;
    margin: 0;
}
</style>
