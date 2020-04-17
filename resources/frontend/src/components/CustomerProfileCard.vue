<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownInput
            :options="['prospect', 'active', 'archived', 'deleted']"
            :isDisabled="!isEditionMode"
            @onInput="customerData.status = $event"
            name="customer-status"
            placeholder="Customer Status"
            title="Customer Status"
            :value="customerData.status"
        >
        </DropdownInput>

        <DropdownInput
            :options="['individual', 'professional']"
            :isDisabled="!isEditionMode"
            @onInput="customerData.customer_type = $event"
            name="customer-type"
            placeholder="Customer Type"
            title="Customer Type"
            :value="customerData.customer_type"
        >
        </DropdownInput>

        <div id="name">
            <TextInput
                :isDisabled="!isEditionMode"
                @onInput="customerData.firstname = $event"
                name="firstname"
                placeholder="FirstName"
                title="FirstName"
                v-model="customerData.firstname"
            >
            </TextInput>

            <TextInput
                :isDisabled="!isEditionMode"
                @onInput="customerData.lastname = $event"
                name="lastname"
                placeholder="LastName"
                title="LastName"
                v-model="customerData.lastname"
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
        ></TextFiledSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->

        <TextInput
            :isDisabled="!isEditionMode"
            @onInput="customerData.notes = $event"
            name="notes"
            placeholder="Notes"
            title="Notes"
            v-model="customerData.notes"
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
            v-if="!isEditionMode"
            value="edit"
        ></BtnIcon>

        <BtnIcon
            @clicked="toggleMode"
            bg-color="--colors-main"
            class="btn"
            iconName="tick_icon_blue"
            name="Validate"
            title="Disable edition"
            v-if="isEditionMode"
            value="validate"
        ></BtnIcon>
    </div>
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
        // eslint-disable-next-line
        this.customerData = JSON.parse ( JSON.stringify ( this.$store.getters.getCustomerByID(this.customerId)) );
        // eslint-disable-next-line
        this.customerContacts = JSON.parse ( JSON.stringify ( this.$store.getters.getCustomerContacts(this.customerId)) );
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
            customerContacts: null
        };
    },
    props: {
        customerId: Number
    },
    methods: {
        ...mapActions({
            saveCustomer: "updateCustomer"
        }),
        displayContact: function(contact_id) {
            this.$emit("displayContact", contact_id);
        },
        toggleMode: function() {
            if (this.isEditionMode) this.save();
            this.isEditionMode = !this.isEditionMode;
        },
        contactFullname: function(contactObj) {
            return `${contactObj.firstname} ${contactObj.lastname}`;
        },
        save() {
            this.saveCustomer(this.customerData);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div#profile-card {
    display: flex;
    flex-direction: column;
    align-items: center;

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
