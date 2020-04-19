<template>
    <div class="table">
        <span class="table__head">
            <p
                :key="index"
                :style="{ flex: column.size }"
                v-for="(column, index) in columns"
            >
                {{ column.name }}
            </p>
        </span>
        <div class="table__content">
            <span
                :key="item.id"
                @click="$emit('itemClicked', item.id)"
                class="table-content__item"
                v-for="item in data"
            >
                <p
                    :key="index"
                    :style="{ flex: columnSize(index) }"
                    v-for="(column, index) in itemColumns(item)"
                >
                    {{ column.value }}
                </p>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "TableSCT",
    props: {
        columns: {
            type: Array,
            required: true,
            validator: function(value) {
                if (!Array.isArray(value)) {
                    return false;
                }

                for (const objIndex in value) {
                    if (
                        // eslint-disable-next-line
                        !Object.prototype.hasOwnProperty.call(value[objIndex], "name") ||
                        // eslint-disable-next-line
                        !Object.prototype.hasOwnProperty.call(value[objIndex], "size")
                    ) {
                        // TODO: return validation error

                        if (
                            !typeof value[objIndex].name === "string" ||
                            !typeof value[objIndex].size === "string"
                        )
                            return false;
                    }
                }

                return true;
            }
        },
        data: {
            type: Array[Object],
            required: true
        },
        dataPropertyMapping: {
            type: Object,
            required: true
        }
    },
    methods: {
        columnSize(index) {
            return this.columns[index].size;
        },
        itemColumns(item) {
            let itemColumn = [];
            let returnedValues = [];

            // For each property of the item
            for (const property in item) {
                // Check if this property is mappable with a column
                for (const propertyToBind in this.dataPropertyMapping) {
                    if (property === propertyToBind)
                        itemColumn.push({
                            name: this.dataPropertyMapping[propertyToBind],
                            value: item[property]
                        });
                }
            }

            this.columns.forEach(col => {
                let found = false;
                itemColumn = itemColumn.filter(item => {
                    if (!found && item.name === col.name) {
                        returnedValues.push(item);
                        found = true;
                        return false;
                    } else return true;
                });
            });

            if (
                Object.prototype.hasOwnProperty.call(
                    this.dataPropertyMapping,
                    "amount"
                )
            ) {
                let amount = 0;

                if (this.dataPropertyMapping.amount[2]) {
                    item[this.dataPropertyMapping.amount[0]].forEach(item => {
                        amount +=
                            item[this.dataPropertyMapping.amount[1]] *
                            item[this.dataPropertyMapping.amount[2]];
                    });
                } else {
                    item[this.dataPropertyMapping.amount[0]].forEach(item => {
                        amount += item[this.dataPropertyMapping.amount[1]];
                    });
                }

                amount = Math.round(amount * 100) / 100;

                returnedValues.push({
                    name: "Amount",
                    value: amount
                });
            }

            return returnedValues;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

div.table {
    display: flex;
    flex-direction: column;

    position: relative;

    height: 100%;
    max-height: calc(100% - 130px);
    width: 100%;

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
        }
    }

    > span.table__head {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;

        height: 60px;

        border-radius: 15px 15px 0 0;

        background: $color__main;

        > p {
            font-family: $font__heading;
            font-size: 2rem;
        }
    }

    > div.table__content {
        height: 100%;
        width: 100%;

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

        > span.table-content__item {
            height: 50px;

            padding-right: calc(5% - 10px);

            cursor: pointer;

            > p {
                font-family: $font__text;
                font-size: 1rem;
            }
        }
    }
}
</style>
