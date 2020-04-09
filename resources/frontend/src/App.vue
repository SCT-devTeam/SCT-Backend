<template>
    <div id="app">
        <MainMenu v-if="isLoggedIn"></MainMenu>
        <transition mode="out-in" name="fade">
            <router-view />
        </transition>
    </div>
</template>

<script>
// @ is an alias to /src
import MainMenu from "./components/Navigations/MainMenu";

export default {
    name: "App",
    components: { MainMenu },
    computed: {
        isLoggedIn: function() {
            return this.$store.getters.isLoggedIn;
        }
    }
};
</script>

<!-- TODO: add auto import of sass files -->
<style lang="scss">
@import "src/scss/normalize.scss";
@import "src/scss/colors";
@import "src/scss/typography";

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
        height: calc(100% - 40px);
        max-height: 100vh;
        width: 100%;
        max-width: 100vw;

        margin: 20px 50px;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition-duration: 200ms;
    transition-property: opacity;
    transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
    opacity: 0;
}
</style>
