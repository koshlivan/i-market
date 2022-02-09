<template>
    <div class="go-top">
        <button @click="$emit('goToTop')" id="goTop" title="Go to top">
            <i class="fas fa-chevron-up"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "go-to-top",
    emits: [
        'goToTop'
    ],
    created() {
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
        handleScroll(event) {
            if (document.documentElement.scrollTop > 200) {
                document.getElementById("goTop").style.display = "block";
            } else {
                document.getElementById("goTop").style.display = "none";
            }
        },
        topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    }
}
</script>

<style scoped>
.go-top {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 10;
    border: none;
    outline: none;
    background-color: #fa4251;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 2px;
    font-size: 1.5rem; /* Increase font size */
}

.go-top:hover {
    background-color: #ea5261;
}

.go-top:active {
    background-color: #da3241;
    color: darkred;
}
</style>
