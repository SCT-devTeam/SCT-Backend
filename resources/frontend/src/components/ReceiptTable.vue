<template>
    <div id="Customers-table">
        <span id="head">
            <p class="date">Date</p>
            <p class="label">Entity</p>
            <p class="entity">Label</p>
            <p class="amount">Amount</p>
        </span>
        <div id="container">
            <span class="line" v-for="(receipt, index) in this.receipts" :key="index" @click="itemClicked(index)">
                <p class="date">{{receipt.date}}</p>
                <p class="label">{{receipt.entity}}</p>
                <p class="entity">{{receipt.label}}</p>
                <p class="amount">{{receipt.amount}}</p>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        entity: "CustomersTable",
        data() {
            return {
                receipts: [
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                    {date: '15/03/2020', entity: 'John Doe', amount: '150,00€', label: '------'},
                ]
            }
        },
        methods: {
            itemClicked: function (receipt_id) {
                this.$emit('itemClicked', receipt_id);
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";
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
                font-size: 2em;
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
                    font-size: 1em;
                }
            }
        }
    }
</style>
