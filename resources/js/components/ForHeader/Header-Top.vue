<template>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xs-12 col-sm-4">
                    <div class="header-top-left">
                        <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Days a week from 9:00 am to 7:00 pm</span></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <ul class="header-top-right text-right">
                        <li><router-link tag="a" class="link-to" to="/admin">Admin management</router-link></li>
                        <li class="account" v-show="!isLogged">
                            <router-link tag="a" class="link-to" to="/login">Account</router-link>
                        </li>
                        <li class="account" v-show="isLogged">
                            <a href="#" @click.prevent="logout">Logout</a>
                        </li>
                        <li class="language dropdown align"> <span
                            class="dropdown-toggle"
                            id="dropdownMenu1"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            role="button">Language <span class="caret"></span> </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#" class="dropdown-item">English</a></li>
                                <li><a href="#" class="dropdown-item">Russian</a></li>
                                <li><a href="#" class="dropdown-item">Ukrainian</a></li>
                            </ul>
                        </li>
                        <li class="currency dropdown">
                            <span class="dropdown-toggle"
                                  id="dropdownMenu12"
                                  data-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                  role="button"
                        >Currency <span class="caret"></span> </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                                <li><a href="#" class="dropdown-item">€ Euro</a></li>
                                <li><a href="#" class="dropdown-item">₴ Hrivna</a></li>
                                <li><a href="#" class="dropdown-item">$ US Dollar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../../app";

export default {
    name: "Header-Top",
    data() {
        return {
            isLogged: false
        }
    },
    methods: {
        logout() {
            axios.post('/api/users/logout')
            .then( () => {
                this.isLogged = false;
            });
        }
    },
    created() {
        eventBus.$on('loggedIn', () => {
            this.isLogged = true;
        })
    }
}
</script>

<style scoped>
.header-top {
    border-bottom-color: rgb(66, 66, 66);
    border-bottom-style: solid;
    border-bottom-width: 1px;
}
.currency, .language{
    text-align: right;
}

.account {
    cursor: pointer;
    display: inline;
    list-style-image: none;
    list-style-position: outside;
    padding: 0 0.8rem;
    text-align: right;
}
.account a {
    color: rgb(204, 204, 204);
    cursor: pointer;
    text-decoration: none;
    transition-duration: 0.25s;
    transition-property: all;
    transition-timing-function: ease;
}
.header-top-right{
    display: flex;
    justify-content: flex-end;
    align-items: stretch;
}
.header-top-right li {
    max-width: 20%;
    min-width: 17%;
    padding-top: 0.7rem;
    list-style-image: none;
    list-style-type: none;
    line-height: 1rem;
}
.dropdown-menu {
    background-color: rgb(66, 66, 66);
}
.dropdown-menu li{
    min-width: 80%;
    max-width: 90%;
    margin: 0 0.5rem;
}
.dropdown-menu li a{
    color: rgb(255, 255, 255);
    font-weight: 600;
}
.dropdown-menu li:hover{
    background-color: #e53a53;
    cursor: pointer;
}
.dropdown-menu li:hover a{
    background-color: #e53a53;
    cursor: pointer;
}
.dropdown-item{

}
</style>
