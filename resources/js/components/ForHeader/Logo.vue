<template>
    <div class="row align-items-center logo-container">
        <div class="col-xs-12 col-sm-4">
            <div class="main-search mt_40">
                <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-lg"><span class="material-icons">search</span></button>
              </span>
            </div>
        </div>
        <div class="navbar-header col-xs-6 col-sm-4 justify-content-center" >
            <a class="navbar-brand" href="Home">
                <img alt="themini" src="assets/logo.png">
            </a>
        </div>
        <logo-cart></logo-cart>
    </div>
</template>

<script>
import LogoCart from './LogoCart';
export default {
    name: "Logo",
    components: {
        LogoCart
    }
}
</script>

<style scoped>
    .logo-container{
        min-height: 6rem;
    }
    .main-search {
    position: relative;
    }
    .main-search input{
        border: solid 1px rgb(156, 156, 156);
        border-radius: 0.2rem;
        background-color: #1a1e21;
        color: rgb(156, 156, 156);
    }
    .navbar-header{
        display: flex;
        justify-content: center;
        align-items: center;
    }
.navbar-header>a{
    margin: 0 auto;
}
    .input-group-btn{
        position: absolute;
        right: 0;
        top: 0;
    }
    button>span {
        color: rgb(128, 128, 128);
    }
    button>span:hover {
        color: #e53a53;
    }
</style>
