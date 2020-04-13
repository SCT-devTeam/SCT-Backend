<template>
    <form @submit.prevent="submitForm" id="Search-form" method="get">
        <TextInput
            :enableValidation="false"
            @onInput="query = $event"
            class="search-input"
            name="search"
            placeholder="Search"
            title="Search"
            v-model="query"
        >
        </TextInput>

        <BtnIcon
            :isDisabled="!isFilled"
            @clicked="$emit('search')"
            class="btn"
            bg-color="--colors-secondary-principal"
            iconName="search_icon_white"
            name="Search"
            title="Start search"
            value="search"
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

    > .btn {
        height: 3rem;
        max-height: 100%;
        width: 3rem;
        max-width: 100%;

        margin-left: 25px;
    }
}
</style>
