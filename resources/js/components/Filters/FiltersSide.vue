<template>
    <div class="filters-side">
        <h3>Refine search</h3>
        <range-filter :max-price="maxPrice"
                      :min-price="minPrice"></range-filter>
        <preferences></preferences>
    </div>
</template>

<script>
import Navigator from "../Navigator";
import RangeFilter from "./RangeFilter";
import Preferences from "./Preferences";
export default {
    name: "filters-side",
    components: {
        Preferences,
        RangeFilter,
        Navigator
    },
    data() {
        return {
            minPrice: 100,
            maxPrice : 1500,
        }
    }

}
</script>

<style scoped>
.filters-side {

}
h3{
    text-transform: uppercase;
    color: white;
    font-weight: bold;
    margin-top: 1rem;
    border-bottom: solid 2px rgb(66, 66, 66);
}
</style>
