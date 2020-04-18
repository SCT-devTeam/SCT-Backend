<template>
    <form id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <!-- TODO: FIX: reset the dropdown on new customer object -->
        <DropdownInput
            :options="['prospect', 'active', 'archived', 'deleted']"
            :isDisabled="!isEditionMode"
            @onInput="customerData.status = $event"
            name="customer-status"
            placeholder="Customer Status"
            :isRequired="true"
            title="Customer Status"
            :value="customerData.status"
            v-if="customerData != null"
        >
        </DropdownInput>

        <DropdownInput
            :options="['individual', 'professional']"
            :isDisabled="!isEditionMode"
            @onInput="customerData.customer_type = $event"
            name="customer-type"
            placeholder="Customer Type"
            :isRequired="true"
            title="Customer Type"
            :value="customerData.customer_type"
            v-if="customerData != null"
        >
        </DropdownInput>

        <div id="name">
            <TextInput
                :isDisabled="!isEditionMode"
                @onInput="customerData.firstname = $event"
                name="firstname"
                placeholder="FirstName"
                :isRequired="true"
                title="FirstName"
                v-model="customerData.firstname"
                v-if="customerData != null"
            >
            </TextInput>

            <TextInput
                :isDisabled="!isEditionMode"
                @onInput="customerData.lastname = $event"
                name="lastname"
                placeholder="LastName"
                :isRequired="true"
                title="LastName"
                v-model="customerData.lastname"
                v-if="customerData != null"
            >
            </TextInput>
        </div>

        <p class="title">Contacts</p>

        <TextFiledSCT
            :key="index"
            :name="'Contact-' + contactFullname(contact)"
            :value="contactFullname(contact)"
            @iconClicked="displayContact(contact.id)"
            class="filed"
            icon="arrow_icon_blue"
            title="Click on it to view his card"
            v-for="(contact, index) in customerContacts"
            v-if="customerData != null"
        ></TextFiledSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->

        <TextInput
            :isDisabled="!isEditionMode"
            @onInput="customerData.notes = $event"
            name="notes"
            placeholder="Notes"
            title="Notes"
            v-model="customerData.note"
            v-if="customerData != null"
        >
        </TextInput>

        <BtnIcon
            :icon-rotation="45"
            :icon-size="10"
            @clicked="toggleMode"
            bg-color="--colors-main"
            class="btn"
            iconName="pencil_icon_blue"
            name="Edit"
            title="Enable edition"
            v-if="!isEditionMode && this.customerData != null"
            value="edit"
        ></BtnIcon>

        <BtnIcon
            @clicked="toggleMode"
            bg-color="--colors-main"
            class="btn"
            iconName="tick_icon_blue"
            name="Validate"
            title="Save the customer"
            v-if="isEditionMode && this.customerData != null"
            value="submit"
            type="submit"
        ></BtnIcon>

        <BtnIcon
            @clicked="createNewCustomer"
            class="btn-add"
            bg-color="--colors-main"
            iconName="plus_icon_white"
            name="new"
            title="Create new customer"
            value=""
        ></BtnIcon>

        <p v-if="this.error != null">{{ this.error }}</p>
    </form>
</template>

<script>
import TextInput from "./Fileds/Themed/Inputs/TextInput";
import TextFiledSCT from "./Fileds/Themed/Display/TextFiled";
import DropdownInput from "./Fileds/Themed/Inputs/DropdownInput";
import BtnIcon from "./Buttons/BtnIcon";
import { mapActions } from "vuex";

export default {
    name: "CustomerCard",
    created() {
        if (this.customerId != null) {
            this.fetchCustomerData();
        }
    },
    components: {
        TextInput,
        TextFiledSCT,
        DropdownInput,
        BtnIcon
    },
    data() {
        return {
            isEditionMode: false,
            customerData: null,
            customerContacts: null,
            error: null
        };
    },
    props: {
        customerId: {
            type: Number,
            default: null
        }
    },
    methods: {
        ...mapActions({
            saveCustomer: "updateCustomer",
            createCustomer: "createCustomer"
        }),
        fetchCustomerData() {
            // eslint-disable-next-line
            this.customerData = JSON.parse ( JSON.stringify ( this.$store.getters.getCustomerByID(this.customerId)) );
            // eslint-disable-next-line
            this.customerContacts = JSON.parse ( JSON.stringify ( this.$store.getters.getCustomerContacts(this.customerId)) );
        },
        createNewCustomer() {
            this.customerData = {
                customer_type: null,
                status: "",
                meeting_date: "",
                company_name: "",
                siret: null,
                tva_number: null,
                firstname: "",
                lastname: "",
                street_number: null,
                street_name: "",
                zipcode: null,
                city: "",
                note: "",
                default_payment_method: null,
                company: this.$store.getters.getActiveCompany
            };
            this.isEditionMode = true;
        },
        displayContact: function(contact_id) {
            this.$emit("displayContact", contact_id);
        },
        toggleMode: function() {
            if (this.isEditionMode) {
                if (
                    this.customerData.firstname !== "" &&
                    this.customerData.lastname !== "" &&
                    this.customerData.status !== ""
                ) {
                    this.error = null;
                    this.isEditionMode = false;
                    this.save();
                } else {
                    this.error = "Please fill required inputs";
                }
            } else {
                this.isEditionMode = true;
            }
        },
        contactFullname: function(contactObj) {
            return `${contactObj.firstname} ${contactObj.lastname}`;
        },
        save() {
            if (Object.prototype.hasOwnProperty.call(this.customerData, "id"))
                this.saveCustomer(this.customerData);
            else
                this.createCustomer(this.customerData).then(newCustomer => {
                    this.customerData = newCustomer;
                    this.isEditionMode = true;
                });
        }
    },
    watch: {
        customerId() {
            this.fetchCustomerData();
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

form#profile-card {
    display: flex;
    flex-direction: column;
    align-items: center;

    width: 100%;

    padding: 10px;

    border-radius: 15px;
    background: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);

    > img {
        max-width: 150px;
        max-height: 150px;

        margin-bottom: 10px;

        border-radius: 50%;
        border: 2px solid #2f3e55;
    }

    > div.Input-dropdown {
        width: 70%;
        margin-bottom: 25px;
    }

    > div#name {
        display: flex;
        width: 90%;
    }

    > p.title {
        width: 100%;

        padding-left: 10%;

        font-family: $font__text;
        font-size: 1.2em;
    }

    > div.filed {
        width: 85%;
    }
}
</style>
