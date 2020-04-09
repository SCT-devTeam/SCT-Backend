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

    body {
        background-color: var(--colors-main);
    }
</style>
