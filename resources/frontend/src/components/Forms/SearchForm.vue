<template>
    <form @submit.prevent="submitForm" id="Search-form" method="get">
        <TextInput
            class="search-input"
            name="search"
            title="Search"
            placeholder="Search"
            v-model:value="query"
            @onInput="query = $event">
        </TextInput>
        <SearchCircleBtnSCT :isDisabled="!isFilled"></SearchCircleBtnSCT>
    </form>
</template>

<script>
import TextInput from "../Inputs/Themed/TextInput";
import SearchCircleBtnSCT from "../Buttons/SearchCircleBtnSCT";

export default {
    name: "SearchForm",
    components: { TextInput, SearchCircleBtnSCT },
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

    > .search-input {
        width: 90%;
    }
}
</style>
