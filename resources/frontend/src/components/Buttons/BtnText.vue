<template>
    <button
        :class="{ disabled: isDisabled }"
        :disabled="isDisabled"
        :name="name"
        :title="title"
        :value="value"
        :type="type"
        @click="$emit('clicked')"
    >
        {{ value }}
    </button>
</template>

<script>
import mixin from "./mixins/btnMixin";
export default {
    name: "BtnSCT",
    mixins: [mixin]
};
</script>

<style lang="scss" scoped>
@import "src/components/Buttons/mixins/btnMixin";
</style>
