export default {
    props: {
        iconName: {
            type: String,
            required: true,
        },
        iconSize: {
            type: Number,
            default: 50
        },
        iconRotation: {
            type: Number,
            default: 0
        }
    },
    computed: {
        imgSrcPath() {
            return require("../../../assets/icons/" +
                this.iconName +
                ".png");
        },
    }
}
