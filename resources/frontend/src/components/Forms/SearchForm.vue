<template>
    <form @submit.prevent="submitForm" id="Search-form" method="get">
        <SearchSCT @valueChanged="query = $event" id="search-input"></SearchSCT>
        <SearchCircleBtnSCT :isDisabled="!isFilled"></SearchCircleBtnSCT>
    </form>
</template>

<script>
import SearchSCT from "../Inputs/SearchSCT";
import SearchCircleBtnSCT from "../Buttons/SearchCircleBtnSCT";

export default {
    name: "SearchForm",
    components: { SearchSCT, SearchCircleBtnSCT },
    data() {
        return {
            query: ""
        };
    },
    computed: {
        isFilled: function() {
            return this.query !== "";
        }
    },
    methods: {
        submitForm: function() {
            if (this.query !== "") {
                this.$emit("search", this.query);
            }
        }
    }
};
</script>

<style lang="scss" scoped>
form#Search-form {
    display: flex;

    > #search-input {
        width: 90%;
    }
}
</style>
