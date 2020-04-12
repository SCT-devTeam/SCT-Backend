<template>
    <div id="profile-card">
        <img
            alt="Picture of the contact"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-16.png"
        />

        <div id="name">
            <TextInput
                name="firstname"
                title="FirstName"
                placeholder="FirstName"
                v-model:value="entity.firstName"
                @onInput="entity.firstName = $event"
                :isEditable="isEditionMode"
            >
            </TextInput>

            <TextInput
                name="lastname"
                title="LastName"
                placeholder="LastName"
                v-model:value="entity.lastName"
                @onInput="entity.lastName = $event"
                :isEditable="isEditionMode"
            >
            </TextInput>
        </div>

        <TextInput
            name="job-position"
            title="Job Position"
            placeholder="Job Position"
            v-model:value="entity.job"
            @onInput="entity.job = $event"
            :isEditable="isEditionMode"
        >
        </TextInput>

        <TextInput
            name="phone-fixed"
            title="Phone Fixed"
            placeholder="Phone Fixed"
            v-model:value="entity.phone_fixe"
            @onInput="entity.phone_fixe = $event"
            :isEditable="isEditionMode"
        >
        </TextInput>

        <TextInput
            name="phone-mobile"
            title="Phone Mobile"
            placeholder="Phone Mobile"
            v-model:value="entity.phone_mobile"
            @onInput="entity.phone_mobile = $event"
            :isEditable="isEditionMode"
        >
        </TextInput>


        <TextInput
            name="phone-personal"
            title="Phone Personal"
            placeholder="Phone Personal"
            v-model:value="entity.phone_personnal"
            @onInput="entity.phone_personnal = $event"
            :isEditable="isEditionMode"
        >
        </TextInput>

        <TextInput
            name="phone-fax"
            title="Phone Fax"
            placeholder="Phone Fax"
            v-model:value="entity.phone_fax"
            @onInput="entity.phone_fax = $event"
            :isEditable="isEditionMode"
        >
        </TextInput>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->
        <TextInput
            name="Notes"
            title="Notes"
            placeholder="Notes"
            v-model:value="entity.notes"
            @onInput="entity.notes = $event"
            :isEditable="isEditionMode"
        >
        </TextInput>

        <BtnIcon
            name="Edit"
            title="Enable edition"
            value="edit"
            iconName="pencil_icon_blue"
            bg-color="--colors-main"
            icon-size="10"
            icon-rotation="45"
            @clicked="toggleMode"
            class="btn"
            v-if="!isEditionMode"
        ></BtnIcon>

        <BtnIcon
            name="Validate"
            title="Disable edition"
            value="validate"
            iconName="tick_icon_blue"
            bg-color="--colors-main"
            @clicked="toggleMode"
            class="btn"
            v-if="isEditionMode"
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
