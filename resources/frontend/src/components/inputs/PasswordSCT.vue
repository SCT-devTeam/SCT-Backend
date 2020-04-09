<template>
    <div @mouseleave="notHovered" @mouseover="hovered" class="InputPassword">
        <label
            :for="name"
            :style="{ top: labelPosition.top, left: labelPosition.left }"
            @mouseover="hovered"
            ref="label"
            >{{ label }}</label
        >
        <span
            :style="{
                left: topLineOffset + 'px',
                'background-color': outlineColor
            }"
            @mouseover="hovered"
            class="outline-top"
        ></span>
        <input
            :class="{ hovered: isHovered, active: isActive }"
            :id="name"
            :name="name"
            :placeholder="placeholder"
            :required="isRequired"
            :title="title"
            @focusin="active"
            @focusout="notActive"
            @keyup="newKeyboardAction"
            @mouseover="hovered"
            autocomplete="password"
            minlength="5"
            ref="input"
            type="password"
            v-model="value"
        />
        <span
            :style="{ 'background-color': outlineColor }"
            @mouseover="hovered"
            class="outline-bot"
        ></span>

        <svg
            @mouseover="hovered"
            id="border-left"
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
            @mouseover="hovered"
            id="border-right"
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

        <p class="error" v-if="error">{{ error }}</p>
    </div>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
// TODO: refactor it based on TextSCT input
export default {
    name: "PasswordSCT",
    data() {
        return {
            value: "",
            error: "",
            isHovered: false,
            isActive: false,
            topLineOffset: 20,
            labelPosition: {
                top: "50%",
                left: "15px"
            },
            outlineColor: "white"
        };
    },
    props: {
        name: {
            type: String,
            default: "password"
        },
        title: {
            type: String,
            default: "Enter your password address"
        },
        placeholder: {
            type: String,
            default: "Password"
        },
        label: {
            type: String,
            default: "Password"
        },
        isRequired: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        }
    },
    computed: {
        isFilled() {
            return !!this.value;
        }
    },
    methods: {
        hovered() {
            if (!this.isHovered && !this.isActive && !this.isFilled) {
                this.isHovered = true;
                this.labelPosition.top = "0";
                this.labelPosition.left = "25px";
                this.updateTopLine();
            }
        },
        notHovered() {
            this.isHovered = false;
            if (!this.isActive && !this.isFilled) {
                this.labelPosition.top = "50%";
                this.labelPosition.left = "15px";
                this.updateTopLine();
            }
        },
        active() {
            if (!this.isActive) {
                this.isActive = !this.isActive;

                if (this.isActive) {
                    this.labelPosition.top = "0";
                    this.labelPosition.left = "25px";
                    this.outlineColor = "var(--colors-active)";
                    !this.isHovered ? this.updateTopLine() : null;
                } else if (!this.isFilled) {
                    this.labelPosition.top = "50%";
                    this.labelPosition.left = "15px";
                }
            }
        },
        notActive() {
            this.isActive = false;
            if (!this.isFilled) {
                this.labelPosition.top = "50%";
                this.labelPosition.left = "15px";
                this.updateTopLine();
            }
            if (this.error === "") {
                this.outlineColor = "white";
            }

            this.checkInput();
        },
        updateTopLine() {
            if (this.topLineOffset === 20) {
                this.topLineOffset += this.$refs.label.clientWidth + 10;
            } else {
                this.topLineOffset = 20;
            }
        },
        newKeyboardAction() {
            this.$emit("valueChanged", this.value);
            setTimeout(this.checkInput, 700);
        },
        checkInput() {
            // TODO: use better regex (2 caracters type + 10 caracters min + no date etc...)
            const regex = new RegExp(
                "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[#$^+=!*()@%&]).{10,}$"
            );
            // const regex = new RegExp("^(?=.*[a-z].*[a-z])(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[!@#\\$%\\^&\\*].*[!@#\\$%\\^&\\*]).{10,}");

            // Check if empty
            if (this.value === "" || this.value === "") {
                this.error = "Please enter an password address";
                this.outlineColor = "var(--colors-validation-no)";
            } else {
                this.error = "";
            }

            // Check if value = correct password
            if (this.error === "" && !regex.test(this.value)) {
                this.error =
                    "Please enter a stronger password (10 characters with 2 of low & UPPER case + special characters + numbers";
                this.outlineColor = "var(--colors-validation-no)";

                this.$emit("isValid", false);
            } else if (this.error === "" && regex.test(this.value)) {
                this.outlineColor = "var(--colors-validation-ok";
                this.$emit("isValid", true);
            }
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

* {
    transition: all 300ms ease-in-out;
}

div.InputPassword {
    position: relative;
    border: 5px solid transparent;
    border-bottom-width: 40px;

    > label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        z-index: 1;

        cursor: text;

        color: $color__inactive_subtitle;
        font-family: $font__subtitle;
    }

    > span {
        position: absolute;
        left: 20px;
        right: 20px;
        z-index: 2;

        height: 2px;

        background-color: white;

        &.outline-top {
            top: -2px;
        }

        &.outline-bot {
            bottom: -2px;
        }
    }

    > input {
        height: 40px;
        width: calc(100% - 30px);

        padding: 0 15px;

        position: relative;

        border-radius: 100px;
        border: 0;
        background-color: rgba(255, 255, 255, 0.3);

        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

        outline: none;

        &::placeholder {
            color: transparent;
        }
    }

    > svg {
        position: absolute;
        top: -2px;
        height: calc(100% + 4px);

        &#border-left {
            left: -2px;
            transform: scale(-1, 1);
        }

        &#border-right {
            right: -2px;
        }
    }

    > p.error {
        position: absolute;
        bottom: -40px;
        left: 5px;
        margin: 0;
    }
}
</style>
