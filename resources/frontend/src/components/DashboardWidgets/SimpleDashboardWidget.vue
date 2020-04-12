<template>
    <div id="widget">
        <span :style="bgColor" class="icon">
            <img
                :alt="icon + ' icon'"
                :src="imgSrcPath"
                :srcset="imgSrcsetPath"
            />
        </span>
        <span class="informations">
            <p class="indicator">{{ indicator }}</p>
            <p class="text">{{ text }}</p>
        </span>
    </div>
</template>

<script>
export default {
    name: "SimpleDashboardWidget",
    computed: {
        imgSrcPath() {
            return require("../../assets/icons/" +
                this.icon +
                ".png");
        },
        imgSrcsetPath() {
            return require("../../assets/icons/" +
                this.icon +
                ".svg");
        },
        bgColor() {
            return "--circle-color: var(--colors-" + this.color + ")";
        }
    },
    props: {
        icon: {
            type: String,
            required: true
        },
        indicator: {
            type: Number,
            default: 0,
            required: true
        },
        text: {
            type: String,
            default: "text",
            required: true
        },
        color: {
            type: String,
            default: "main"
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div#widget {
    display: flex;
    justify-content: space-around;
    align-items: center;

    height: 150px;
    width: 300px;

    padding: 10px;

    border-radius: 15px;

    background: #fff;

    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);

    > span.icon {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;

        position: relative;

        width: 115px;
        height: 115px;

        &:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            height: 130px;
            width: 130px;

            border-radius: 50%;

            background-color: var(--circle-color);

            opacity: 0.3;
        }

        > img {
            height: 70%;
            z-index: 1;
        }
    }

    > span.informations {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        > p {
            margin: 0;
            text-align: center;
        }

        > p.indicator {
            margin-bottom: 10px;
            font-family: $font__text;
            font-weight: bold;
            font-size: 2em;
            color: $color__black;
        }

        > p.text {
            font-family: $font__text;
            font-size: 1.5em;
            color: $color__black;
        }
    }
}
</style>
