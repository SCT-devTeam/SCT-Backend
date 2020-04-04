<template>
    <div id="app">
        <MainMenu></MainMenu>
        <router-view />
    </div>
</template>

<script>
    // @ is an alias to /src
    import MainMenu from "@/components/MainMenu";

    export default {
        name: "App",
        components: { MainMenu },
    }
</script>

<!-- TODO: add auto import of sass files -->
<style lang="scss">
    @import "src/sass/normalize.scss";
    @import "src/sass/colors";
    @import "src/sass/typography";
    html,
    body,
    div#app {
        height: 100%;
        max-height: 100vh;
    }
    body {
        margin: 0;
        background-color: $color__background;
    }

    div#app {
        display: flex;

        > nav#Main-menu {

        }
    }
</style>
