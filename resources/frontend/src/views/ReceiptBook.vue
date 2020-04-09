<template>
    <div id="Receipt-book">
        <SearchForm></SearchForm>
        <ReceiptTable
            @itemClicked="receiptEditIdforModal = $event"
            class="table"
        ></ReceiptTable>
        <Receipt
            :writingId="receiptEditIdforModal"
            @close="receiptEditIdforModal = null"
            v-if="receiptEditIdforModal"
        ></Receipt>
    </div>
</template>

<script>
    import SearchForm from "../components/Forms/SearchForm";
    import ReceiptTable from "../components/ReceiptTable";
    import Receipt from "../components/modals/Receipt";

    export default {
        name: "ReceiptBook",
        components: {SearchForm, ReceiptTable, Receipt},
        data() {
            return {
                receiptEditIdforModal: null
            };
        }
    };
</script>

<style lang="scss" scoped>
    @import "src/scss/typography";
    @import "src/scss/colors";

    div#Receipt-book {
        display: flex;
        flex-direction: column;

        align-items: center;

        > div.table {
            width: 100%;
        }
    }
</style>
