<template>
    <div id="profile-card">
        <img src="@/assets/Artboards_Diversity_Avatars_by_Netguru-16.png" alt="Picture of the contact">

        <div id="name">
            <TextSCT
                name="FirstName"
                title="FirstName"
                placeholder="FirstName"
                label="FirstName"
                v-model="entity.firstName"
                :isEditable="isEditionMode"
            ></TextSCT>

            <TextSCT
                name="LastName"
                title="LastName"
                placeholder="LastName"
                label="LastName"
                v-model="entity.lastName"
                v-bind:isEditable="isEditionMode"
            ></TextSCT>
        </div>

        <TextSCT
            name="job position"
            title="job position"
            placeholder="job position"
            label="job position"
            v-model="entity.job"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>

        <TextSCT
            name="phone fixe"
            title="phone fixe"
            placeholder="phone fixe"
            label="phone fixe"
            v-model="entity.phone_fixe"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>

        <TextSCT
            name="phone mobile"
            title="phone mobile"
            placeholder="phone mobile"
            label="phone mobile"
            v-model="entity.phone_mobile"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>

        <TextSCT
            name="phone personnal"
            title="phone personnal"
            placeholder="phone personnal"
            label="phone personnal"
            v-model="entity.phone_personnal"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>

        <TextSCT
            name="phone fax"
            title="phone fax"
            placeholder="phone fax"
            label="phone fax"
            v-model="entity.phone_fax"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->
        <TextSCT
            name="Notes"
            title="Notes"
            placeholder="Notes"
            label="Notes"
            v-bind:defaultValue="entity.notes"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>

        <EditCircleBtnSCT
            class="btn"
            v-if="!isEditionMode"
            @clicked="toggleMode"
        ></EditCircleBtnSCT>

        <ValidationCircleBtnSCT
            class="btn"
            v-if="isEditionMode"
            @clicked="toggleMode"
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
        components: { DropdownSCT, TextSCT, TextFiledSCT, EditCircleBtnSCT, ValidationCircleBtnSCT },
        data() {
            return {
                isEditionMode: false,
                entity: {
                    status: 'Prospect',
                    firstName: 'John',
                    lastName: 'Doe',
                    contacts: {
                        firstName: 'John',
                        lastName: 'Doe',
                        job: 'IT',
                        phone_fixe: '+33 (0)9 00 00 00 00',
                        phone_mobile: '+33 (0)7 00 00 00 00',
                        phone_personnal: '+33 (0)7 00 00 00 00',
                        phone_fax: '+33 (0)4 00 00 00 00',
                        notes: 'Here\'s some notes',
                    }
                }
            }
        },
        methods: {
            toggleMode: function () {
                this.isEditionMode = !this.isEditionMode;
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

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
