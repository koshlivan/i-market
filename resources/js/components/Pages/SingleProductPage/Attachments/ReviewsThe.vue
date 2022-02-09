<template>
    <div class="reviews-the">
        <div class="cap-options">
            <h5 @click="overviewBut"
                :class="{active : overviewActive, inactive : !overviewActive}">
                overview
            </h5>
            <h5 @click="reviewsBut"
                :class="{active : reviewsActive, inactive : !reviewsActive}">
                {{ 'reviews (' + reviewCount + ')' }}
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
                <div v-for="(comment, index) in comments" :key="index" class="oneComment">
                    <h5>{{ comment.reviewer }}</h5>
                    <p>{{ comment.review }}</p>
                    <stars-rating :rating="comment.rating"></stars-rating>
                </div>
            </div>
            <div class="reviews" v-show="reviewsActive">
                <leave-review :product_id="product.id" @reviewLeaved="reviewLeaved($event)"></leave-review>
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
import StarsRating from "../../../Common/Rating/StarsRating";

export default {
    name: "reviews-the",
    components: {StarsRating, LeaveReview},
    props: [
        'product'
    ],
    data() {
        return {
            overviewActive: true,
            reviewsActive: false,
            solutionActive: false,
            comments: [],
        }
    },
    computed: {
        reviewCount() {
            return this.comments.length;
        }
    },
    created() {
        this.getReviews()
    },
    methods: {
        overviewBut() {
            this.overviewActive = true;
            this.reviewsActive = false;
            this.solutionActive = false;
        },
        reviewsBut() {
            this.overviewActive = false;
            this.reviewsActive = true;
            this.solutionActive = false;
        },
        solutionBut() {
            this.overviewActive = false;
            this.reviewsActive = false;
            this.solutionActive = true;
        },
        getReviews() {
            axios.get('/api/reviews?product_id=' + this.product.id)
                .then(response => {
                    this.comments = response.data;
                })
        },
        reviewLeaved(review) {
            this.comments.push(review);
            this.overviewBut();
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

.oneComment {
    margin-top: 0.5rem;
    border-left: dotted 1px #aaa;
    padding-left: 0.5rem;
}

.oneComment h5 {
    text-transform: uppercase;
    color: #ccc;
}

.oneComment p {
    text-transform: capitalize;
}
</style>
