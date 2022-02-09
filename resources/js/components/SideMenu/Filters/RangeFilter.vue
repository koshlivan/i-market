<template>
    <div class="range-filter">
        <div class="price-range">
            <p>Price range:</p>
            <h5>{{ minChoose + ' - ' + maxChoose }}</h5>
        </div>
        <section class="range-slider">

            <input name="rangeOne"
                   v-model="minChoose"
                   value="10"
                   :min="minPrice"
                   :max="maxChoose"
                   step="1"
                   type="range">
            <input name="rangeTwo"
                   v-model="maxChoose"
                   value="90"
                   :min="minChoose"
                   :max="maxPrice"
                   step="1"
                   type="range">
        </section>
    </div>
</template>

<script>
export default {
    name: "range-filter",
    props: [
        'minPrice',
        'maxPrice'
    ],
    data() {
        return {
            minMinRange: this.minimalPrice,
            minChoose: this.minPrice,
            maxChoose: this.maxPrice,
            maxMaxRange: this.maximalPrice,
        }
    },
    computed: {
        minimalPrice() {
            return this.minPrice;
        },
        maximalPrice() {
            return this.maxPrice;
        }
    }
}
</script>

<style scoped>
.range-filter {
    width: 100%;
}

input[type="range"] {
    background-color: white;
}

.price-range {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    margin-top: 1rem;
}

.price-range h5 {
    background-color: white;
    border-radius: 2px;
    color: #fa4251;
    padding: 0.3rem 0.6rem;
}

.price-range p {
    margin-right: 0.2rem;
    font-weight: 600;
}

.range-slider {
    position: relative;
    width: 90%;
    height: 30px;
    text-align: center;
}

.range-slider input {
    pointer-events: none;
    position: absolute;
    overflow: hidden;
    left: 0;
    top: 15px;
    width: 90%;
    outline: none;
    height: 18px;
    margin: 0;
    padding: 0;
}

.range-slider input::-webkit-slider-thumb {
    pointer-events: all;
    position: relative;
    z-index: 1;
    outline: 0;
}

.range-slider input::-moz-range-thumb {
    pointer-events: all;
    position: relative;
    z-index: 10;
    -moz-appearance: none;
    width: 9px;
}

.range-slider input::-moz-range-track {
    position: relative;
    z-index: -1;
    background-color: white;
    border: 0;
}

.range-slider input:last-of-type::-moz-range-track {
    -moz-appearance: none;
    background: none transparent;
    border: 0;
}

.range-slider input[type=range]::-moz-focus-outer {
    border: 0;
}


</style>
