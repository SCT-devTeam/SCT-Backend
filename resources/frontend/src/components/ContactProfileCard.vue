<template>
    <div id="profile-card">
        <img
            alt="Picture of the contact"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-16.png"
        />

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

        <TextSCT
            :isEditable="isEditionMode"
            label="job position"
            name="job position"
            placeholder="job position"
            title="job position"
            v-model="entity.job"
        ></TextSCT>

        <TextSCT
            :isEditable="isEditionMode"
            label="phone fixed"
            name="phone fixed"
            placeholder="phone fixed"
            title="phone fixed"
            v-model="entity.phone_fixe"
        ></TextSCT>

        <TextSCT
            :isEditable="isEditionMode"
            label="phone mobile"
            name="phone mobile"
            placeholder="phone mobile"
            title="phone mobile"
            v-model="entity.phone_mobile"
        ></TextSCT>

        <TextSCT
            :isEditable="isEditionMode"
            label="phone personal"
            name="phone personal"
            placeholder="phone personal"
            title="phone personal"
            v-model="entity.phone_personnal"
        ></TextSCT>

        <TextSCT
            :isEditable="isEditionMode"
            label="phone fax"
            name="phone fax"
            placeholder="phone fax"
            title="phone fax"
            v-model="entity.phone_fax"
        ></TextSCT>

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
import TextSCT from "./Inputs/TextSCT";
import EditCircleBtnSCT from "./Buttons/EditCircleBtnSCT";
import ValidationCircleBtnSCT from "./Buttons/ValidationCircleBtnSCT";

export default {
    name: "ProfileCard",
    components: {
        TextSCT,
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
                contacts: {
                    firstName: "John",
                    lastName: "Doe",
                    job: "IT",
                    phone_fixe: "+33 (0)9 00 00 00 00",
                    phone_mobile: "+33 (0)7 00 00 00 00",
                    phone_personnal: "+33 (0)7 00 00 00 00",
                    phone_fax: "+33 (0)4 00 00 00 00",
                    notes: "Here's some notes"
                }
            }
        };
    },
    props: {
        // TODO: pass contact object like on TextSCT component
    },
    methods: {
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
