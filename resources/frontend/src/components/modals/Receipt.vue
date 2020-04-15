<template>
    <div class="modal">
        <span @click="exit" class="background"></span>
        <div class="modal__content">
            <div class="receipt">
                <TextInput
                    @onInput="receipt.company = $event"
                    class="receipt__company"
                    name="debtor"
                    placeholder="The debtor company"
                    title="The debtor company"
                    v-model="receipt.company"
                >
                </TextInput>

                <!-- TODO: extract this editable table into a component -->
                <div class="receipt__items-table">
                    <span class="items-table__head">
                        <p class="label">Label</p>
                        <p class="quantity">Quantity</p>
                        <p class="price">Price</p>
                    </span>
                    <span
                        :key="index"
                        class="items-table__item"
                        v-for="(item, index) in receipt.items"
                    >
                        <TransparentTextInput
                            @onInput="item.label = $event"
                            class="label"
                            name="item_label"
                            title="The label of the item"
                            v-model="item.label"
                        ></TransparentTextInput>

                        <TransparentNumberInput
                            @onInput="item.quantity = $event"
                            class="quantity"
                            name="item_quantity"
                            title="The debtor company"
                            v-model="item.quantity"
                        ></TransparentNumberInput>

                        <TransparentNumberInput
                            @onInput="item.price = $event"
                            class="price"
                            name="item_price"
                            title="The debtor company"
                            v-model="item.price"
                        ></TransparentNumberInput>
                    </span>
                </div>

                <p class="total">{{ this.total }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import mixin from "./mixins/mixin";
import ThemedTextInput from "../Fileds/Themed/Inputs/TextInput";
import TransparentTextInput from "../Fileds/Transparent/Inputs/TextInput";
import TransparentNumberInput from "../Fileds/Transparent/Inputs/NumberInput";

export default {
    // TODO: add TVA percentage
    name: "receipt",
    components: {
        TextInput: ThemedTextInput,
        TransparentTextInput,
        TransparentNumberInput
    },
    mixins: [mixin],
    created() {
        this.getData(this.receiptId);
    },
    data() {
        return {
            receipt: null
        };
    },
    props: {
        receiptId: {
            type: Number,
            required: true
        }
    },
    computed: {
        total() {
            let total = 0;

            this.receipt.items.forEach(item => {
                total += Math.round(item.price * item.quantity * 100) / 100;
            });

            return total;
        }
    },
    methods: {
        getData: function(receipt_id) {
            this.receipt = this.$store.getters.getReceiptByID(receipt_id);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "mixins/mixin";

div.receipt {
    display: flex;
    flex-direction: column;
    justify-content: stretch;
    align-items: stretch;

    width: 100%;

    > .receipt__company {
        align-self: center;

        width: 40%;

        margin-bottom: 5%;
    }

    > .receipt__items-table {
        display: flex;
        flex-direction: column;
        justify-content: stretch;

        align-self: center;
        justify-self: center;

        width: 90%;

        border-radius: 15px;

        background-color: $color__background;

        > span {
            display: flex;
            justify-content: space-around;

            padding: 5px 25px;

            > p,
            > label {
                margin: 0 5px;
            }

            > p.label,
            > label.label {
                flex: 5;
            }

            > p.quantity,
            > label.quantity {
                flex: 0.7;
                text-align: center;
            }

            > p.price,
            > label.price {
                flex: 0.7;
                text-align: right;
            }

            &.items-table__head {
                border-radius: 15px 15px 0 0;

                background-color: $color__main;

                > p {
                    margin: 5px;

                    font-family: $font__heading;
                    font-weight: bold;
                    font-size: 1.2rem;
                }
            }

            &.items-table__item {
                margin-bottom: 10px;
                background-color: rgba(236, 236, 236, 0.5);

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
}
</style>
