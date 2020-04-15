<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownInput
            :options="['prospect', 'active', 'archived', 'deleted']"
            @onInput="entity.status = $event"
            name="customer-status"
            placeholder="Customer Status"
            title="Customer Status"
            :value="entity.status"
        >
        </DropdownInput>

        <DropdownInput
            :options="['individual', 'professional']"
            @onInput="entity.customer_type = $event"
            name="customer-type"
            placeholder="Customer Type"
            title="Customer Type"
            :value="entity.customer_type"
        >
        </DropdownInput>

        <div id="name">
            <TextInput
                :isDisabled="!isEditionMode"
                @onInput="entity.firstname = $event"
                name="firstname"
                placeholder="FirstName"
                title="FirstName"
                v-model="entity.firstname"
            >
            </TextInput>

            <TextInput
                :isDisabled="!isEditionMode"
                @onInput="entity.lastname = $event"
                name="lastname"
                placeholder="LastName"
                title="LastName"
                v-model="entity.lastname"
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
            v-for="(contact, index) in contacts"
        ></TextFiledSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->

        <TextInput
            :isDisabled="!isEditionMode"
            @onInput="entity.notes = $event"
            name="notes"
            placeholder="Notes"
            title="Notes"
            v-model="entity.notes"
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
    // TODO: add v-if on all item, to only display the shape of the card when the component haven't any data
    name: "CustomerCard",
    components: {
        TextInput,
        TextFiledSCT,
        DropdownInput,
        BtnIcon
    },
    data() {
        return {
            isEditionMode: false
        };
    },
    props: {
        customerId: {
            type: Number,
            required: true
        }
    },
    computed: {
        entity() {
            return this.$store.getters.getCustomerByID(this.customerId);
        },
        contacts() {
            return this.getContacts(this.customerId);
        }
    },
    methods: {
        ...mapActions({
            getContacts: "getContacts",
            saveCustomer: "saveCustomer"
        }),
        displayContact: function(contact_id) {
            this.$emit("displayContact", contact_id);
        },
        toggleMode: function() {
            this.isEditionMode = !this.isEditionMode;
            if (this.isEditionMode) this.save();
        },
        contactFullname: function(contactObj) {
            return `${contactObj.firstname} ${contactObj.lastname}`;
        },
        save() {
            this.saveCustomer({
                id: this.entity.id,
                customer_type: "",
                status: "",
                meeting_date: "",
                company_name: "",
                siret: "",
                tva_number: "",
                firstname: "",
                lastname: "",
                street_number: "",
                street_name: "",
                zipcode: "",
                city: "",
                note: "",
                default_payment_method: "",
                company: ""
            });
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
