<template>
    <div class="container">
        <div class="registration-login">
            <div class="side-menu">
                <side-menu></side-menu>
            </div>
            <div class="reg-part">
                <reg-log-form></reg-log-form>
            </div>
        </div>
    </div>
</template>

<script>
import RegLogForm from "./RegLogForm/RegLogForm";
import SideMenu from "./SideMenu/SideMenu";
export default {
    name: "registration-login",
    components: {SideMenu, RegLogForm}
}
</script>

<style scoped>
.registration-login {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
}
.side-menu {
    width: 28%;
}
.reg-part {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    width: 70%;
}
</style>
