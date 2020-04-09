<template>
    <div id="writings">
        <SecondaryMenu
            :items="['Quotes', 'Invoices']"
            @navigationChanged="viewDisplayed = $event"
        ></SecondaryMenu>
        <WritingsTable
            @itemClicked="writingEditIdforModal = $event"
        ></WritingsTable>
        <Writing
            :writingId="writingEditIdforModal"
            @close="writingEditIdforModal = null"
            v-if="writingEditIdforModal"
        ></Writing>
    </div>
</template>

<script>
    import SecondaryMenu from "../components/Navigations/SecondaryMenu";
    import WritingsTable from "../components/WritingsTable";
    import Writing from "../components/modals/Writing";

    export default {
        name: "Writings",
        components: {SecondaryMenu, WritingsTable, Writing},
        data() {
            return {
                writingEditIdforModal: null
            };
        }
    };
</script>

<style lang="scss" scoped>
    @import "src/scss/colors";
    @import "src/scss/typography";

    div#writings {
        display: flex;
        flex-direction: column;

        nav:first-child {
            margin-bottom: 25px;
        }
    }
</style>
