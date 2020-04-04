<template>
    <div id="app">
        <router-view />
        <!-- <router-link to="/---">---</router-link> -->
    </div>
</template>

<script></script>

<!-- TODO: add auto import of sass files -->
<style lang="scss">
@import "src/sass/colors";
@import "src/sass/typography";
body {
    background-color: $color__background;
}
</style>
