<template>
    <form id="Search-form" @submit.prevent="submitForm" method="get">
        <SearchSCT
            @valueChanged="query = $event"
            id="search-input"
        ></SearchSCT>
        <SearchCircleBtnSCT
            :isDisabled="!isFilled"
        ></SearchCircleBtnSCT>
    </form>
</template>

<script>
    import SearchSCT from "../inputs/SearchSCT";
    import SearchCircleBtnSCT from "../Buttons/SearchCircleBtnSCT";

    export default {
        name: "SearchForm",
        components: {SearchSCT, SearchCircleBtnSCT},
        data() {
            return {
                query: '',
            }
        },
        computed: {
            isFilled: function () {
                return this.query !== '';
            },
        },
        methods: {
            submitForm: function () {
                if (this.query !== '') {
                    this.$emit("search", this.query);
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    form#Search-form {
        display: flex;

        > #search-input {
            width: 90%;
        }
    }
</style>
