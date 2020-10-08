<template>
    <div class="textarea">
        <label :for="name">{{ fieldLabel }}</label>
        <!--suppress HtmlFormInputWithoutLabel -->
        <textarea
            :disabled="isDisabled"
            :id="name"
            :name="name"
            :placeholder="filedPlaceholder"
            :readonly="isDisabled"
            :required="isRequired"
            :title="title"
            :value="value"
            @input="$emit('onInput', $event.target.value)"
            cols="30"
            rows="10"
        ></textarea>
    </div>
</template>
<script>
export default {
    // TODO: style this component and use mixin of other fields
    name: "TextArea",
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
        value: String,
        isRequired: {
            type: Boolean,
            default: false
        },
        isDisabled: {
            type: Boolean,
            default: false
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
div.textarea {
    display: flex;
    justify-content: space-between;
    align-items: center;

    > label {
        margin-right: 15px;
    }
}
</style>
