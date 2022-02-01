<template>
    <div class="side-menu-holder">
        <h3>top category</h3>
        <a v-for="(category, index) in categories"
           :key="index"
           href="#" @click.prevent="chooseCategory(category.id)"
            :title="category.name">{{category.name}}</a>
        <slot></slot>
        <a href="#">
            <img src="/assets/SideMenu/side.jpg" alt="">
        </a>
    </div>
</template>

<script>
export default {
    name: "side-menu",
    emits: [
      'categoryClicked'
    ],
    data(){
        return {
            categories: []
        }
    },
    created() {
        axios.get('/api/categories')
            .then(response => {
                this.categories = response.data;
            })
    },
    methods: {
        chooseCategory(id) {
            if (this.$route.name !== 'shop') {
                this.$router.push({name: 'shop'});
            }
            this.$emit('categoryClicked', id);
        }
    }

}
</script>

<style scoped>
.side-menu-holder {
    margin: 2rem 0.5rem;
    padding: 0.5rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: stretch;
    width: 100%;
}
h3 {
    text-transform: uppercase;
    font-weight: bolder;
    color: white;
    border-bottom: solid 2px rgb(66, 66, 66);
}
a {
    text-transform: capitalize;
    text-decoration: none;
    color: rgb(156, 156, 156);
    padding-top: 0.5rem;
    padding-bottom: 0.2rem;
    border-bottom: dotted 1px rgb(66, 66, 66);
}
a:hover {
    cursor: pointer;
    color: #e53a53;
}
a:active {
    color: #790b30;
}
img {
    max-width: 100%;
    margin: 0.5rem 0;
}
</style>
