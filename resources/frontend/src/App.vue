<template>
    <div id="app">
        <MainMenu v-if="isLoggedIn"></MainMenu>
        <router-view />
    </div>
</template>

<script>
    // @ is an alias to /src
    import MainMenu from "@/components/MainMenu";
    import { mapGetters } from "vuex";

    export default {
        name: "App",
        components: { MainMenu },
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn;
            }
        },
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

        > div {
            height: 100%;
            width: 100%;

            margin-left: 50px;
        }
    }
</style>
