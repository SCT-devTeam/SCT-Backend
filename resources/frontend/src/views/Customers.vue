<template>
    <div id="customers">
        <SecondaryMenu
            :items="['Prospects', 'Customers']"
            @navigationChanged="viewDisplayed = $event"
        ></SecondaryMenu>
        <div id="customers__view">
            <TableSCT
                class="view__table"
                :columns="[
                    { name: 'Type', size: '0.7' },
                    { name: 'Name', size: '0.7' },
                    { name: 'Address', size: '1' },
                    { name: 'Status', size: '0.7' }
                ]"
                :data="data"
                :dataPropertyMapping="{
                    customer_type: 'Type',
                    lastname: 'Name',
                    street_name: 'Address',
                    status: 'Status'
                }"
                @itemClicked="currentCustomerID = $event"
            ></TableSCT>
            <CustomerProfileCard
                class="view__card"
                v-if="currentCustomerID != null"
                :customer-id="currentCustomerID"
            ></CustomerProfileCard>
        </div>
    </div>
</template>

<script>
import SecondaryMenu from "../components/Navigations/SecondaryMenu";
import TableSCT from "../components/Tables/TableSCT";
import CustomerProfileCard from "../components/CustomerProfileCard";

export default {
    name: "Customers",
    components: { SecondaryMenu, TableSCT, CustomerProfileCard },
    data() {
        return {
            viewDisplayed: "Prospects",
            currentCustomerID: null
        };
    },
    computed: {
        data() {
            if (this.viewDisplayed === "Prospects")
                return this.$store.getters.getProspects;
            else if (this.viewDisplayed === "Customers")
                return this.$store.getters.getCustomers;
            else
                console.error("An error has occur ed while trying to set data");
            return null;
        }
    }
};
</script>

<style lang="scss" scoped>
div#customers {
    display: flex;
    flex-direction: column;
    align-items: stretch;

    > div#customers__view {
        display: flex;

        height: calc(100% - 70px);
        padding-top: 30px;

        > .view__table {
            margin-right: 50px;
        }
    }
}
</style>
