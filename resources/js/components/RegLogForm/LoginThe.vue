<template>
    <div class="login-part">
        <input type="text" placeholder="Username">
        <input type="password" placeholder="Password">
        <div class="memory">
            <input type="checkbox" name="memory">
            <label>Remember Me</label>
        </div>
        <div class="center">
            <button>LOG IN</button>
            <a href="#">forgot password?</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "login-the"
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
.login-part input{
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
