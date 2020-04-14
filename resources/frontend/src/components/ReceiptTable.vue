<template>
    <div id="Customers-table">
        <span id="head">
            <p class="date">Date</p>
            <p class="label">Entity</p>
            <p class="company">Label</p>
            <p class="amount">Amount</p>
        </span>
        <div id="container">
            <span
                :key="index"
                @click="$emit('itemClicked', index)"
                class="line"
                v-for="(receipt, index) in this.receipts"
            >
                <p class="date">{{ receipt.date }}</p>
                <p class="label">{{ receipt.company }}</p>
                <p class="company">{{ receipt.label }}</p>
                <p class="amount">{{ receipt.amount }}</p>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "CustomersTable",
    computed: {
        receipts() {
            return this.$store.state.receipts;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div#Customers-table {
    display: flex;
    flex-direction: column;

    position: relative;

    max-height: calc(100% - 130px);

    padding-top: 60px;

    border-radius: 15px;

    background: #fff;

    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);

    span {
        display: flex;
        align-items: center;

        max-width: 100%;

        margin-bottom: 10px;
        padding: 0 5%;

        background-color: #ececec80;

        > p {
            flex: 1;
        }
    }

    > span#head {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;

        height: 60px;

        border-radius: 15px 15px 0 0;

        background: $color__main;

        > p {
            font-family: $font__heading;
            font-size: 2rem;
        }
    }

    > div#container {
        overflow-y: scroll;

        scrollbar-color: $color__inactive_subtitle;
        scrollbar-width: 10px;

        &::-webkit-scrollbar {
            width: 10px;
        }

        &::-webkit-scrollbar-thumb {
            border-radius: 5px;

            background-color: $color__inactive_subtitle;
        }

        &::-webkit-scrollbar-track {
            border-radius: 5px;

            background-color: #{$color__inactive_subtitle}49;
        }

        > span.line {
            height: 50px;

            padding-right: calc(5% - 10px);

            cursor: pointer;

            > p {
                font-family: $font__text;
                font-size: 1rem;
            }
        }
    }
}
</style>
