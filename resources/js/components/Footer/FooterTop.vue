<template>
    <div class="container">
        <div class="footer-header-holder">
            <div class="caller">
                <h3>follow our updates!</h3>
                <p>Be the First to know about our Fresh Arrivals and much more!</p>
            </div>
            <div>
                <form @submit.prevent="onSubmit" class="subscriber">
                    <input type="email" placeholder="Enter Your Email">
                    <input type="submit" value="SUBSCRIBE">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "footer-header",

}
</script>

<style scoped>
.footer-header-holder {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    padding: 4rem 0;
}

.caller {
    display: flex;
    flex-direction: column;
    justify-items: center;
    align-items: stretch;
    max-width: 50%;
}

.caller h3 {
    text-transform: uppercase;
    color: white;
    font-weight: bold;
}

.caller p {
    text-transform: capitalize;
}

.subscriber {
    display: flex;
    min-width: 50%;
    flex-direction: row;
    justify-content: center;
    align-items: stretch;
}

.subscriber input {
    margin: 0;
    padding: 0.7rem 2rem;
}

input[type="email"] {
    min-width: 65%;
    background-color: white;
    border-radius: 2px;
}

input[type="submit"] {
    max-width: 35%;
    background-color: black;
    color: white;
    text-transform: uppercase;
    font-weight: 600;
}

input[type="submit"]:hover {
    cursor: pointer;
    background-color: #e53a53;
}

input[type="submit"]:active {
    cursor: pointer;
    background-color: #790b30;
}

@media screen and (max-width: 800px) {
    .footer-header-holder {
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }
}

</style>
