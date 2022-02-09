<template>
    <div class="login-part">
        <h6 v-if="errors" class="error">
            <span v-for="(error, index) in errorMessages" :key="index">{{ error }}</span>
        </h6>
        <input type="text" placeholder="Username" v-model.trim="name">
        <input type="password" placeholder="Password" v-model.trim="password">
        <div class="memory">
            <input type="checkbox" name="memory" v-model.trim="remember">
            <label>Remember Me</label>
        </div>
        <div class="center">
            <button @click.prevent="submit">LOG IN</button>
            <a href="#">forgot password?</a>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../../../../app";

export default {
    name: "login-the",
    props: [
        'user'
    ],
    data() {
        return {

            name: '',
            password: '',
            remember: false,
            errors: false,
            errorMessages: []
        }
    },
    methods: {
        submit() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    //axios.post('/api/users/login', {
                    axios.post('/login', {
                        name: this.name,
                        password: this.password,
                        remember_token: this.remember
                    })
                        .then((respond) => {
                            const token = localStorage.getItem('x_xsrf_token');
                            if (!token) {
                                localStorage.setItem('x_xsrf_token', respond.config.headers['X-XSRF-TOKEN']);
                            }
                            axios.get('/api/user')
                                .then(res => {
                                    const mayornot = localStorage.getItem('mayornot');
                                    if (!mayornot) {
                                        if (res.data['is_admin'] > 0) {
                                            localStorage.setItem('mayornot', 'Mayornot');
                                        } else {
                                            localStorage.setItem('mayornot', 'mayorNot');
                                        }
                                        ;
                                    }
                                })
                            alert('login successfull');
                            eventBus.$emit('loggedIn');
                            this.$router.push('shop');
                            console.log('login response: ', JSON.stringify(response));
                        })
                        .catch((error) => {
                            this.errors = true;
                            this.errorMessages = error.response.data.errors;
                        });
                })
                .catch(errors => {
                    console.log(errors)
                });
        }
    }
}
</script>

<style scoped>
.login-part {
    margin: 1.2rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}

.login-part input {
    margin: 0.5rem 0;
    height: 2.5rem;
}

.memory {
    margin: 1rem 0;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.memory input {
    margin-right: 0.5rem;
}

.memory label {
    font-weight: 600;
    color: #424242;
}

button {
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

a {
    margin: 1rem 0;
    text-decoration: none;
    color: #424242;
    text-transform: capitalize;
}

a:hover {
    cursor: pointer;
    color: #727272;
}

a:active {
    cursor: pointer;
    color: #222222;
}

.center {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}
</style>
