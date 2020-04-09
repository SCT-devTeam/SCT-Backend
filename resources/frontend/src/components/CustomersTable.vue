<template>
    <div id="Customers-table">
        <span id="head">
            <p class="type">Type</p>
            <p class="name">Name</p>
            <p class="address">Address</p>
            <p class="status">Status</p>
        </span>
        <div id="container">
            <span
                :key="index"
                class="line"
                v-for="(customer, index) in this.customers"
            >
                <p class="type">{{ customer.type }}</p>
                <p class="name">{{ customer.name }}</p>
                <p class="address">{{ customer.address }}</p>
                <p class="status">{{ customer.status }}</p>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CustomersTable",
        data() {
            return {
                customers: [
                    {
                        id: 0,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 1,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 2,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 3,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 4,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 5,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 6,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 7,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 7,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 8,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 9,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 10,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 11,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 12,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    },
                    {
                        id: 13,
                        type: "Professional",
                        name: "John Doe",
                        address: "123 avenue of imagination, 46664 DREAM",
                        status: "Prospect"
                    }
                ]
            };
        }
    };
</script>

<style lang="scss" scoped>
    @import "src/scss/colors";
    @import "src/scss/typography";

    div#Customers-table {
        display: flex;
        flex-direction: column;

        position: relative;

        max-height: calc(100% - 130px);

        padding-top: 60px;

        border-radius: 15px;

        background: #fff;

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);

        span {
            display: flex;
            align-items: center;

            max-width: 100%;

            margin-bottom: 10px;
            padding: 0 5%;

            background-color: #ececec80;

            > p {
                flex: 1;

                &.address {
                    flex: 2;
                }
            }
        }

        > span#head {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;

            height: 60px;

            border-radius: 15px 15px 0 0;

            background: $color__main;

            > p {
                font-family: $font__heading;
                font-size: 2em;
            }
        }

        > div#container {
            overflow-y: scroll;

            scrollbar-color: $color__inactive_subtitle;
            scrollbar-width: 10px;

            &::-webkit-scrollbar {
                width: 10px;
            }

            &::-webkit-scrollbar-thumb {
                border-radius: 5px;

                background-color: $color__inactive_subtitle;
            }

            &::-webkit-scrollbar-track {
                border-radius: 5px;

                background-color: #{$color__inactive_subtitle}49;
            }

            > span.line {
                height: 50px;

                padding-right: calc(5% - 10px);

                > p {
                    font-family: $font__text;
                    font-size: 1em;
                }
            }
        }
    }
</style>
