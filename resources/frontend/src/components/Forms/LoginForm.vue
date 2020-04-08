<template>
    <div id="login-form">
        <img
            src="@/assets/logos/sct_logo_colored_squaredWithoutBackgroundAndSubtitle.png"
            alt="SCT's logo"
            srcset="@/assets/logos/sct_logo_colored_squaredWithoutBackgroundAndSubtitle.svg"
        />
        <h1>SignIn</h1>

        <p class="error">{{ error }}</p>

        <form id="login-form__form" @submit.prevent="submitForm" method="get">
            <EmailSCT
                @valueChanged="email = $event"
                @isValid="emailValid = $event"
                :required="true"
                class="input"
            ></EmailSCT>
            <PasswordSCT
                @valueChanged="password = $event"
                @isValid="passwordValid = $event"
                :required="true"
                class="input"
            ></PasswordSCT>
            <BtnSCT
                name="submit"
                title="Submit the form"
                type="submit"
                value="Sign In"
                :isDisabled="!isValidForm"
            ></BtnSCT>
        </form>
    </div>
</template>

<script>
    import {mapMutations} from "vuex";
    import EmailSCT from "@/components/inputs/EmailSCT";
    import PasswordSCT from "@/components/inputs/PasswordSCT";
    import BtnSCT from "@/components/Buttons/BtnSCT";

    export default {
        name: "LoginForm",
        components: {EmailSCT, PasswordSCT, BtnSCT},
        data() {
            return {
                email: "",
                emailValid: false,
                password: "",
                passwordValid: false,
                error: ""
            };
        },
        computed: {
            isValidForm: function () {
                return this.emailValid === true && this.passwordValid === true;
            }
        },
        methods: {
            ...mapMutations({
                set_token: "SET_TOKEN"
            }),
            submitForm: async function () {
                if (this.isValidForm) {
                    const token = await this.axios.post('/api/airlock/login', {
                            email: this.email,
                            password: this.password,
                            device_name: "Navigator"
                        },
                        {
                            header: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                            },
                        });
                    this.set_token(token);
                    await this.$router.replace({name: "Dashboard"});
                } else {
                    this.error = "Please fix input errors";
                }
            }
        }
    };
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

    div#login-form {
        max-width: 500px;

        padding: 20px;
        padding-bottom: 30px;

        position: relative;

        border-radius: 15px;

        background-color: $color__main;

        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);

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

    .input {
        width: 400px;
    }
</style>
