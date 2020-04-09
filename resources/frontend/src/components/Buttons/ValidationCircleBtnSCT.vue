<template>
    <button
        id="CircleButtonSCT"
        v-bind:name="name"
        v-bind:title="title"
        v-bind:type="type"
        :disabled="isDisabled"
        v-bind:class="{ disabled: isDisabled }"
        @click="onClicked"
    >
        Search
    </button>
</template>

<script>
    export default {
        name: "ValidationCircleBtnSCT",
        props: {
            name: {
                type: String,
                default: "Button"
            },
            title: {
                type: String,
                default: "Button"
            },
            type: {
                type: String,
                validator: value => {
                    switch (value) {
                        case "button":
                        case "submit":
                        case "reset":
                            return true;

                        default:
                            return false;
                    }
                },
                default: "button"
            },
            value: {
                type: String,
                default: "Button"
            },
            isDisabled: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            onClicked(e) {
                this.$emit("clicked", e);
            },
        }
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

    button#CircleButtonSCT {
        height: 45px;
        width: 45px;

        padding: 5px;

        position: relative;

        border: 2px solid #fff;
        border-radius: 50%;

        background: $color__main;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);

        font-size: 1px;
        color: transparent;

        cursor: pointer;

        outline: none;

        &:focus {
            background-color: $color__action_active;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        &:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;

            border-radius: 20px;

            background-image: url("../../assets/icons/tick_icon_blue.png");
            background-position: center;
            background-size: 50%;
            background-repeat: no-repeat;
        }

        &.disabled {
            cursor: not-allowed;
            background-color: $color__secondary;

            &:after {
                content: "";
                position: absolute;
                top: -2px;
                bottom: -2px;
                left: -2px;
                right: -2px;

                border-radius: 50%;

                background-color: #{$color__inactive_subtitle}55;
            }
        }
    }
</style>
