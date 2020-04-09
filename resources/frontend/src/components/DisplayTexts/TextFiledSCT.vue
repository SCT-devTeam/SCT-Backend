<template>
    <div class="Filed-text">
        <label :for="name" ref="label">{{ label }}</label>
        <span
            class="outline-top"
            :style="{
                left: topLineOffset + 'px',
                'background-color': outlineColor
            }"
        ></span>
        <p>{{ this.value }}</p>
        <span
            class="outline-bot"
            :style="{ 'background-color': outlineColor }"
        ></span>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 40"
            id="border-left"
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
        >
            <path
                d="M1251.006,687h0a19,19,0,0,0,.016-38"
                transform="translate(-1251.006 -648)"
                fill="none"
                :stroke="outlineColor"
                stroke-width="2"
            />
        </svg>

        <img
            id="arrow"
            @click="arrowClicked"
            :src="imgSrcPath"
            :alt="icon + ' icon'"
            title="Display contact"
            :srcset="imgSrcsetPath"
            v-if="this.icon !== undefined || this.icon != null"
        />
    </div>
</template>

<script>
// Change input by stylise vuetify input : https://vuetifyjs.com/en/components/text-fields/#text-fields
export default {
    name: "TextSCT",
    data() {
        return {
            value: this.defaultValue,
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
        defaultValue: String,
        label: {
            type: String,
            default: "Text"
        },
        icon: String,
        isRequired: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        }
    },
    computed: {
        isFilled() {
            return !!this.value;
        },
        imgSrcPath() {
            return require("../../assets/icons/" +
                this.icon +
                "_icon_blue.png");
        },
        imgSrcsetPath() {
            return require("../../assets/icons/" +
                this.icon +
                "_icon_blue.svg");
        }
    },
    methods: {
        // TODO: refactor it based on TextSCT input
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
        arrowClicked() {
            this.$emit("iconClicked");
        }
    }
};
</script>

<style scoped lang="scss">
@import "src/sass/colors";
@import "src/sass/typography";

* {
    transition: all 300ms ease-in-out;
}

div.Filed-text {
    min-width: 100px;
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

        opacity: 0; // TODO: remove this
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

    > p {
        display: flex;
        align-items: center;

        height: 40px;

        margin: 0;
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

    > img#arrow {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);

        width: 25px;
    }

    > p.error {
        position: absolute;
        bottom: -20px;
        left: 5px;
        margin: 0;
    }
}
</style>
