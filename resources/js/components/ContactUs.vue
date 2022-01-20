<template>
    <div class="container">
        <div class="wrapper">
            <div class="side-menu">
                <side-menu></side-menu>
            </div>
            <div class="contact-us">
                <contact-component></contact-component>
            </div>
        </div>
    </div>
</template>

<script>
import SideMenu from "./SideMenu/SideMenu";
import ContactComponent from "./ContactsComponent/ContactComponent";
export default {
    name: "contact-us",
    components: {
        ContactComponent,
        SideMenu
    }
}
</script>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 1.5rem;
    min-width: 70%;
}
.side-menu {
    width: 28%;
}
.contact-us {
    width: 70%;
}
</style>
