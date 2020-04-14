export default {
    methods: {
        exit() {
            try {
                this.save();
            } catch (e) {
                console.error(`Save modal error: ${e}`);
            }
            this.$emit("close");
        }
    }
};
