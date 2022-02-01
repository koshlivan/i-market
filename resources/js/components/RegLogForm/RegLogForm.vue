<template>
    <div class="reg-log-form">
        <form @submit.prevent="formSubmit" class="form-self">
            <div class="log-reg-switcher">
                <h5 :class="{inactive : !isLoginWindow, active : isLoginWindow}"
                    @click="loginWindow">login</h5>
                <h5 :class="{inactive : isLoginWindow, active : !isLoginWindow}"
                    @click="registerWindow">register</h5>
            </div>
            <login-the v-show="isLoginWindow" :user="user"></login-the>
            <registration-the v-show="!isLoginWindow" @registration="registration($event)"></registration-the>
        </form>
    </div>
</template>

<script>
import RegistrationThe from "./RegistrationThe";
import LoginThe from "./LoginThe";
export default {
    name: "reg-log-form",
    components: {LoginThe, RegistrationThe},
    emits: [
        'submitted'
    ],
    data() {
      return {
          isLoginWindow: true,
          user: {}
      }
    },
    methods: {
        formSubmit() {

        },
        loginWindow() {
            this.isLoginWindow = true;
        },
        registerWindow() {
            this.isLoginWindow = false;
        },
        registration(user) {
            this.user = user;
            this.isLoginWindow = true;
        }
    }

}
</script>

<style scoped>
.reg-log-form {
    margin-top: 4rem;
    background-color: white;
    border-radius: 4px;
    width: 50%;
    height: 26rem;
}
.form-self {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: stretch;
}
.log-reg-switcher {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    margin: 1.2rem;
    border-bottom: solid 1px black;
}
.log-reg-switcher h5{
    box-sizing: border-box;
    width: 48%;
    text-align: left;
    text-transform: capitalize;
    padding-bottom: 1.2rem;
}
.log-reg-switcher h5:hover{
    cursor: pointer;
}
.active{
    color: rgb(66, 66,  66);
}
.inactive {
    color: rgb(156, 156,  156);
}

</style>
