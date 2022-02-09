<template>
    <div class="confirm-window">
        <div class="show">
            <div class="title">
                <h3>{{confirm.title}}</h3>
            </div>
            <div class="message">
                <p>{{confirm.message}}</p>
            </div>
            <div class="buttons">
                <button
                    v-for="(button, index) in confirm.buttons"
                    :key="index" @click="$emit('buttonClick', button.name)">
                    {{ button.name }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "confirm-window",
    props: [
        'confirm'
    ],
    emits: [
        'buttonClick'
    ]
}
</script>

<style scoped>
    .confirm-window{
        position: fixed;
        background-color: rgba(128, 128, 128, 0.8);
        width: 100vw;
        height: 100vh;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }
    .show {
        padding: 1rem;
       background-color: white;
        width: 20%;
        color: black;
        text-transform: capitalize;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: stretch;
    }
    .title h3{
        text-align: center;
        text-transform: uppercase;
        border-bottom: 1px solid #aaa;
    }
    .buttons {
        margin-top: 0.2rem;
        border-top: 1px solid #aaa;
        display: flex;
        justify-content: space-between;
    }
    .buttons button {
        background-color: white;
        padding: 0.5rem 1rem;
        color: black;
        text-transform: uppercase;
        border: none;
        border-radius: 3px;
        margin: 0.2rem;
    }
    .buttons button:hover {
        cursor: pointer;
        background-color: #ea2473;
        color: white;
    }
    .buttons button:active {
        background-color: #842e50;
    }
</style>
