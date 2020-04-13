<template>
    <div id="Login">
        <LoginForm></LoginForm>
    </div>
</template>

<script>
// @ is an alias to /src
import LoginForm from "../components/Forms/LoginForm";

/* eslint-disable */
    export default {
        name: "Login",
        components: {LoginForm},
    };
</script>

<style lang="scss" scoped>
    @import "src/scss/colors";
    @import "src/scss/typography";

    div#Login {
        display: flex;
        justify-content: flex-end;
        align-items: center;

        height: 100vh;

        margin: 0;
        padding-right: 10%;

        /* TODO: Add lazy loading to background */
        /* TODO: replace the link by api call to get author etc.. */
        background-color: $color__background;
        background-image: url("https://source.unsplash.com/collection/9893419");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
