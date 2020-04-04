<template>
    <div id="widget">
        <span class="icon">
            <img
                v-bind:src="imgSrcPath"
                v-bind:alt="icon + ' icon'"
                v-bind:srcset="imgSrcsetPath"
            />
        </span>
        <span class="informations">
            <p class="indicator">{{indicator}}</p>
            <p class="text">{{text}}</p>
        </span>
    </div>
</template>

<script>
    export default {
        name: "DashboardWidget",
        computed: {
            imgSrcPath() {
                return require("@/assets/icons/" + this.icon + "_icon_blue.png" );
            },
            imgSrcsetPath() {
                return require("@/assets/icons/" + this.icon + "_icon_blue.svg" );
            }
        },
        props: {
            icon: {
                type: String,
                required: true,
            },
            indicator: {
                type: Number,
                default: 0,
                required: true,
            },
            text: {
                type: String,
                default: 'text',
                required: true,
            },
        },
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

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
            display: flex;
            justify-content: center;
            align-items: center;

            width: 115px;
            height: 115px;

            border-radius: 50%;

            background-color: #{$color__main}80;

            > img {
                height: 70%;
            }
        }

        > span.informations {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            > p {
                margin: 0;
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
