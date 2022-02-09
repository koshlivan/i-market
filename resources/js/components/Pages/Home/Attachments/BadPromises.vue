<template>
    <div class="container">
        <div class="holder">
            <div class="promise" v-for="(promise, index) in promises">
                <div class="icona">
                    <img :src="promise.image" alt="icon">
                </div>
                <div class="description">
                    <h5>{{ promise.name }}</h5>
                    <h6>{{ promise.desc }}</h6>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "bad-promises",
    data() {
        return {
            promises: [
                {name: 'free shipping', desc: 'free delivery worldwide', image: 'assets/promises/shipping.png'},
                {name: 'order online', desc: 'hours: 8am - 11pm', image: 'assets/promises/online.png'},
                {name: 'shop and save', desc: 'for all spices & herbs', image: 'assets/promises/shop.png'},
                {name: 'safe shoping', desc: 'ensure genuine 100%', image: 'assets/promises/safe.png'}
            ],
        }
    }
}
</script>

<style scoped>
.holder {
    margin: 0.2rem 0;
    padding: 1rem 0.2rem;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: stretch;
}

.promise {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: stretch;
}

.description {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: stretch;
}

.description h5 {
    color: white;
    text-transform: uppercase;
    font-weight: bold;
}

.description h5:hover {
    color: #e53a53;
}

.description h6 {
    text-transform: capitalize;
}
@media screen and (max-width: 824px) {
    .holder {
        flex-direction: column;
    }
}
</style>
