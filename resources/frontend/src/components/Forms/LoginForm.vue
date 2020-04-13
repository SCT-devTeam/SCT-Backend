<template>
    <div id="login-form">
        <img
            alt="SCT's logo"
            src="../../assets/logos/sct_logo_colored_squaredWithoutBackgroundAndSubtitle.png"
            srcset="../../assets/logos/sct_logo_colored_squaredWithoutBackgroundAndSubtitle.svg"
        />
        <h1>SignIn</h1>

        <p class="error">{{ error }}</p>

        <form @submit.prevent="submitForm" id="login-form__form" method="get">
            <TextInput
                :isRequired="true"
                @isValid="isValidEmail = $event"
                @onInput="email = $event"
                bg-color="white"
                class="input"
                name="email"
                placeholder="Email"
                title="Enter your email here"
                type="email"
                v-model="email"
            >
            </TextInput>

            <TextInput
                :isRequired="true"
                @isValid="isValidPwd = $event"
                @onInput="password = $event"
                bg-color="white"
                class="input"
                name="password"
                placeholder="Password"
                title="Enter your password here"
                type="password"
                v-model="password"
            >
            </TextInput>
            <BtnSCT
                :isDisabled="!isValidForm"
                class="submit"
                name="submit"
                title="Submit the form"
                type="submit"
                value="Sign In"
            ></BtnSCT>
        </form>
    </div>
</template>

<script>
import { mapActions, mapMutations } from "vuex";
import BtnSCT from "../Buttons/BtnText";
import TextInput from "../Fileds/Themed/Inputs/TextInput";

export default {
    name: "LoginForm",
    components: { TextInput, BtnSCT },
    data() {
        return {
            email: "",
            isValidEmail: false,
            password: "",
            isValidPwd: false,
            error: ""
        };
    },
    computed: {
        isValidForm: function() {
            return this.isValidEmail === true && this.isValidPwd === true;
        }
    },
    methods: {
        ...mapMutations({
            set_token: "SET_TOKEN"
        }),
        ...mapActions({
            login: "loginUser",
            fetchUserData: "fetchUser"
        }),
        submitForm: async function() {
            if (this.isValidForm) {
                try {
                    let loginResult = await this.login({
                        email: this.email,
                        password: this.password
                    });

                    if (loginResult === true) {
                        await this.$router.replace({ name: "Dashboard" });
                    } else {
                        this.error = `An error has occurred while login: ${loginResult}`;
                    }
                } catch (e) {
                    this.error = e;
                }
            } else {
                this.error = "Please fix input errors";
            }
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div#login-form {
    display: flex;
    flex-direction: column;

    height: fit-content;
    width: fit-content;

    padding: 50px 35px;

    position: relative;

    border-radius: 15px;

    background-color: $color__main;

    box-shadow: 1px 2px 7px 2px rgba(0, 0, 0, 0.7);

    > img {
        align-self: center;

        width: 50%;

        margin-bottom: 50px;
    }

    > form#login-form__form {
        display: flex;
        flex-direction: column;

        .input {
            width: 400px;

            margin: 10px 0;
        }

        > button.submit {
            align-self: flex-end;
        }
    }

    &:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;

        height: 20px;

        border-radius: 0 0 15px 15px;

        background-color: white;
    }

    .error {
        margin: 5px 0;
        color: $color__validation_no;
    }
}
</style>
