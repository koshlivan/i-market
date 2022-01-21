<template>
    <div class="preferences">
        <div class="pref-keeper" v-for="(pref, index) in preferences" :key="index">
            <h6>{{pref.name}}</h6>
            <div class="option-keeper" v-model="checkedFilters"
                 v-for="(option, index) in pref.options" :key="index">
                <input type="checkbox">
                <label>{{option}}</label>
            </div>
        </div>
        <button>refine search</button>
    </div>
</template>

<script>
export default {
    name: "preferences",
    data() {
        return {
            checkedFilters : [],
            preferences: [
                {name: 'color', options: ['red', 'blue', 'white', 'pink']},
                {name: 'size', options: ['big', 'medium', 'small', 'like your ex has']},
                {name: 'prestige', options: ['hobbo', 'luxury', 'regular', 'teenage']},
            ]
        }
    }
}
</script>

<style scoped>
.preferences {
    display: flex;
    width: 100%;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.pref-keeper {
    margin: 1rem 0;
}
h6 {
    font-weight: 600;
    color: rgb( 76, 76, 76);
    text-transform: capitalize;
}
label {
    text-transform: capitalize;
}
button {
    text-transform: uppercase;
    background-color: #424242;
    color: white;
    width: 10rem;
    height: 3rem;
    border: none;
    font-weight: 600;
    margin-bottom: 2rem;
}
button:hover {
    cursor: pointer;
    background-color: #626262;
    text-shadow: 0 0 2px black;
}
button:active {
    background-color: #222222;
    color: #424242;
}
</style>
