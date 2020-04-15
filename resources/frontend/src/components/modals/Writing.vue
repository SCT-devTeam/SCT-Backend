<template>
    <div class="modal">
        <span @click="exit" class="background"></span>
        <div class="modal__content">
            <div class="writing">
                <TextFiled
                    class="writing__company"
                    name="company"
                    placeholder="The creditor company"
                    title="The creditor company"
                    :value="companyName(writing.company_id)"
                >
                </TextFiled>

                <DropdownInput
                    :options="selectableCustomers()"
                    :value="writing.customer_id"
                    @onInput="writing.customer_id = Number($event)"
                    name="customer"
                    placeholder="Customer"
                    title="Select the customer"
                >
                </DropdownInput>

                <div class="writing__items-table">
                    <span class="table__head">
                        <p class="label">Label</p>
                        <p class="quantity">Quantity</p>
                        <p class="price">Price</p>
                    </span>
                    <span
                        :key="index"
                        class="table__item"
                        v-for="(item, index) in writing.items"
                    >
                        <label>
                            <input
                                class="label"
                                type="text"
                                v-model="item.label"
                            />
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
        </div>
    </div>
</template>

<script>
import mixin from "./mixins/mixin";
import DropdownInput from "../Fileds/Themed/Inputs/DropdownInput";
import TextFiled from "../Fileds/Themed/Display/TextFiled";

export default {
    name: "writing",
    components: {
        DropdownInput,
        TextFiled
    },
    mixins: [mixin],
    created() {
        this.getData(this.writingId);
    },
    data() {
        return {
            writing: null
        };
    },
    props: {
        writingId: {
            type: Number,
            required: true
        },
        writingType: {
            type: String,
            required: true
        }
    },
    computed: {
        total() {
            let total = 0;

            this.writing.items.forEach(item => {
                total += Math.round(item.price * item.quantity * 100) / 100;
            });

            return total;
        }
    },
    methods: {
        getData: function(writing_id) {
            if (this.writingType === "quotes")
                this.writing = this.$store.getters.getQuoteByID(writing_id);
            else if (this.writingType === "invoices")
                this.writing = this.$store.getters.getInvoiceByID(writing_id);
            else
                console.error(
                    "An error has occurred while getting writing data !"
                );
        },
        companyName() {
            return this.$store.getters.getCompanyByID(this.writing.company_id)
                .name;
        },
        selectableCustomers() {
            let selectableCustomers = [];

            this.$store.getters.getActiveCustomers.forEach(customer => {
                selectableCustomers.push({
                    name: `${customer.firstname} ${customer.lastname}`,
                    value: customer.id
                });
            });

            return selectableCustomers;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "mixins/mixin";
</style>
