<template>
    <div id="Receipt-book">
        <SearchForm class="search-form"></SearchForm>

        <TableSCT
            :columns="[
                { name: 'date', size: '1' },
                { name: 'company', size: '1' },
                { name: 'amount', size: '1' }
            ]"
            :data="this.$store.state.receipts"
            :dataPropertyMapping="{
                company: 'company',
                date: 'date',
                amount: ['items', 'price']
            }"
            @itemClicked="receiptForModal = $event"
        ></TableSCT>
        <Receipt
            :receiptId="receiptForModal"
            @close="receiptForModal = null"
            v-if="receiptForModal != null"
        ></Receipt>
    </div>
</template>

<script>
import SearchForm from "../components/Forms/SearchForm";
import Receipt from "../components/modals/Receipt";
import TableSCT from "../components/Tables/Table";

export default {
    name: "ReceiptBook",
    components: { SearchForm, Receipt, TableSCT },
    data() {
        return {
            receiptForModal: null
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

    > form.search-form {
        margin-bottom: 50px;
    }

    > div.table {
        height: 100%;
        width: 100%;
    }
}
</style>
