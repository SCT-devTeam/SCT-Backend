<template>
    <button
        id="ButtonSCT"
        :name="name"
        :title="title"
        :type="type"
        :disabled="isDisabled"
        :class="{ disabled: isDisabled }"
    >
        {{ value }}
    </button>
</template>

<script>
export default {
    name: "BtnSCT",
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
    }
};
</script>

<style scoped lang="scss">
@import "src/scss/colors";
@import "src/scss/typography";

button#ButtonSCT {
    padding: 5px 10px;

    position: relative;

    border: 2px solid #fff;
    border-radius: 20px;

    background: $color__secondary;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);

    font-family: $font__heading;
    font-weight: 400;
    font-size: 15px;
    text-align: left;
    color: #fff;

    cursor: pointer;

    outline: none;

    &:focus {
        background-color: $color__action_active;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
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

            border-radius: 20px;

            background-color: #{$color__inactive_subtitle}55;
        }
    }
}
</style>
