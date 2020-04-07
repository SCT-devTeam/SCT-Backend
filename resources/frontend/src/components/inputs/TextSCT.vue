<template>
    <div class="InputText" @mouseover="hovered" @mouseleave="notHovered">
        <label
            v-bind:for="name"
            ref="label"
            v-bind:style="{ top: labelPosition.top, left: labelPosition.left }"
            @mouseover="hovered"
            >{{ label }}</label
        >
        <span
            class="outline-top"
            v-bind:style="{
                left: topLineOffset + 'px',
                'background-color': outlineColor
            }"
            @mouseover="hovered"
        ></span>
        <input
            type="text"
            :id="name"
            ref="input"
            :name="name"
            :placeholder="placeholder"
            :title="title"
            :value="value"
            :required="isRequired"
            :disabled="!isEditable"
            :class="{ hovered: isHovered, active: isActive }"
            @input="onInput"
            @focusin="active"
            @focusout="notActive"
            @mouseover="hovered"
        />
        <span
            class="outline-bot"
            v-bind:style="{ 'background-color': outlineColor }"
            @mouseover="hovered"
        ></span>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 40"
            id="border-left"
            @mouseover="hovered"
        >
            <path
                d="M1251.006,687h0a19,19,0,0,0,.016-38"
                transform="translate(-1251.006 -648)"
                fill="none"
                v-bind:stroke="outlineColor"
                stroke-width="2"
            />
        </svg>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 40"
            id="border-right"
            @mouseover="hovered"
        >
            <path
                d="M1251.006,687h0a19,19,0,0,0,.016-38"
                transform="translate(-1251.006 -648)"
                fill="none"
                v-bind:stroke="outlineColor"
                stroke-width="2"
            />
        </svg>
    </div>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
export default {
    name: "TextSCT",
    data() {
        return {
            error: "",
            isHovered: false,
            isActive: false,
        };
    },
    props: {
        name: {
            type: String,
            default: "text"
        },
        title: {
            type: String,
            default: "Enter your text here"
        },
        placeholder: {
            type: String,
            default: "Text"
        },
        label: {
            type: String,
            default: "Text"
        },
        value: String,
        isRequired: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        },
        isEditable: {
            type: Boolean,
            default: true,
        }
    },
    computed: {
        isFilled() {
            return !!this.value;
        },
        isInteracting() {
            return this.isHovered || this.isActive || this.isFilled;
        },
        topLineOffset() {
            if (this.isInteracting) {
                return (this.$refs.label?.clientWidth || 0) + 30;
            }

            return 20;
        },
        labelPosition() {
            if (this.isInteracting) {
                return {
                    top: "0",
                    left: "25px",
                }
            }

            return {
                top: "50%",
                left: "15px",
            }
        },
        outlineColor() {
            if (this.isActive) {
                return "var(--colors-active)";
            }

            return "var(--colors-secondary-principal)";
        },
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
        },
        notActive() {
            this.isActive = false;
        },
        onInput(e) {
            this.$emit("input", e.target.value);
        },
    },
};
</script>

<style lang="scss" scoped>
@import "src/sass/colors";
@import "src/sass/typography";

* {
    transition: all 300ms ease-in-out;
}

div.InputText {
    position: relative;
    border: 5px solid transparent;

    > label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        z-index: 1;

        cursor: default;

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

    > input {
        height: 40px;
        width: calc(100% - 30px);

        padding: 0 15px;

        position: relative;

        border-radius: 100px;
        border: 0;
        background-color: #{$color__secondary}4D;

        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

        font-family: $font__text;
        font-size: 1em;
        color: $color__black;

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
        bottom: -20px;
        left: 5px;
        margin: 0;
    }
}
</style>
