<template>
    <div id="Receipt-book">
        <SearchForm></SearchForm>
        <ReceiptTable
            @itemClicked="receiptEditIdforModal = $event"
            class="table"
        ></ReceiptTable>
        <Receipt
            :receiptId="receiptEditIdforModal"
            @close="receiptEditIdforModal = null"
            v-if="receiptEditIdforModal != null"
        ></Receipt>
    </div>
</template>

<script>
import SearchForm from "../components/Forms/SearchForm";
import ReceiptTable from "../components/Tables/ReceiptTable";
import Receipt from "../components/modals/Receipt";

export default {
    name: "ReceiptBook",
    components: { SearchForm, ReceiptTable, Receipt },
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
