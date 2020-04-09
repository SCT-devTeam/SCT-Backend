<template>
    <div id="Customers-table">
        <span id="head">
            <p class="date">Date</p>
            <p class="status">Status</p>
            <p class="customerName">Customer</p>
            <p class="status">Amount</p>
        </span>
        <div id="container">
            <span
                :key="index"
                @click="itemClicked(index)"
                class="line"
                v-for="(writing, index) in this.writings"
            >
                <p class="date">{{ writing.date }}</p>
                <p class="status">{{ writing.status }}</p>
                <p class="customerName">{{ writing.customerName }}</p>
                <p class="amount">{{ writing.amount }}</p>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    customerName: "CustomersTable",
    data() {
        return {
            writings: [
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                },
                {
                    date: "15/03/2020",
                    customerName: "John Doe",
                    amount: "150,00€",
                    status: "Paid"
                }
            ]
        };
    },
    methods: {
        itemClicked: function(writing_id) {
            this.$emit("itemClicked", writing_id);
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
