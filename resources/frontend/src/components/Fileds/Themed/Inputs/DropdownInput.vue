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
            >
                {{ fieldLabel }}
            </label>
            <span
                :style="{
                    left: `${topLineOffset}px`,
                    'background-color': outlineColor
                }"
                @mouseover="hovered"
                class="outline-top"
            ></span>

            <div
                :style="{ '--inputBgColor': inputBgColor }"
                class="input-container"
            >
                <!-- TODO: implement all attributes -->
                <!--suppress HtmlFormInputWithoutLabel -->
                <select
                    :disabled="isDisabled"
                    :id="name"
                    :name="name"
                    :placeholder="inputPlaceholder"
                    :readonly="isDisabled"
                    :required="isRequired"
                    :title="title"
                    @focusin="active"
                    @focusout="notActive"
                    @mouseover="hovered"
                    ref="input"
                >
                    <option :key="index" v-for="(option, index) in options">
                        {{ option }}
                    </option>
                </select>
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
                ></path>
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
                ></path>
            </svg>
        </div>
    </div>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields
// TODO: refactor it based on TextSCT input
import outlineInputMixin from "./mixins/outlineInputMixin";

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
@import "src/components/Fileds/Themed/Inputs/mixins/outlineInputMixin";
</style>
