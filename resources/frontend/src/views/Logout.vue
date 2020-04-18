<template>
    <div id="logout">
        <button @click="logoutUser">Logout</button>
    </div>
</template>

<script>
import { mapActions } from "vuex";
// TODO: replace this all view to directly logout action
export default {
    name: "Logout",
    methods: {
        ...mapActions({ logout: "logoutUser" }),
        logoutUser() {
            this.logout().then(() => {
                this.$router.push({ name: "Login" });
            });
        }
    }
};
</script>

<style lang="scss" scoped></style>
