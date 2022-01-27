<template>
    <div class="container">
        <navigator>latest news</navigator>
        <div class="news-holder">
            <news-card v-for="(singleNew, index) in news"
                       :key="index"
                       :single-new="singleNew"></news-card>
        </div>
    </div>
</template>

<script>
import Navigator from "../Navigator";
import NewsCard from "./NewsCard";
export default {
    name: "latest-news",
    components: {NewsCard, Navigator},
    data(){
        return {
            news: [
                {image : 'assets/News/rich.jpg',
                    day : '13',
                    month : 'aug',
                    header : '15-old girl get her first billion with doing nothing!',
                    description: 'go ahead by link and get your own million',
                    comments: '0'
                },
                {image : 'assets/News/pugacheva.png',
                    day : '25',
                    month : 'sep',
                    header : 'Alla pugacheva is pregnant again!',
                    description: 'go ahead by link and see who is father of her child',
                    comments: '0'
                },
            ]
        }
    }
}
</script>

<style scoped>
    .news-holder {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: stretch;
        flex-wrap: nowrap;
        margin-top: 1rem;
    }
</style>
