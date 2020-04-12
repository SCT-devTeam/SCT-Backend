<template>
    <button
        :class="{ disabled: isDisabled }"
        :style="{ 'background-color': btnBgColor, '--iconLink': `url(${imgSrcPath})`, '--iconSize': `${iconSize}%`, '--iconRotation': `${iconRotation}deg` }"
        :disabled="isDisabled"
        :name="name"
        :title="title"
        :value="value"
        :type="type"
        @click="$emit('clicked')"
    >
        {{value}}
    </button>
</template>

<script>
    import mixin from "./mixins/mixin";

    export default {
        name: "BtnIcon",
        mixins: [mixin],
        props: {
            iconName: {
                type: String,
                required: true,
            },
            iconSize: {
                type: Number,
                default: 50
            },
            iconRotation: {
                type: Number,
                default: 0
            }
        },
        computed: {
            imgSrcPath() {
                return require("../../assets/icons/" +
                    this.iconName +
                    ".png");
            },
        }
    }
</script>

<style lang="scss" scoped>
    @import "mixins/mixin";
    button {
        border: 0 solid transparent;

        font-size: 0;

        &:before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;

            border-radius: 20px;

            background-image: var(--iconLink);
            background-position: center;
            background-size: var(--iconSize);
            background-repeat: no-repeat;

            transform: rotate(var(--iconRotation));
        }
    }
</style>
