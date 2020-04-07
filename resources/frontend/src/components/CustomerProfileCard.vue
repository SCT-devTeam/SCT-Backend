<template>
    <div id="profile-card">
        <img src="@/assets/Artboards_Diversity_Avatars_by_Netguru-29.png" alt="Picture of the customer">

        <DropdownSCT
            label="Customer Status"
            title="Select customer status"
            defaultOption="Prospect"
        ></DropdownSCT>

        <DropdownSCT
            label="Customer type"
            title="Select customer type"
            :options="['individual', 'professional']"
        ></DropdownSCT>

        <div id="name">
            <TextSCT
                name="FirstName"
                title="FirstName"
                placeholder="FirstName"
                label="FirstName"
                v-bind:defaultValue="entity.firstName"
                v-bind:isEditable="isEditionMode"
            ></TextSCT>

            <TextSCT
                name="LastName"
                title="LastName"
                placeholder="LastName"
                label="LastName"
                v-bind:defaultValue="entity.lastName"
                v-bind:isEditable="isEditionMode"
            ></TextSCT>
        </div>

        <p class="title">Contacts</p>

        <TextFiledSCT class="filed" @iconClicked="displayContact" v-for="contact in entity.contacts" :defaultValue="contact.firstName + ' ' + contact.lastName" displayIcon="true"></TextFiledSCT>

        <p class="title">Notes</p>

        <!-- TODO: replace it by text area -->
        <TextSCT
            name="Notes"
            title="Notes"
            placeholder="Notes"
            label="Notes"
            v-bind:defaultValue="entity.notes"
            v-bind:isEditable="isEditionMode"
        ></TextSCT>
    </div>
</template>

<script>
    import DropdownSCT from "./inputs/DropdownSCT";
    import TextSCT from "./inputs/TextSCT";
    import TextFiledSCT from "./DisplayTexts/TextFiledSCT";

    export default {
        name: "ProfileCard",
        components: { DropdownSCT, TextSCT, TextFiledSCT },
        data() {
            return {
                isEditionMode: false,
                entity: {
                    status: 'Prospect',
                    firstName: 'John',
                    lastName: 'Doe',
                    contacts: [
                        {
                            firstName: 'John',
                            lastName: 'Doe',
                            notes: 'Here\'s some notes',
                        },
                        {
                            firstName: 'Jan',
                            lastName: 'Doe',
                            notes: 'Silence is golden'
                        }
                    ]
                }
            }
        },
        methods: {
            displayContact: function () {
                console.log('display contact');
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "src/sass/colors";
    @import "src/sass/typography";

    div#profile-card {
        display: flex;
        flex-direction: column;
        align-items: center;

        padding: 10px;

        border-radius: 15px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);

        > img {
            max-width: 150px;
            max-height: 150px;

            margin-bottom: 10px;

            border-radius: 50%;
            border: 2px solid #2f3e55;
        }

        > div.Input-dropdown {
            width: 70%;
            margin-bottom: 25px;
        }

        > div#name {
            display: flex;
            width: 90%;
        }

        > p.title {
            width: 100%;

            padding-left: 10%;

            font-family: $font__text;
            font-size: 1.2em;
        }

        > div.filed {
            width: 85%;
        }
    }
</style>
