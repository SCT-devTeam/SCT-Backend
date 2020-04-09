<template>
    <div id="Login">
        <h1>Login</h1>

        <form @submit.prevent="updateUser">
            <input placeholder="username" type="text" v-model="username"/>
        </form>
    </div>
</template>

<script>
    // @ is an alias to /src

    import {mapMutations} from "vuex";
    import store from "../store/index";

    export default {
        name: "Login",
        data() {
            return {
                username: ""
            };
        },
        methods: {
            ...mapMutations(["UPDATE_CURRENT_USER"]),
            updateUser: function () {
                this.UPDATE_CURRENT_USER({
                    name: this.username
                });
                this.username = "";
                console.log("[STATE] user = " + JSON.stringify(store.state.user));
                console.log("[STATE] isLoggedIn = " + store.getters.isLoggedIn);
                this.$router.replace({name: "Dashboard"});
            }
        }
    };
</script>

<style lang="scss" scoped></style>
