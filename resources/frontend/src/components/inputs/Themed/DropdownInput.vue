<!--Example to use this component with only specify required props-->
<!--<DropdownInput-->
<!--    name="DropDownInput"-->
<!--    title="DropDownInput"-->
<!--    :options="['option 1', 'option 2']">-->
<!--</DropdownInput>-->

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
                <select
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
                    :readonly="isDisabled"
                >
                    <option :key="index" v-for="(option, index) in options"
                        >{{ option }}
                    </option>
                </select>
            </div>

            <span
                class="outline-bot"
                :style="{ 'background-color': outlineColor }"
                @mouseover="hovered"
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
    </div>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
// TODO: refactor it based on TextSCT input
import { outlineInputMixin } from "./mixins/outlineInputMixin";

export default {
    name: "DropdownInput",
    mixins: [outlineInputMixin],
    props: {
        options: {
            type: Array,
            required: true
        }
    }
};
</script>

<style lang="scss" scoped>
@import "mixins/outlineInputMixin";
</style>
