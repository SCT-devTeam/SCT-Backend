<template>
    <div class="InputSearch" @mouseover="hovered" @mouseleave="notHovered">
        <label
            :for="name"
            ref="label"
            :style="{ top: labelPosition.top, left: labelPosition.left }"
            @mouseover="hovered"
            >{{ label }}</label
        >
        <span
            class="outline-top"
            :style="{
                left: topLineOffset + 'px',
                'background-color': outlineColor
            }"
            @mouseover="hovered"
        ></span>
        <input
            type="search"
            :id="name"
            ref="input"
            :name="name"
            :placeholder="placeholder"
            :title="title"
            :required="isRequired"
            v-model="value"
            :class="{ hovered: isHovered, active: isActive }"
            @keyup="newKeyboardAction"
            @focusin="active"
            @focusout="notActive"
            @mouseover="hovered"
        />
        <span
            class="outline-bot"
            :style="{ 'background-color': outlineColor }"
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
                :stroke="outlineColor"
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
                :stroke="outlineColor"
                stroke-width="2"
            />
        </svg>
    </div>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
export default {
    // TODO: refactor it based on TextSCT input
    name: "SearchSCT",
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
            outlineColor: "var(--colors-secondary-principal)"
        };
    },
    props: {
        name: {
            type: String,
            default: "search"
        },
        title: {
            type: String,
            default: "Enter your search here"
        },
        placeholder: {
            type: String,
            default: "Search"
        },
        label: {
            type: String,
            default: "Search"
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

                this.updateTopLine();
                this.labelPosition.top = "0";
                this.labelPosition.left = "25px";
            }
        },
        notHovered() {
            this.isHovered = false;
            if (!this.isActive && !this.isFilled) {
                this.updateTopLine();
                this.labelPosition.top = "50%";
                this.labelPosition.left = "15px";
            }
        },
        active() {
            if (!this.isActive) {
                this.isActive = !this.isActive;

                if (this.isActive) {
                    this.labelPosition.top = "0";
                    this.labelPosition.left = "25px";
                    this.outlineColor = "var(--colors-active)";
                } else if (!this.isFilled) {
                    this.labelPosition.top = "50%";
                    this.labelPosition.left = "15px";
                }
            }
        },
        notActive() {
            this.isActive = false;
            if (!this.isFilled) {
                this.updateTopLine();
                this.labelPosition.top = "50%";
                this.labelPosition.left = "15px";
            }
            this.outlineColor = "var(--colors-secondary-principal)";
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
        }
    }
};
</script>

<style scoped lang="scss">
@import "src/scss/colors";
@import "src/scss/typography";

* {
    transition: all 300ms ease-in-out;
}

div.InputSearch {
    position: relative;
    border: 5px solid transparent;

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
        width: 100%;

        padding: 0 15px;

        position: relative;

        border-radius: 100px;
        border: 0;
        background-color: #{$color__secondary}4d;

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
        bottom: -20px;
        left: 5px;
        margin: 0;
    }
}
</style>
