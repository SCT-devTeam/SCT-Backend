<template>
    <div class="writing_modal">
        <span @click="exit" class="background"></span>
        <div class="writing_modal__invoice" ref="invoice">
            <label>
                <input
                    class="invoice__company"
                    type="text"
                    v-model="invoice.company"
                />
            </label>
            <label>
                <input
                    class="invoice__customer"
                    type="text"
                    v-model="invoice.customer"
                />
            </label>
            <div class="invoice__items-table">
                <span class="table__head">
                    <p class="label">Label</p>
                    <p class="quantity">Quantity</p>
                    <p class="price">Price</p>
                </span>
                <span
                    :key="index"
                    class="table__item"
                    v-for="(item, index) in invoice.items"
                >
                    <label>
                        <input class="label" type="text" v-model="item.label" />
                    </label>
                    <label>
                        <input
                            class="quantity"
                            type="number"
                            v-model="item.quantity"
                        />
                    </label>
                    <label>
                        <input
                            class="price"
                            type="number"
                            v-model="item.price"
                        />
                    </label>
                </span>
            </div>
            <p class="total">{{ this.total }}</p>
        </div>
        <div></div>
    </div>
</template>

<script>
export default {
    name: "writing",
    data() {
        return {
            invoice: {
                company: "Company",
                customer: "Customer",
                items: [
                    {
                        label: "item label",
                        quantity: 1,
                        price: 10
                    },
                    {
                        label: "item label",
                        quantity: 3,
                        price: 30
                    }
                ]
            }
        };
    },
    props: {
        writingId: Number
    },
    computed: {
        total() {
            let total = 0;
            for (let itemIndex in this.invoice.items) {
                total += Number(this.invoice.items[itemIndex].price);
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

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div.writing_modal {
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

    > div.writing_modal__invoice {
        display: flex;
        flex-direction: column;

        min-height: 90%;
        height: fit-content;
        width: 50%;

        border-radius: 15px;

        background-color: white;

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);

        > input.invoice__company {
            max-width: 35%;

            margin: 50px;
            padding: 7px;

            border-radius: 15px;

            background-color: #ececec;

            white-space: pre-line;
        }

        > input.invoice__customer {
            align-self: flex-end;

            max-width: 35%;

            margin: 50px;
            padding: 7px;

            border-radius: 15px;

            background-color: #ececec;

            white-space: pre-line;
        }

        > div.invoice__items-table {
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
                        font-size: 1.2rem;
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
