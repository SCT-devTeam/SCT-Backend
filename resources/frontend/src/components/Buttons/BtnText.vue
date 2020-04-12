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
        {{value}}
    </button>
</template>

<script>
    import mixin from "./mixins/mixin";
export default {
    name: "BtnSCT",
    mixins: [mixin]
};
</script>

<style lang="scss" scoped>
    @import "mixins/mixin";
</style>
