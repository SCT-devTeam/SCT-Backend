<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownInput
            name="gender"
            placeholder="Gender"
            title="Select the gender"
            :options="['Unspecified', 'Woman', 'Man']"
        >
        </DropdownInput>

        <div id="name">
            <TextInput
                name="firstname"
                placeholder="FirstName"
                title="FirstName"
                :isEditable="isEditionMode"
                v-model:value="user.firstname"
                @onInput="user.firstname = $event"
            >
            </TextInput>

            <TextInput
                name="lastname"
                placeholder="LastName"
                title="LastName"
                :isEditable="isEditionMode"
                v-model:value="user.lastname"
                @onInput="user.lastname = $event"
            >
            </TextInput>
        </div>

        <TextInput
            name="email"
            placeholder="Email"
            title="Email"
            :isEditable="isEditionMode"
            v-model:value="user.email"
            @onInput="user.email = $event"
        >
        </TextInput>

        <TextInput
            name="phone"
            placeholder="Mobile Phone"
            title="Mobile Phone"
            :isEditable="isEditionMode"
            v-model:value="user.phone"
            @onInput="user.phone = $event"
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

        <button @click="logoutUser">Logout</button>
    </div>
</template>

<script>
import DropdownInput from "./Fileds/Themed/Inputs/DropdownInput";
import TextInput from "./Fileds/Themed/Inputs/TextInput";
import BtnIcon from "./Buttons/BtnIcon";
import { mapMutations } from "vuex";

export default {
    name: "ProfileCard",
    components: {
        DropdownInput,
        TextInput,
        BtnIcon
    },
    data() {
        return {
            isEditionMode: false,
            user: this.$store.getters.getUser
        };
    },
    methods: {
        ...mapMutations({
            set_token: "SET_TOKEN",
            set_user: "SET_USER"
        }),
        logoutUser() {
            this.set_token(null);
            this.set_user({});
            this.$router.push({ name: "Login" });
        },
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
