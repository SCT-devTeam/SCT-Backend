export default {
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
        isDisabled: {
            type: Boolean,
            default: false
        }
    },
}
