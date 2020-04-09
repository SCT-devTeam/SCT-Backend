<template>
    <div id="Receipt-book">
        <SearchForm></SearchForm>
        <ReceiptTable
            class="table"
            @itemClicked="receiptEditIdforModal = $event"
        ></ReceiptTable>
        <Receipt
            v-if="receiptEditIdforModal"
            :writingId="receiptEditIdforModal"
            @close="receiptEditIdforModal = null"
        ></Receipt>
    </div>
</template>

<script>
import SearchForm from "../components/Forms/SearchForm";
import ReceiptTable from "../components/ReceiptTable";
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

<style scoped lang="scss">
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
