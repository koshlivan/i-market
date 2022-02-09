<template>
    <div class="line-category">
        <h5>{{ categName }}</h5>
        <div class="inputs" v-show="isEditing">
            <label>New Value:</label>
            <input type="text" v-model="categName">
        </div>
        <div class="actions">
            <button v-show="isEditing" @click="saveClick"><i class="fas fa-save"></i>Save</button>
            <button v-show="isEditing" @click="cancelClick"><i class="fas fa-window-close"></i>cancel edit</button>
            <button @click="editClick"><i class="fas fa-edit"></i>edit</button>
            <button @click="deleteOne"><i class="fas fa-trash-alt"></i>delete</button>
        </div>
        <confirm-window
            v-show="confirmShow"
            @buttonClick="buttonClick($event)"
            :confirm="confirm">

        </confirm-window>
    </div>
</template>

<script>
import ConfirmWindow from "./ConfirmWindow";
export default {
    name: "line-category",
    components: {ConfirmWindow},
    props: [
        'category'
    ],
    data() {
        return {
            isEditing: false,
            categName: this.category.name,
            confirmShow: false,
            confirm: {
                title : 'Delete Category',
                message : 'Are you sure you wanna delete this category?',
                buttons : [
                    {name: 'OK'},
                    {name: 'CANCEL'}
                ]
            }
        }
    },
    computed: {
        categoryName: {
            get() {
                return this.category.name;
            },
            set(value) {
                this.categName = value;
            }
        }
    },
    methods: {
        editClick() {
            this.isEditing = true;
            window.scroll(0, 0);
        },
        saveClick() {
            axios.put('/api/categories/' + this.category.id, {
                name: this.categName
            })
                .then(response => {
                    //this.categName = response.data.name;
                })
            this.isEditing = false;
        },
        cancelClick() {
            this.isEditing = false;
        },
        deleteOne() {
            this.confirmShow = true;
        },
        buttonClick(button) {
            if (button === 'CANCEL') {
                this.confirmShow = false;
                return;
            }
            this.confirmShow = false;
            axios.delete('/api/categories/' + this.category.id)
                .then(response => {
                    this.$emit('deleteOne');
                })
                .catch(errors => {
                    alert(errors.response.data.message);
                })
        }
    }
}
</script>

<style scoped>
.line-category {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: stretch;
    border: solid 2px rgb(156, 156, 156);
}

h5 {
    text-transform: capitalize;
    padding: 0.2rem 3rem;
    border-rigth: solid 1px rgb(156, 156, 156);
}

button {
    text-transform: uppercase;
    width: 8rem;
    height: 100%;
}

i {
    margin-right: 0.2rem;
}

.inputs {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
</style>
