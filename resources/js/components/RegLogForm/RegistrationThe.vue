<template>
    <div class="register-part">
        <input type="text" placeholder="Username">
        <input type="email" placeholder="Email Address">
        <input type="password" placeholder="Password">
        <input type="password" placeholder="Confirm Password">
        <div class="center">
            <button>register now</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "registration-the"
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
</style>
