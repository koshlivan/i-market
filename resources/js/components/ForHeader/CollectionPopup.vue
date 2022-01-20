<template>
    <ul class="collection-dropdown-menu row" @mouseover="$emit('mouseover')" @mouseleave="$emit('mouseleave')">
        <li class="col-md-3">
            <ul class="popup-column">
                <li class="dropdown-header">Women's</li>
                <li><a href="#">Unique Features</a></li>
                <li><a href="#">Image Responsive</a></li>
                <li><a href="#">Auto Carousel</a></li>
                <li><a href="#">Newsletter Form</a></li>
                <li><a href="#">Four columns</a></li>
                <li><a href="#">Four columns</a></li>
                <li><a href="#">Good Typography</a></li>
            </ul>
        </li>
        <li class="col-md-3">
            <ul class="popup-column">
                <li class="dropdown-header">Man's</li>
                <li><a href="#">Unique Features</a></li>
                <li><a href="#">Image Responsive</a></li>
                <li><a href="#">Four columns</a></li>
                <li><a href="#">Auto Carousel</a></li>
                <li><a href="#">Newsletter Form</a></li>
                <li><a href="#">Four columns</a></li>
                <li><a href="#">Good Typography</a></li>
            </ul>
        </li>
        <li class="col-md-3">
            <ul class="popup-column">
                <li class="dropdown-header">Children's</li>
                <li><a href="#">Unique Features</a></li>
                <li><a href="#">Four columns</a></li>
                <li><a href="#">Image Responsive</a></li>
                <li><a href="#">Auto Carousel</a></li>
                <li><a href="#">Newsletter Form</a></li>
                <li><a href="#">Four columns</a></li>
                <li><a href="#">Good Typography</a></li>
            </ul>
        </li>
        <li class="col-md-3">
                    <div id="Slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/collection_banner1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/collection_banner2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/collection_banner3.jpg" alt="Third slide">
                            </div>
                        </div>
                    </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "collection-popup"
}
</script>

<style scoped>
.collection-dropdown-menu{
    display:flex;
    position: absolute;
    top: 3rem;
    left: 0.8rem;
    background-color: rgb(66, 66, 66);
    width: 100%;
    transition: 300ms;
    list-style-image:none;
    list-style-type: none;
    z-index: 2;
}
.collection-dropdown-menu ul{
    padding-top: 2rem;
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
.dropdown-header{
    color: white;
    text-transform: uppercase;
    font-size: 1.2rem;
    font-weight: bolder;
    list-style-image: none;
    list-style-type: none;
}
.popup-column a{
    text-align: left;
    font-weight: 500;
    color: rgb(200, 200, 200);
    text-transform: none;
    text-decoration: none;
    margin: 1rem 0;
    padding: 0.5rem 0.5rem;
}
.popup-column li {
    margin: 0;
    padding: 0.5rem 0.5rem;
}
.popup-column li:hover {
    background-color: #e53a53;
}
#Slider {
    width: 90%;
    margin: 2.5rem 3rem 2rem 1rem;
    border: solid 4px white;
}
</style>
