<template>
    <div id="logout">
        <button v-on:click="logoutUser">Logout</button>
    </div>
</template>

<script>
import { mapMutations } from "vuex";

export default {
    name: "Logout",
    methods: {
        ...mapMutations({
            set_token: "SET_TOKEN",
            set_user: "SET_USER"
        }),
        logoutUser: function() {
            this.set_token(null);
            this.set_user(null);
            this.$router.push({ name: "Login" });
        }
    }
};
</script>

<style scoped></style>
