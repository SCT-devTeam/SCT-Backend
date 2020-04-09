<template>
    <div class="receipt_modal">
        <span class="background" @click="exit"></span>
        <div class="receipt_modal__receipt" ref="receipt">
            <input
                class="receipt__company"
                v-model="receipt.company"
                type="text"
            />
            <div class="receipt__items-table">
                <span class="table__head">
                    <p class="label">Label</p>
                    <p class="quantity">Quantity</p>
                    <p class="price">Price</p>
                </span>
                <span
                    class="table__item"
                    v-for="(item, index) in receipt.items"
                    :key="index"
                >
                    <input class="label" v-model="item.label" type="text" />
                    <input
                        class="quantity"
                        v-model="item.quantity"
                        type="number"
                    />
                    <input class="price" v-model="item.price" type="number" />
                </span>
            </div>
            <p class="total">{{ this.total }}</p>
        </div>
        <div></div>
    </div>
</template>

<script>
export default {
    // TODO: add TVA pourcentage
    name: "receipt",
    data() {
        return {
            receipt: {
                company: "Company",
                customer: "Customer",
                items: [
                    {
                        id: 0,
                        label: "item label",
                        quantity: 1,
                        price: 10
                    },
                    {
                        id: 1,
                        label: "item label",
                        quantity: 3,
                        price: 30
                    }
                ]
            }
        };
    },
    props: {
        receiptId: Number
    },
    computed: {
        total() {
            let total = 0;
            for (let itemIndex in this.receipt.items) {
                total += Number(this.receipt.items[itemIndex].price);
            }
            return total;
        }
    },
    methods: {
        exit() {
            this.save();
            this.$emit("close");
        },
        save() {
            // TODO: API request
        }
    }
};
</script>

<style scoped lang="scss">
@import "src/sass/colors";
@import "src/sass/typography";

div.receipt_modal {
    display: flex;
    justify-content: center;

    padding: 20px 0;

    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 10;

    overflow-y: scroll;

    > span.background {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 17px;
        z-index: -1;

        background-color: rgba(0, 0, 0, 0.5);
    }
    > div.receipt_modal__receipt {
        display: flex;
        flex-direction: column;

        min-height: 90%;
        height: fit-content;
        width: 50%;

        border-radius: 15px;

        background-color: white;

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);

        > input.receipt__company {
            max-width: 35%;

            margin: 50px;
            padding: 7px;

            border-radius: 15px;

            background-color: #ececec;

            white-space: pre-line;
        }

        > input.receipt__customer {
            align-self: flex-end;

            max-width: 35%;

            margin: 50px;
            padding: 7px;

            border-radius: 15px;

            background-color: #ececec;

            white-space: pre-line;
        }

        > div.receipt__items-table {
            display: flex;
            flex-direction: column;
            justify-content: stretch;

            align-self: center;
            justify-self: center;

            width: 90%;

            border-radius: 20px 20px 15px 15px;

            background-color: #fafafa;

            > span {
                display: flex;
                justify-content: space-around;

                padding: 5px 25px;

                > p.label,
                > input.label {
                    flex: 5;
                }

                > p.quantity,
                > input.quantity {
                    flex: 0.7;
                    text-align: center;
                }

                > p.price,
                > input.price {
                    flex: 0.7;
                    text-align: right;
                }

                &.table__head {
                    border-radius: 15px 15px 0 0;

                    background-color: $color__main;

                    > p {
                        margin: 5px 0;

                        font-family: $font__heading;
                        font-weight: bold;
                        font-size: 1.2em;
                    }
                }

                &.table__item {
                    margin-bottom: 10px;
                    background-color: #ececec80;

                    &:last-child {
                        margin-bottom: 0;
                        border-radius: 0 0 15px 15px;
                    }
                }
            }
        }

        > p.total {
            align-self: flex-end;
            margin-right: 50px;
            padding: 7px;

            border: 2px solid $color__secondary;
            border-radius: 20px;

            background-color: #ececec;
        }

        > p.notice {
            justify-self: flex-end;
            align-self: center;

            padding: 10px;

            border-radius: 20px;
            background-color: #ececec;
        }
    }
}
</style>
