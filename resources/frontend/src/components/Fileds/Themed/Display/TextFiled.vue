<template>
    <div class="container">
        <div class="filed">
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
                <p ref="input" style="margin: 0">{{ this.value }}</p>
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

            <img
                :alt="icon + ' icon'"
                :src="imgSrcPath"
                :srcset="imgSrcsetPath"
                @click="arrowClicked"
                class="filed-icon"
                title="Display contact"
                v-if="this.icon !== undefined || this.icon != null"
            />
        </div>
    </div>
</template>

<script>
// Change input by stylise vuetify input : https://vuetifyjs.com/en/components/text-fields/#text-fields
// TODO: Separate share logic in multiple files
import { outlineInputMixin } from "../Inputs/mixins/outlineInputMixin";

export default {
    name: "TextSCT",
    mixins: [outlineInputMixin],
    props: {
        icon: String,
        value: String
    },
    computed: {
        imgSrcPath() {
            return require("../../../../assets/icons/" + this.icon + ".png");
        },
        imgSrcsetPath() {
            return require("../../../../assets/icons/" + this.icon + ".svg");
        }
    },
    methods: {
        arrowClicked() {
            this.$emit("iconClicked");
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../mixins/outlinedFiledsMixin";
img.filed-icon {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);

    height: 80%;

    z-index: 1;

    cursor: pointer;
}
</style>
