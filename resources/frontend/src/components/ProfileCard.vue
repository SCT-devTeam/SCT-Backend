<template>
    <div id="profile-card">
        <img src="@/assets/Artboards_Diversity_Avatars_by_Netguru-29.png" alt="Picture of the customer">

        <DropdownSCT
            label="Gender"
            title="Select your gender"
            :options="['Unspecified', 'Woman', 'Man']"
        ></DropdownSCT>

        <div id="name">
            <TextSCT
                name="FirstName"
                title="FirstName"
                placeholder="FirstName"
                label="FirstName"
                v-model="user.firstname"
                :isEditable="isEditionMode"
            ></TextSCT>

            <TextSCT
                name="LastName"
                title="LastName"
                placeholder="LastName"
                label="LastName"
                v-model="user.lastname"
                :isEditable="isEditionMode"
            ></TextSCT>
        </div>

        <TextSCT
            name="email"
            title="email"
            placeholder="email"
            label="email"
            v-model="user.email"
            :isEditable="isEditionMode"
        ></TextSCT>

        <TextSCT
            name="Mobile phone"
            title="Mobile phone"
            placeholder="Mobile phone"
            label="Mobile phone"
            v-model="user.phone"
            :isEditable="isEditionMode"
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

        <button v-on:click="logoutUser">Logout</button>

    </div>
</template>

<script>
    import DropdownSCT from "./inputs/DropdownSCT";
    import TextSCT from "./inputs/TextSCT";
    import TextFiledSCT from "./DisplayTexts/TextFiledSCT";
    import EditCircleBtnSCT from "./Buttons/EditCircleBtnSCT";
    import ValidationCircleBtnSCT from "./Buttons/ValidationCircleBtnSCT";
    import {mapMutations} from "vuex";

    export default {
        name: "ProfileCard",
        components: { DropdownSCT, TextSCT, TextFiledSCT, EditCircleBtnSCT, ValidationCircleBtnSCT },
        data() {
            return {
                isEditionMode: false,
                user: this.$store.getters.user,
            }
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
                this.$emit('displayContact', contact_id);
            },
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
