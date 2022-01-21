<template>
    <div class="reviews-the">
        <div class="cap-options">
            <h5 @click="overviewBut"
                :class="{active : overviewActive, inactive : !overviewActive}">
                overview
            </h5>
            <h5 @click="reviewsBut"
                :class="{active : reviewsActive, inactive : !reviewsActive}">
                {{'reviews ('+product.reviews.length+')'}}
            </h5>
            <h5 @click="solutionBut"
                :class="{active : solutionActive, inactive : !solutionActive}">
                solution
            </h5>
        </div>
        <div class="option-content">
            <div class="overview" v-show="overviewActive">
                <p>CLorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Ut lobortis malesuada mi id tristique. Sed ipsum nisi, dapibus
                    at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus,
                    justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper
                    diam ipsum vel tellus.</p>
            </div>
            <div class="reviews" v-show="reviewsActive">
                <leave-review></leave-review>
            </div>
            <div class="solution" v-show="solutionActive">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id tristique.
                    Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus,
                    justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper diam ipsum vel
                    tellus.applied clearfix to the tab-content to rid of the gap between the tab and the content
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import LeaveReview from "./LeaveReview";
export default {
    name: "reviews-the",
    components: {LeaveReview},
    props: [
        'product'
    ],
    data() {
        return {
            overviewActive: true,
            reviewsActive: false,
            solutionActive: false
        }
    },
    methods: {
        overviewBut() {
            this.overviewActive = true;
            this.reviewsActive =  false;
            this.solutionActive = false;
        },
        reviewsBut() {
            this.overviewActive = false;
            this.reviewsActive =  true;
            this.solutionActive = false;
        },
        solutionBut() {
            this.overviewActive = false;
            this.reviewsActive =  false;
            this.solutionActive = true;
        }
    }
}
</script>

<style scoped>
.reviews-the {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
}
.cap-options {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    margin: 2rem 0;
    border-bottom: solid 2px rgb(200, 200, 200);
}
.cap-options h5 {
    text-transform: capitalize;
    padding: 0.6rem 1rem;
    margin: 0;
}
.cap-options h5:hover {
    cursor: default;
}
.active {
    background-color: rgb(200, 200, 200);
    color: rgb(66, 66, 66);
}
.inactive {
    color: white;
}
</style>
