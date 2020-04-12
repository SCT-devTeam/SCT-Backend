<!--Example to use this component with only specify required props-->
<!--<TextInput-->
<!--    name="TextInput"-->
<!--    title="TextInput"-->
<!--    v-model:value="value"-->
<!--    @onInput="value = $event">-->
<!--</TextInput>-->

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
                <!-- TODO: implement all attributes -->
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
        <p class="error" v-if="this.enableValidation">{{ error }}</p>
    </div>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
import { emailValidator } from "../../utils/emailValidator";
import { passwordValidator } from "../../utils/passwordValidator";
import outlineInputMixin from "./mixins/outlineInputMixin";

export default {
    name: "TextSCT",
    mixins: [outlineInputMixin],
    props: {
        type: {
            type: String,
            default: "text",
            validator: prop =>
                ["text", "email", "password", "search", "tel"].includes(prop)
        }
    },
    methods: {
        notActive() {
            this.isActive = false;
            if (this.enableValidation) this.checkInput();
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
                        this.error =
                            "Please enter a stronger password (10 characters with 2 of low & UPPER case + special characters + numbers";
                        this.isValid = false;

                        this.$emit("isValid", false);
                    } else if (
                        this.error === "" &&
                        passwordValidator(this.value)
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
@import "src/components/Fileds/Themed/Inputs/mixins/outlineInputMixin";
</style>
