<template>
    <button
        :class="{ disabled: isDisabled }"
        :disabled="isDisabled"
        :name="name"
        :style="{
            'background-color': btnBgColor,
            '--iconLink': `url(${imgSrcPath})`,
            '--iconSize': `${iconSize}%`,
            '--iconRotation': `${iconRotation}deg`
        }"
        :title="title"
        :type="type"
        :value="value"
        @click="$emit('clicked')"
    >
        {{ value }}
    </button>
</template>

<script>
import btnMixin from "./mixins/btnMixin";
import btnIconMixin from "./mixins/btnIconMixin";

export default {
    name: "BtnIconAndText",
    mixins: [btnMixin, btnIconMixin]
};
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
