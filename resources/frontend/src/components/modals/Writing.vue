<template>
    <div class="writing_modal">

    </div>
</template>

<script>
    export default {
        name: "writing",
        props: {
            writingId: Number,
        }
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

    div.writing_modal {
        display: flex;
        justify-content: center;
        align-items: center;

        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;

        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
