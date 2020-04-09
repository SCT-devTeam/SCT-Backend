<template>
    <div id="writings">
        <SecondaryMenu
            @navigationChanged="viewDisplayed = $event"
            :items="['Quotes', 'Invoices']"
        ></SecondaryMenu>
        <WritingsTable
            @itemClicked="writingEditIdforModal = $event"
        ></WritingsTable>
        <Writing
            v-if="writingEditIdforModal"
            :writingId="writingEditIdforModal"
            @close="writingEditIdforModal = null"
        ></Writing>
    </div>
</template>

<script>
import SecondaryMenu from "../components/Navigations/SecondaryMenu";
import WritingsTable from "../components/WritingsTable";
import Writing from "../components/modals/Writing";

export default {
    name: "Writings",
    components: { SecondaryMenu, WritingsTable, Writing },
    data() {
        return {
            writingEditIdforModal: null
        };
    }
};
</script>

<style scoped lang="scss">
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
