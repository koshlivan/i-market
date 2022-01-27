<template>
    <div class="register-part">
        <h6 v-if="errors" class="error">{{errorMessage}}</h6>
        <input type="text" placeholder="Username" v-model="userName">
        <input type="email" placeholder="Email Address" v-model="email">
        <input type="password" placeholder="Password" v-model="password">
        <input type="password" placeholder="Confirm Password" v-model="passwordConfirm">
        <div class="center">
            <button @click="register">register now</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "registration-the",
    data(){
        return {
            userName: '',
            email: '',
            password: '',
            passwordConfirm: '',
            errors: false,
            errorMessage: ''
        }
    },
    methods: {
        register() {
            if (this.password !== this.passwordConfirm) {
                this.errors = true;
                this.errorMessage = 'Passwords do not match'
            }
        }
    }
}
</script>

<style scoped>
.register-part {
    margin: 1.2rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.register-part input{
    margin: 0.5rem 0;
    height: 2.5rem;
}

button {
    text-transform: uppercase;
    border: none;
    color: white;
    background-color: #424242;
    padding: 0.8rem 4rem;
}
button:hover {
    cursor: pointer;
    background-color: #727272;
}
button:active {
    background-color: #222222;
    color: #424242;
}
.center {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}
.error {
    color: red;
    font-weight: 500;
    padding: 0.2rem 2rem;
    border: solid 1px red;

}
</style>
