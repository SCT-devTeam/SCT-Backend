<template>
    <div id="dashboard">
        <h1>Welcome to the dashboard "{{ user.email }}"</h1>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            icon="invoice"
            text="invoicies"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="secondary-principal"
            icon="invoice"
            text="overdued invoicies"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="validation-no"
            icon="invoice"
            text="need action"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="validation-no"
            icon="invoice"
            text="disputed"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="active"
            icon="avatar"
            text="customers"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="active"
            icon="avatar"
            text="prospects active"
        ></SimpleDashboardWidget>

        <GraphDashboardWidget
            :indicator="this.default"
            class="widget-graph-1"
            text="growth"
        ></GraphDashboardWidget>

        <GraphDashboardWidget
            :indicator="this.default"
            class="widget-graph-2"
            text="growth"
        ></GraphDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="main"
            icon="avatar"
            text="prospects converted"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            :indicator="this.default"
            class="widget-simple"
            color="active"
            icon="robot"
            text="automatic actions"
        ></SimpleDashboardWidget>
    </div>
</template>

<script>
    // @ is an alias to /src
    import {mapState} from "vuex";
    import SimpleDashboardWidget from "../components/DashboardWidgets/SimpleDashboardWidget";
    import GraphDashboardWidget from "../components/DashboardWidgets/GraphDashboardWidget";

    export default {
        name: "Dashboard",
        data() {
            return {
                default: 0
            };
        },
        components: {SimpleDashboardWidget, GraphDashboardWidget},
        computed: {
            ...mapState(["user"])
        }
    };
</script>

<style lang="scss" scoped>
    div#dashboard {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: 0.25fr repeat(4, 1fr);
        grid-column-gap: 30px;
        grid-row-gap: 30px;

        justify-items: center;

        > h1 {
            display: flex;
            justify-content: center;
            align-items: center;
            grid-area: 1 / 1 / 2 / 5;

            height: 100%;
            width: 100%;

            margin: 0;
        }

        > div.widget-graph-1 {
            grid-column: 3 / 5;
            grid-row: 3 / 5;
        }

        > div.widget-graph-2 {
            grid-column: 1 / 3;
            grid-row: 4 / 6;
        }
    }
</style>
