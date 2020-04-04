<template>
    <div id="Login">
        <LoginForm></LoginForm>
    </div>
</template>

<script>
// @ is an alias to /src
import LoginForm from "@/components/LoginForm";

/* eslint-disable */
export default {
    name: "Login",
    components: { LoginForm },
};
</script>

<style lang="scss" scoped>
    @import "src/sass/colors";
    @import "src/sass/typography";
    body {
        background-color: var(--colors-main);
    }
</style>
