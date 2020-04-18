<template>
    <div id="profile-card">
        <img
            alt="Picture of the contact"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-16.png"
        />

        <div id="name">
            <TextInput
                :isEditable="isEditionMode"
                @onInput="entity.firstName = $event"
                name="firstname"
                placeholder="FirstName"
                title="FirstName"
                v-model="entity.firstName"
            >
            </TextInput>

            <TextInput
                :isEditable="isEditionMode"
                @onInput="entity.lastName = $event"
                name="lastname"
                placeholder="LastName"
                title="LastName"
                v-model="entity.lastName"
            >
            </TextInput>
        </div>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="entity.job = $event"
            name="job-position"
            placeholder="Job Position"
            title="Job Position"
            v-model="entity.job"
        >
        </TextInput>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="entity.phone_fixe = $event"
            name="phone-fixed"
            placeholder="Phone Fixed"
            title="Phone Fixed"
            v-model="entity.phone_fixe"
        >
        </TextInput>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="entity.phone_mobile = $event"
            name="phone-mobile"
            placeholder="Phone Mobile"
            title="Phone Mobile"
            v-model="entity.phone_mobile"
        >
        </TextInput>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="entity.phone_personnal = $event"
            name="phone-personal"
            placeholder="Phone Personal"
            title="Phone Personal"
            v-model="entity.phone_personnal"
        >
        </TextInput>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="entity.phone_fax = $event"
            name="phone-fax"
            placeholder="Phone Fax"
            title="Phone Fax"
            v-model="entity.phone_fax"
        >
        </TextInput>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->
        <TextInput
            :isEditable="isEditionMode"
            @onInput="entity.notes = $event"
            name="Notes"
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
import BtnIcon from "./Buttons/BtnIcon";

export default {
    name: "ProfileCard",
    components: {
        TextInput,
        BtnIcon
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
