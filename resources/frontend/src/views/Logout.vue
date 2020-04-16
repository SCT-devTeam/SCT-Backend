<template>
    <div id="logout">
        <button @click="logoutUser">Logout</button>
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
        logoutUser() {
            // TODO: Extract logout in a vuex action & mutation
            // add deletation of the default authorization header of axios : delete axios.defaults.headers.Authorization;
            this.set_token(null);
            this.set_user({});
            this.$router.push({ name: "Login" });
        }
    }
};
</script>

<style lang="scss" scoped></style>
