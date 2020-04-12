export default {
    data() {
        return {
            error: "",
            isHovered: false,
            isActive: false,
            isValid: null
        };
    },
    props: {
        // TODO: implement all attributes
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
        bgColor: {
            type: String,
            default: "--colors-secondary-principal"
        },
        isRequired: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        },
        isDisabled: {
            type: Boolean,
            default: false
            // TODO: fix required markup to the correct HTML5 syntax
        },
        enableValidation: {
            type: Boolean,
            default: true
        }
    },
    computed: {
        inputPlaceholder() {
            if (this.placeholder !== undefined) return this.placeholder;
            else return this.name;
        },
        inputBgColor() {
            if (this.bgColor.startsWith("--"))
                return "var(" + this.bgColor + ")";
            else return this.bgColor;
        },
        fieldLabel() {
            if (this.label !== undefined) return this.label;
            else return this.inputPlaceholder;
        },
        isFilled() {
            return !!this.value;
        },
        isInteracting() {
            return this.isHovered || this.isActive || this.isFilled;
        },
        topLineOffset() {
            // TODO: Fix offset on build (label size is null on build...
            if (this.isInteracting) {
                return (this.$refs.label?.clientWidth || 0) + 30;
            }

            return 20;
        },
        labelStyle() {
            if (this.isInteracting) {
                return {
                    position: {
                        top: "0",
                        left: "25px"
                    },
                    cursor: "default"
                };
            }

            return {
                position: {
                    top: "50%",
                    left: "15px"
                },
                cursor: "text"
            };
        },
        outlineColor() {
            if (this.isValid != null && !this.isValid)
                return "var(--colors-validation-no)";

            if (this.isValid != null && this.isValid)
                return "var(--colors-validation-ok)";

            if (this.isActive) return "var(--colors-active)";

            return "var(--colors-secondary-principal)";
        }
    },
    methods: {
        hovered() {
            this.isHovered = true;
        },
        notHovered() {
            this.isHovered = false;
        },
        active() {
            this.isActive = true;
            this.isValid = null;
        },
        notActive() {
            this.isActive = false;
        },
        onInput(e) {
            this.$emit("input", e.target.value);
            setTimeout(this.checkInput, 700);
        }
    }
};
