<template>
    <nav id="Secondary-menu">
        <ul>
            <li v-for="item in items" @click="itemClicked(item)" :class="{'active': currentItemNav === item}">{{item}}</li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "SecondaryMenu",
        data() {
            return {
                currentItemNav: this.items[0],
            }
        },
        props: {
            items: {
                type: Array,
                required: true,
            }
        },
        methods: {
            itemClicked: function (itemName) {
                if (itemName !== this.currentItemNav) {
                    this.$emit('navigationChanged', itemName);
                }
                this.currentItemNav = itemName;
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";
    nav#Secondary-menu {
        display: flex;
        justify-content: center;
        align-items: center;

        > ul {
            display: flex;
            justify-content: space-between;
            align-items: center;

            height: fit-content;
            width: fit-content;

            margin: 0;
            padding: 0 5px;

            border-radius: 25px;

            background-color: $color__secondary;

            list-style: none;

            > li {
                position: relative;
                z-index: 1;

                margin: 0;
                padding: 10px;

                border-radius: 25px;

                color: white;
                font-family: $font__text;
                font-size: 1em;

                cursor: pointer;

                &:first-child {
                    margin-right: 10px;
                }

                &:last-child {
                    margin-left: 10px;
                }

                &.active {
                    color: $color__black;

                    &:before {
                        content: '';
                        position: absolute;
                        top: 5px;
                        bottom: 5px;
                        left: 3px;
                        right: 3px;
                        z-index: -1;

                        border-radius: 25px;

                        background-color: white;
                    }
                }
            }
        }
    }
</style>
