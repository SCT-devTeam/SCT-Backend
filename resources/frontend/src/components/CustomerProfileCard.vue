<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownSCT
            defaultOption="Prospect"
            label="Customer Status"
            title="Select customer status"
        ></DropdownSCT>

        <DropdownSCT
            :options="['individual', 'professional']"
            label="Customer type"
            title="Select customer type"
        ></DropdownSCT>

        <div id="name">
            <TextSCT
                :isEditable="isEditionMode"
                label="FirstName"
                name="FirstName"
                placeholder="FirstName"
                title="FirstName"
                v-model="entity.firstName"
            ></TextSCT>

            <TextSCT
                :isEditable="isEditionMode"
                label="LastName"
                name="LastName"
                placeholder="LastName"
                title="LastName"
                v-model="entity.lastName"
            ></TextSCT>
        </div>

        <p class="title">Contacts</p>

        <TextFiledSCT
            :defaultValue="contact.firstName + ' ' + contact.lastName"
            :displayIcon="true"
            :key="index"
            @iconClicked="displayContact(contact.id)"
            class="filed"
            v-for="(contact, index) in entity.contacts"
        ></TextFiledSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->
        <TextSCT
            :defaultValue="entity.notes"
            :isEditable="isEditionMode"
            label="Notes"
            name="Notes"
            placeholder="Notes"
            title="Notes"
        ></TextSCT>

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
    import DropdownSCT from "./inputs/DropdownSCT";
    import TextSCT from "./inputs/TextSCT";
    import TextFiledSCT from "./DisplayTexts/TextFiledSCT";
    import EditCircleBtnSCT from "./Buttons/EditCircleBtnSCT";
    import ValidationCircleBtnSCT from "./Buttons/ValidationCircleBtnSCT";

    export default {
        name: "ProfileCard",
        components: {
            DropdownSCT,
            TextSCT,
            TextFiledSCT,
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
            displayContact: function (contact_id) {
                this.$emit("displayContact", contact_id);
            },
            toggleMode: function () {
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
