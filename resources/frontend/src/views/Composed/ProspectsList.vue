<template>
    <div id="prospect-list">
        <div id="panel-1">
            <SearchForm id="Search-form"></SearchForm>
            <CustomersTable
                :data="this.$store.state.customers"
                statusFilter="prospect"
                @itemClicked="customerToDisplay = $event"
            ></CustomersTable>
        </div>
        <div id="panel-2">
            <div id="panel-2__container">
                <CustomerProfileCard
                    :customerId="customerToDisplay"
                    @displayContact="contactToDisplay = $event"
                ></CustomerProfileCard>
                <ContactProfileCard
                    class="panel-2__container__contact"
                    v-if="this.contactToDisplay != null"
                ></ContactProfileCard>
                <span
                    @click="contactToDisplay = null"
                    id="panel-2__container__contact__back"
                    v-if="this.contactToDisplay != null"
                ></span>
            </div>
        </div>
    </div>
</template>

<script>
import SearchForm from "../../components/Forms/SearchForm";
import CustomersTable from "../../components/Tables/CustomersTable";
import CustomerProfileCard from "../../components/CustomerProfileCard";
import ContactProfileCard from "../../components/ContactProfileCard";

export default {
    name: "ProspectsList",
    components: {
        SearchForm,
        CustomersTable,
        CustomerProfileCard,
        ContactProfileCard
    },
    data() {
        return {
            customerToDisplay: null,
            contactToDisplay: null
        };
    }
};
</script>

<style lang="scss" scoped>
div#prospect-list {
    display: flex;
    height: 100%;
    width: 100%;

    > div#panel-1 {
        flex: 2;
        display: flex;
        flex-direction: column;
        align-items: center;

        height: 100%;

        > form#Search-form {
            width: 60%;

            margin-left: 20%;
            margin-bottom: 20px;
        }

        > div#Customers-table {
            width: 100%;
        }
    }

    > div#panel-2 {
        flex: 1;
        display: flex;
        justify-content: center;

        > div#panel-2__container {
            display: flex;
            justify-content: center;

            position: relative;

            width: 60%;

            padding: 5px;

            overflow: hidden;

            > div.panel-2__container__contact {
                position: absolute;
                top: 5px;
                right: 5px;
                left: 20px;
                bottom: 5px;
                z-index: 2;
            }

            > span#panel-2__container__contact__back {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;

                width: 19px;

                background-color: rgba(0, 0, 0, 0.5);

                cursor: pointer;
            }
        }
    }
}
</style>
