<template>
    <div class="register-part">
        <h6 v-if="errors" class="error">
            <span v-for="(error, index) in errorMessages" :key="index">{{error}}</span>
        </h6>
        <input type="text" placeholder="Username" v-model.trim="name" required>
        <input type="email" placeholder="Email Address" v-model.trim="email" required>
        <input type="password" placeholder="Password" v-model.trim="password" required>
        <input type="password" placeholder="Confirm Password" v-model.trim="passwordConfirm" required>
        <div class="center">
            <button @click="register">register now</button>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../../app";

export default {
    name: "registration-the",
    emits: [
        'registration'
    ],
    data(){
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirm: '',
            errors: false,
            errorMessages: []
        }
    },
    methods: {
        async register() {
            if (this.password !== this.passwordConfirm) {
                this.errors = true;
                this.errorMessage = 'Passwords do not match'
            } else {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    //axios.post('/api/users/register', {
                    axios.post('/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    })
                    .then( (respond) => {
                        localStorage.setItem('x_xsrf_token', respond.config.headers['X-XSRF-TOKEN']);
                        axios.get('/api/user')
                            .then( res => {
                                const mayornot = localStorage.getItem('mayornot');
                                if (!mayornot) {
                                    if (res.data['is_admin'] > 0) {
                                        localStorage.setItem('mayornot', 'Mayornot');
                                    } else {
                                        localStorage.setItem('mayornot', 'mayorNot');
                                    };
                                }
                            })
                        eventBus.$emit('loggedIn');this.$router.push({name: 'shop'});
                    })
                    .catch( (error) => {
                        this.errors = true;
                        this.errorMessages = error.response.data.errors;
                    });
                });
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
