<template>
        <div class="holder">
            <img :src="singleNew.image" alt="">
            <div class="news-date">
                <h3>{{singleNew.day}}</h3>
                <p>{{singleNew.month}}</p>
            </div>
            <h3 class="news-header">{{singleNew.header}}</h3>
            <p class="news-description">{{singleNew.description}}</p>
            <div class="news-footer">
                <a>{{singleNew.comments+' Comments'}}</a>
                <a><span class="material-icons">read_more</span> read more</a>
            </div>
        </div>
</template>

<script>
export default {
    name: "news-card",
    props: [
        'singleNew'
    ],
}
</script>

<style scoped>
    .holder {
        width: 48%;
        height: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: stretch;
    }
    .news-date {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background-color: white;
        width: 4rem;
        height: 5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .news-date h3{
        color: black;
        text-align: center;
    }
    .news-date p{
        color: red;
        text-transform: uppercase;
        text-align: center;
    }
    .news-header {
        color: white;
        text-transform: uppercase;
        text-align: left;
    }
    .news-description {
        color: rgb(156, 156, 156);
        text-transform: capitalize;
        text-align: left;
    }
    .news-footer {
        border-top: dashed 1px rgb(156, 156, 156);
        margin-top: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
    }
    .news-footer a{
        color: rgb(156, 156, 156);
        margin-top: 1rem;
        text-decoration: none;
    }
    .news-footer a:hover{
        cursor: pointer;
        color: #e53a53;
    }
    .news-footer a span{
        vertical-align: middle;
    }
    img {
        width: 100%;
    }
</style>
