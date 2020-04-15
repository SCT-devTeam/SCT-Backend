<template>
    <div id="writings">
        <SecondaryMenu
            :items="['Quotes', 'Invoices']"
            @navigationChanged="viewDisplayed = $event"
        ></SecondaryMenu>

        <TableSCT
            class="view__table"
            :columns="[
                { name: 'Date', size: '0.5' },
                { name: 'Customer', size: '1' },
                { name: 'Status', size: '0.7' },
                { name: 'Amount', size: '0.5' }
            ]"
            :data="data"
            :dataPropertyMapping="{
                date: 'Date',
                customer_id: 'Customer',
                status: 'Status',
                amount: ['items', 'price']
            }"
            @itemClicked="selectedWriting = $event"
        ></TableSCT>
        <Writing
            :writingId="selectedWriting"
            :writingType="viewDisplayed.toLowerCase()"
            @close="selectedWriting = null"
            v-if="selectedWriting != null"
        ></Writing>
    </div>
</template>

<script>
import SecondaryMenu from "../components/Navigations/SecondaryMenu";
// import WritingsTable from "../components/Tables/WritingsTable";
import Writing from "../components/modals/Writing";
import TableSCT from "../components/Tables/TableSCT";

export default {
    name: "Writings",
    components: { SecondaryMenu, TableSCT, Writing },
    data() {
        return {
            viewDisplayed: "Quotes",
            selectedWriting: null
        };
    },
    computed: {
        data() {
            // TODO: reconstruct data by replacing customer_id by his fullname
            if (this.viewDisplayed === "Quotes")
                return this.$store.getters.getQuotes;
            else if (this.viewDisplayed === "Invoices")
                return this.$store.getters.getInvoices;
            else
                console.error("An error has occur ed while trying to set data");
            return null;
        }
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
