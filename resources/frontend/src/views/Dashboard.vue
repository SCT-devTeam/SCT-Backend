<template>
    <div class="dashboard">
        <h1>Welcome to the dashboard {{ user.name }}</h1>
    </div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";

export default {
    name: "Dashboard",
    computed: {
        ...mapState(["user"])
        // other
    }
};
</script>

<style lang="scss" scoped></style>
