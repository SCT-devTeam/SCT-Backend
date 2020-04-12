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
    import btnMixin from "./mixins/btnMixin";
    import btnIconMixin from "./mixins/btnIconMixin";

    export default {
        name: "BtnIconAndText",
        mixins: [btnMixin, btnIconMixin]
    }
</script>

<style lang="scss" scoped>
    @import "mixins/btnIconMixin";

    button {
        padding-left: 1.75em;

        border: 2px solid #fff;

        font-size: 1em;

        &:before {
            width: 1.75rem;
        }
    }
</style>
