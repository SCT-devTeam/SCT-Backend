<template>
    <div id="logout">
        <button v-on:click="logoutUser">Logout</button>
    </div>
</template>

<script>
    import {mapMutations} from "vuex";

    export default {
        name: "Logout",
        methods: {
            ...mapMutations(["LOGOUT_USER"]),
            logoutUser: function () {
                this.LOGOUT_USER();
                this.$router.push({name: "Login"});
            }
        }
    };
</script>

<style scoped></style>
