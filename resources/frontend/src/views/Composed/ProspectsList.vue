<template>
    <div id="prospect-list">
        <div id="panel-1">
            <SearchForm id="Search-form"></SearchForm>
            <CustomersTable></CustomersTable>
        </div>
        <div id="panel-2">
            <div id="panel-2__container">
                <CustomerProfileCard @displayContact="contactToDisplay = $event"></CustomerProfileCard>
                <ContactProfileCard v-if="this.contactToDisplay != null" class="panel-2__container__contact"></ContactProfileCard>
            </div>
        </div>
    </div>
</template>

<script>
    import SearchForm from "../../components/Forms/SearchForm";
    import CustomersTable from "../../components/CustomersTable";
    import CustomerProfileCard from "../../components/CustomerProfileCard";
    import ContactProfileCard from  "../../components/ContactProfileCard";

    export default {
        name: "ProspectsList",
        components: { SearchForm, CustomersTable, CustomerProfileCard, ContactProfileCard },
        data() {
            return {
                contactToDisplay: null,
            }
        }
    }
</script>

<style scoped lang="scss">
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
                    top: 0;
                    right: 0;
                    bottom: 0;
                    z-index: 2;
                }
            }
        }
    }
</style>
