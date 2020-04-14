<template>
    <div id="widget">
        <span id="informations">
            <p id="informations__indicator">{{ indicator }}</p>
            <p id="informations__text">{{ text }}</p>
        </span>
        <span id="graph">
            <img alt="graph placeholder" src="../../assets/graph.png" />
        </span>
    </div>
</template>

<script>
export default {
    name: "GraphDashboardWidget",
    props: {
        indicator: {
            type: Number,
            default: 0,
            required: true
        },
        text: {
            type: String,
            default: "text",
            required: true
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div#widget {
    display: flex;
    flex-direction: column;

    min-height: 300px;
    height: 100%;
    min-width: 600px;
    width: 90%;

    border-radius: 15px;

    background: #fff;

    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);

    > span#informations {
        display: flex;
        justify-content: center;
        align-items: center;

        height: 20%;
        width: 100%;

        border-radius: 15px 15px 0 0;

        background-color: $color__main;

        > p {
            margin: 0;
            /*text-align: center;*/
        }

        > p#informations__indicator {
            font-family: $font__text;
            font-weight: bold;
            font-size: 2rem;
            color: $color__black;
        }

        > p#informations__text {
            margin-left: 20px;

            font-family: $font__text;
            font-size: 1.5rem;
            color: $color__black;
        }
    }

    > span#graph {
        display: flex;
        justify-content: center;
        align-items: center;

        height: 80%;
        width: 100%;

        border-radius: 0 0 15px 15px;

        > img {
            height: 90%;
            max-width: 90%;
        }
    }
}
</style>
