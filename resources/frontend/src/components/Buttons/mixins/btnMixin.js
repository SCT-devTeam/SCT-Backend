export default {
    // TODO: FIX: box-shadow offset focus -> click
    props: {
        name: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            validator: value => {
                switch (value) {
                    case "button":
                    case "submit":
                    case "reset":
                        return true;

                    default:
                        return false;
                }
            },
            default: "button"
        },
        value: {
            type: String,
            required: true,
        },
        bgColor: {
            type: String,
            default: "--colors-secondary-principal"
        },
        isDisabled: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        btnBgColor() {
            if (this.bgColor.startsWith("--"))
                return "var(" + this.bgColor + ")";
            else return this.bgColor;
        },
    }
}
