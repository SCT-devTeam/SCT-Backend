<template>
    <div id="dashboard">
        <h1>Welcome to the dashboard "{{ user.email }}"</h1>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="invoice"
            :indicator="this.default"
            text="invoicies"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="invoice"
            :indicator="this.default"
            text="overdued invoicies"
            color="secondary-principal"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="invoice"
            :indicator="this.default"
            text="need action"
            color="validation-no"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="invoice"
            :indicator="this.default"
            text="disputed"
            color="validation-no"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="avatar"
            :indicator="this.default"
            text="customers"
            color="active"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="avatar"
            :indicator="this.default"
            text="prospects active"
            color="active"
        ></SimpleDashboardWidget>

        <GraphDashboardWidget
            class="widget-graph-1"
            :indicator="this.default"
            text="growth"
        ></GraphDashboardWidget>

        <GraphDashboardWidget
            class="widget-graph-2"
            :indicator="this.default"
            text="growth"
        ></GraphDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="avatar"
            :indicator="this.default"
            text="prospects converted"
            color="main"
        ></SimpleDashboardWidget>

        <SimpleDashboardWidget
            class="widget-simple"
            icon="robot"
            :indicator="this.default"
            text="automatic actions"
            color="active"
        ></SimpleDashboardWidget>
    </div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import SimpleDashboardWidget from "@/components/SimpleDashboardWidget";
import GraphDashboardWidget from "@/components/GraphDashboardWidget";

export default {
    name: "Dashboard",
    data() {
        return {
            default: 0,
        }
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
