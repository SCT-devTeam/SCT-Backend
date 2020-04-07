<template>
    <div id="writings">
        <SecondaryMenu @navigationChanged="viewDisplayed = $event" :items="['Quotes', 'Invoices']"></SecondaryMenu>
        <WritingsTable></WritingsTable>
    </div>
</template>

<script>
    import SecondaryMenu from "../components/Navigations/SecondaryMenu";
    import WritingsTable from "../components/WritingsTable";

    export default {
        name: "Writings",
        components:{ SecondaryMenu, WritingsTable }
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

    div#writings {
        display: flex;
        flex-direction: column;

        nav:first-child {
            margin-bottom: 25px;
        }
    }
</style>
