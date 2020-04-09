<template>
    <div id="logout">
        <button @click="logoutUser">Logout</button>
    </div>
</template>

<script>
    import {mapMutations} from "vuex";

    export default {
        name: "Logout",
        methods: {
            ...mapMutations({
                set_token: "SET_TOKEN",
                set_user: "SET_USER"
            }),
            logoutUser() {
                this.set_token(null);
                this.set_user({});
                this.$router.push({name: "Login"});
            }
        }
    };
</script>

<style lang="scss" scoped></style>
