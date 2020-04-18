<!--Example to use this component with only specify required props-->

<template>
    <label>
        <input
            :disabled="isDisabled"
            :name="name"
            :placeholder="filedPlaceholder"
            :readonly="isDisabled"
            :required="isRequired"
            :title="title"
            type="number"
            :value="value"
            @input="$emit('onInput', parseFloat($event.target.value))"
            ref="input"
        />
    </label>
</template>

<script>
// Change inputs by stylise vuetify inputs : https://vuetifyjs.com/en/components/text-fields/#text-fields

// TODO: add validation
export default {
    name: "NumberInput",
    props: {
        name: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        placeholder: String,
        value: Number,
        isRequired: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        },
        isDisabled: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        }
    },
    computed: {
        filedPlaceholder() {
            if (this.placeholder !== undefined) return this.placeholder;
            else return this.name;
        },
        filedBgColor() {
            if (this.bgColor.startsWith("--")) return `var(${this.bgColor})`;
            else return this.bgColor;
        },
        fieldLabel() {
            if (this.label !== undefined) return this.label;
            else return this.filedPlaceholder;
        },
        isFilled() {
            return !!this.value;
        }
    }
};
</script>

<style lang="scss" scoped>
label {
    > input {
        width: 100%;

        border: none;
        border-bottom: 1px solid grey;
        background: none;

        &::placeholder {
            color: transparent;
        }
    }
}
</style>
