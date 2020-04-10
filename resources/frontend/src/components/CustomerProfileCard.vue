<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownInput
            name="customer-status"
            title="Customer Status"
            placeholder="Customer Status"
            :options="['prospect', 'active', 'archived', 'deleted']"
        >
        </DropdownInput>

        <DropdownInput
            name="customer-type"
            title="Customer Type"
            placeholder="Customer Type"
            :options="['individual', 'professional']"
        >
        </DropdownInput>

        <div id="name">
            <TextInput
                name="firstname"
                title="FirstName"
                placeholder="FirstName"
                :isEditable="isEditionMode"
                v-model:value="entity.firstName"
                @onInput="entity.firstName = $event">
            </TextInput>

            <TextInput
                name="lastname"
                title="LastName"
                placeholder="LastName"
                :isEditable="isEditionMode"
                v-model:value="entity.lastName"
                @onInput="entity.lastName = $event">
            </TextInput>
        </div>

        <p class="title">Contacts</p>

        <TextFiledSCT
            :defaultValue="contact.firstName + ' ' + contact.lastName"
            icon="arrow"
            :key="index"
            @iconClicked="displayContact(contact.id)"
            class="filed"
            v-for="(contact, index) in entity.contacts"
        ></TextFiledSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->

        <TextInput
            name="notes"
            title="Notes"
            placeholder="Notes"
            :isEditable="isEditionMode"
            v-model:value="entity.notes"
            @onInput="entity.notes = $event">
        </TextInput>

        <EditCircleBtnSCT
            @clicked="toggleMode"
            class="btn"
            v-if="!isEditionMode"
        ></EditCircleBtnSCT>

        <ValidationCircleBtnSCT
            @clicked="toggleMode"
            class="btn"
            v-if="isEditionMode"
        ></ValidationCircleBtnSCT>
    </div>
</template>

<script>
import TextInput from "./Fileds/Themed/Inputs/TextInput";
import TextFiledSCT from "./Fileds/Themed/Display/TextFiledSCT";
import DropdownInput from "./Fileds/Themed/Inputs/DropdownInput";
import EditCircleBtnSCT from "./Buttons/EditCircleBtnSCT";
import ValidationCircleBtnSCT from "./Buttons/ValidationCircleBtnSCT";

export default {
    name: "ProfileCard",
    components: {
        TextInput,
        TextFiledSCT,
        DropdownInput,
        EditCircleBtnSCT,
        ValidationCircleBtnSCT
    },
    data() {
        return {
            isEditionMode: false,
            entity: {
                status: "Prospect",
                firstName: "John",
                lastName: "Doe",
                contacts: [
                    {
                        id: 1,
                        firstName: "John",
                        lastName: "Doe",
                        notes: "Here's some notes"
                    },
                    {
                        id: 2,
                        firstName: "Jan",
                        lastName: "Doe",
                        notes: "Silence is golden"
                    }
                ]
            }
        };
    },
    methods: {
        displayContact: function(contact_id) {
            this.$emit("displayContact", contact_id);
        },
        toggleMode: function() {
            this.isEditionMode = !this.isEditionMode;
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
