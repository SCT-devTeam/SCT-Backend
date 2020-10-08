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

                <EditableTable
                    :columns="[
                        { name: 'Label', size: '5' },
                        { name: 'Quantity', size: '0.5' },
                        { name: 'Price', size: '0.7' }
                    ]"
                    :data="writing.items"
                    :dataPropertyMapping="{
                        label: 'Label',
                        quantity: 'Quantity',
                        price: 'Price'
                    }"
                ></EditableTable>
                <!--                <TextInput-->
                <!--                    @onInput="writing.customer_id = $event"-->
                <!--                    class="writing__customer"-->
                <!--                    name="customer"-->
                <!--                    placeholder="The customer"-->
                <!--                    title="The customer"-->
                <!--                    v-model="writing.customer_id"-->
                <!--                    :isDisabled="true"-->
                <!--                >-->
                <!--                </TextInput>-->

                <!--                <div class="writing__items-table">-->
                <!--                    <span class="items-table__head">-->
                <!--                        <p class="label">Label</p>-->
                <!--                        <p class="quantity">Quantity</p>-->
                <!--                        <p class="price">Price</p>-->
                <!--                    </span>-->
                <!--                    <span-->
                <!--                        :key="index"-->
                <!--                        class="items-table__item"-->
                <!--                        v-for="(item, index) in writing.items"-->
                <!--                    >-->
                <!--                        <TransparentTextInput-->
                <!--                            @onInput="item.label = $event"-->
                <!--                            class="label"-->
                <!--                            name="item_label"-->
                <!--                            title="The label of the item"-->
                <!--                            v-model="item.label"-->
                <!--                        ></TransparentTextInput>-->

                <!--                        <TransparentNumberInput-->
                <!--                            @onInput="item.quantity = $event"-->
                <!--                            class="quantity"-->
                <!--                            name="item_quantity"-->
                <!--                            title="The debtor company"-->
                <!--                            v-model="item.quantity"-->
                <!--                        ></TransparentNumberInput>-->

                <!--                        <TransparentNumberInput-->
                <!--                            @onInput="item.price = $event"-->
                <!--                            class="price"-->
                <!--                            name="item_price"-->
                <!--                            title="The debtor company"-->
                <!--                            v-model="item.price"-->
                <!--                        ></TransparentNumberInput>-->
                <!--                    </span>-->
                <!--                </div>-->

                <!--                <p class="total">{{ this.total }}</p>-->
            </div>
        </div>
    </div>
</template>

<script>
import mixin from "./mixins/mixin";
import ThemedTextInput from "../Fileds/Themed/Inputs/TextInput";
import TransparentTextInput from "../Fileds/Transparent/Inputs/TextInput";
import TransparentNumberInput from "../Fileds/Transparent/Inputs/NumberInput";
import DropdownInput from "../Fileds/Themed/Inputs/DropdownInput";
import TextFiled from "../Fileds/Themed/Display/TextFiled";
import EditableTable from "../Tables/EditableTable";

export default {
    name: "writing",
    components: {
        TextInput: ThemedTextInput,
        TransparentTextInput,
        TransparentNumberInput,
        DropdownInput,
        TextFiled,
        EditableTable
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
