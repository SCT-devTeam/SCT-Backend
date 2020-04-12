<template>
    <form @submit.prevent="submitForm" id="Search-form" method="get">
        <TextInput
            class="search-input"
            name="search"
            title="Search"
            placeholder="Search"
            :enableValidation="false"
            v-model="query"
            @onInput="query = $event"
        >
        </TextInput>

        <BtnIcon
            name="Search"
            title="Start search"
            value="search"
            iconName="search_icon_blue"
            bg-color="--colors-main"
            @clicked="$emit('startSearch')"
            :isDisabled="!isFilled"
        ></BtnIcon>
    </form>
</template>

<script>
import TextInput from "../Fileds/Themed/Inputs/TextInput";
import BtnIcon from "../Buttons/BtnIcon";

export default {
    name: "SearchForm",
    components: { TextInput, BtnIcon },
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
    align-items: center;

    > .search-input {
        width: 90%;
    }
}
</style>
