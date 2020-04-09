<template>
    <div id="profile-card">
        <img
            alt="Picture of the customer"
            src="../assets/Artboards_Diversity_Avatars_by_Netguru-29.png"
        />

        <DropdownSCT
            :options="['Unspecified', 'Woman', 'Man']"
            label="Gender"
            title="Select your gender"
        ></DropdownSCT>

        <div id="name">
            <TextSCT
                :isEditable="isEditionMode"
                label="FirstName"
                name="FirstName"
                placeholder="FirstName"
                title="FirstName"
                v-model="user.firstname"
            ></TextSCT>

            <TextSCT
                :isEditable="isEditionMode"
                label="LastName"
                name="LastName"
                placeholder="LastName"
                title="LastName"
                v-model="user.lastname"
            ></TextSCT>
        </div>

        <TextSCT
            :isEditable="isEditionMode"
            label="email"
            name="email"
            placeholder="email"
            title="email"
            v-model="user.email"
        ></TextSCT>

        <TextSCT
            :isEditable="isEditionMode"
            label="Mobile phone"
            name="Mobile phone"
            placeholder="Mobile phone"
            title="Mobile phone"
            v-model="user.phone"
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

        <button @click="logoutUser">Logout</button>
    </div>
</template>

<script>
    import DropdownSCT from "./inputs/DropdownSCT";
    import TextSCT from "./inputs/TextSCT";
    import EditCircleBtnSCT from "./Buttons/EditCircleBtnSCT";
    import ValidationCircleBtnSCT from "./Buttons/ValidationCircleBtnSCT";
    import {mapMutations} from "vuex";

    export default {
        name: "ProfileCard",
        components: {
            DropdownSCT,
            TextSCT,
            EditCircleBtnSCT,
            ValidationCircleBtnSCT
        },
        data() {
            return {
                isEditionMode: false,
                user: this.$store.getters.user
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
                this.$router.push({name: "Login"});
            },
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
