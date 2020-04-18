<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownInput
            :options="['Unspecified', 'Woman', 'Man']"
            name="gender"
            placeholder="Gender"
            title="Select the gender"
            :value="user.gender"
        >
        </DropdownInput>

        <div id="name">
            <TextInput
                :isEditable="isEditionMode"
                @onInput="user.firstname = $event"
                name="firstname"
                placeholder="FirstName"
                title="FirstName"
                v-model="user.firstname"
            >
            </TextInput>

            <TextInput
                :isEditable="isEditionMode"
                @onInput="user.lastname = $event"
                name="lastname"
                placeholder="LastName"
                title="LastName"
                v-model="user.lastname"
            >
            </TextInput>
        </div>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="user.email = $event"
            name="email"
            placeholder="Email"
            title="Email"
            v-model="user.email"
        >
        </TextInput>

        <TextInput
            :isEditable="isEditionMode"
            @onInput="user.phone = $event"
            name="phone"
            placeholder="Mobile Phone"
            title="Mobile Phone"
            v-model="user.phone"
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

        <button @click="logoutUser">Logout</button>
    </div>
</template>

<script>
import DropdownInput from "./Fileds/Themed/Inputs/DropdownInput";
import TextInput from "./Fileds/Themed/Inputs/TextInput";
import BtnIcon from "./Buttons/BtnIcon";
import { mapActions } from "vuex";

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
        ...mapActions({ logout: "logoutUser" }),
        logoutUser() {
            this.logout().then(() => {
                this.$router.push({ name: "Login" });
            });
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
