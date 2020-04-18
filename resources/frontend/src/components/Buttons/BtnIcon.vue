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
    name: "BtnIcon",
    mixins: [btnMixin, btnIconMixin]
};
</script>

<style lang="scss" scoped>
@import "mixins/btnIconMixin";
/* TODO: add border */
</style>
