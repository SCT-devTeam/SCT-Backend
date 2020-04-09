<template>
    <div id="customers">
        <SecondaryMenu @navigationChanged="viewDisplayed = $event" :items="['Prospects', 'Customers']"></SecondaryMenu>
        <div id="customers__view">
            <ProspectsList v-if="this.viewDisplayed === 'Prospects'"></ProspectsList>
            <CustomersList v-if="this.viewDisplayed === 'Customers'"></CustomersList>
        </div>
    </div>
</template>

<script>
    import SecondaryMenu from "../components/Navigations/SecondaryMenu"
    import ProspectsList from "./Composed/ProspectsList";
    import CustomersList from "./Composed/CustomersList";

    export default {
        name: "Customers",
        components: {SecondaryMenu, ProspectsList, CustomersList},
        data() {
            return {
                viewDisplayed: 'Prospects',
            }
        }
    }
</script>

<style scoped lang="scss">
    div#customers {
        display: flex;
        flex-direction: column;
        align-items: stretch;

        > div#customers__view {
            display: flex;

            height: calc(100% - 70px);
            padding-top: 30px;
        }
    }
</style>
