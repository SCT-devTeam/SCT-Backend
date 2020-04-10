<template>
    <div class="container">
        <div @mouseleave="notHovered" @mouseover="hovered" class="filed">
            <!-- TODO: Change focus to input when click on it-->
            <label
                :for="name"
                :style="{
                    top: labelStyle.position.top,
                    left: labelStyle.position.left,
                    cursor: labelStyle.cursor
                }"
                @mouseover="hovered"
                ref="label"
            >{{ fieldLabel }}</label
            >
            <span
                class="outline-top"
                :style="{
                    left: topLineOffset + 'px',
                    'background-color': outlineColor
                }"
                @mouseover="hovered"
            ></span>

            <div
                class="input-container"
                :style="{ '--inputBgColor': inputBgColor }"
            >
                <input
                    :name="name"
                    :placeholder="inputPlaceholder"
                    :required="isRequired"
                    :title="title"
                    :value="value"
                    @focusin="active"
                    @focusout="notActive"
                    @input="onInput"
                    @mouseover="hovered"
                    :disabled="isDisabled"
                    ref="input"
                    :type="type"
                    :readonly="isDisabled"
                />
            </div>
            <span
                :style="{ 'background-color': outlineColor }"
                @mouseover="hovered"
                class="outline-bot"
            ></span>

            <svg
                class="outline-left"
                viewBox="0 0 20 40"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    :stroke="outlineColor"
                    d="M1251.006,687h0a19,19,0,0,0,.016-38"
                    fill="none"
                    stroke-width="2"
                    transform="translate(-1251.006 -648)"
                />
            </svg>

            <svg
                class="outline-right"
                viewBox="0 0 20 40"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    :stroke="outlineColor"
                    d="M1251.006,687h0a19,19,0,0,0,.016-38"
                    fill="none"
                    stroke-width="2"
                    transform="translate(-1251.006 -648)"
                />
            </svg>
        </div>
        <p class="error" v-if="error !== ''">{{ error }}</p>
    </div>
</template>

<script>
    // Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
    import {emailValidator} from "../utils/emailValidator"
    import {passwordValidator} from "../utils/passwordValidator"

    export default {
        name: "TextSCT",
        data() {
            return {
                error: "",
                isHovered: false,
                isActive: false,
                isValid: null,
            };
        },
        props: {
            // TODO: implement all attributes
            name: {
                type: String,
                required: true
            },
            title: {
                type: String,
                required: true
            },
            placeholder: String,
            value: String,
            type: {
                type: String,
                default: "text",
                validator: (prop) => [
                    'text',
                    'email',
                    'password',
                    'search',
                    'tel',
                ].includes(prop)
            },
            bgColor: {
                type: String,
                default: "--colors-secondary-principal"
            },
            isRequired: {
                type: Boolean,
                default: false
                // TODO: fix required markup to the correct HTML5 syntax
            },
            isDisabled: {
                type: Boolean,
                default: false
                // TODO: fix required markup to the correct HTML5 syntax
            }
        },
        computed: {
            inputPlaceholder() {
                if (this.placeholder !== undefined) return this.placeholder;
                else return this.name;
            },
            inputBgColor() {
                if (this.bgColor.startsWith("--"))
                    return "var(" + this.bgColor + ")";
                else return this.bgColor;
            },
            fieldLabel() {
                if (this.label !== undefined) return this.label;
                else return this.name;
            },
            isFilled() {
                return !!this.value;
            },
            isInteracting() {
                return this.isHovered || this.isActive || this.isFilled;
            },
            topLineOffset() {
                // TODO: Fix offset on build (label size is null on build...
                if (this.isInteracting) {
                    return (this.$refs.label?.clientWidth || 0) + 30;
                }

                return 20;
            },
            labelStyle() {
                if (this.isInteracting) {
                    return {
                        position: {
                            top: "0",
                            left: "25px"
                        },
                        cursor: "default"
                    };
                }

                return {
                    position: {
                        top: "50%",
                        left: "15px"
                    },
                    cursor: "text"
                };
            },
            outlineColor() {
                if (this.isValid != null && !this.isValid)
                    return "var(--colors-validation-no)";

                if (this.isValid != null && this.isValid)
                    return "var(--colors-validation-ok)";

                if (this.isActive)
                    return "var(--colors-active)";

                return "var(--colors-secondary-principal)";
            }
        },
        methods: {
            hovered() {
                this.isHovered = true;
            },
            notHovered() {
                this.isHovered = false;
            },
            active() {
                this.isActive = true;
                this.isValid = null;
            },
            notActive() {
                this.isActive = false;
                this.checkInput();
            },
            onInput(e) {
                this.$emit("input", e.target.value);
                setTimeout(this.checkInput, 700);
            },
            checkInput() {
                // Check if empty
                if (this.value === "") {
                    this.error = "Please fill the filed";
                    this.isValid = false;
                    this.$emit("isValid", false);
                } else {
                    this.error = "";
                }

                switch (this.type) {
                    case "email":
                        if (this.error === "" && !emailValidator(this.value)) {
                            this.error = "Please enter a correct email";
                            this.isValid = false;

                            this.$emit("isValid", false);
                        } else if (
                            this.error === "" &&
                            emailValidator(this.value)
                        ) {
                            this.isValid = true;

                            this.$emit("isValid", true);
                        }
                        break;

                    case "password":
                        if (this.error === "" && !passwordValidator(this.value)) {
                            this.error = "Please enter a stronger password (10 characters with 2 of low & UPPER case + special characters + numbers";
                            this.isValid = false;

                            this.$emit("isValid", false);
                        } else if (
                            this.error === "" &&
                            emailValidator(this.value)
                        ) {
                            this.isValid = true;

                            this.$emit("isValid", true);
                        }
                        break;
                }
            }
        }
    };
</script>

<style lang="scss" scoped>
    @import 'src/scss/colors';
    @import 'src/scss/typography';

    * {
        transition: all 300ms ease-in-out;
    }

    div.container {
        display: flex;
        flex-direction: column;

        div.filed {
            display: flex;
            position: relative;

            min-width: 100px;
            min-height: 40px;

            border: 2px solid transparent;
            border-top-width: 5px;

            > label {
                position: absolute;
                top: 50%;
                left: 15px;
                transform: translateY(-50%);
                z-index: 1;

                color: $color__inactive_subtitle;
                font-family: $font__subtitle;
            }

            > span {
                position: absolute;
                left: 20px;
                right: 20px;
                z-index: 2;

                height: 2px;

                background-color: $color__secondary;

                &.outline-top {
                    top: -2px;
                }

                &.outline-bot {
                    bottom: -2px;
                }
            }

            > div.input-container {
                display: flex;
                justify-content: stretch;
                align-items: stretch;

                width: 100%;

                position: relative;

                border-radius: 20000px;

                background-color: transparent;

                overflow: hidden;
                cursor: text;

                > input {
                    min-height: 40px;
                    width: calc(100% - 30px);

                    padding: 0 15px;

                    border-radius: 20000px;
                    border: 0;
                    background-color: transparent;

                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

                    font-family: $font__text;
                    font-size: 1em;
                    color: $color__black;

                    outline: none;

                    &::placeholder {
                        color: transparent;
                    }
                }

                &:before {
                    content: "";
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    z-index: -1;

                    border-radius: 20000px;

                    background-color: var(--inputBgColor);
                    opacity: 0.3;
                }
            }

            > svg {
                position: absolute;
                top: -2px;
                height: calc(100% + 4px);

                &.outline-left {
                    left: -2px;
                    transform: scale(-1, 1);
                }

                &.outline-right {
                    right: -2px;
                }
            }

            > p.error {
                margin: 0;

                color: $color__validation_no;

                line-break: anywhere;
            }
        }
    }
</style>
