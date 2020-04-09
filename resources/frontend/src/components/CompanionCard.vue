<template>
    <div id="profile-card">
        <img src='https://www.unitag.io/qreator/generate?crs=Ppv8rOENN3V1lAwTz82zPpEYgrTpeQPpAxSJGcmyf1zqoOPAufHCjI4ccbj8leQIffpWitL50YSc%252FcPVAqhvQcY8L%252ByEXXE2GKn8SsxpZk4WZaQp7PKE7yfTgH2P3e9CKW00WL5%252F1cMS7FElOQtZuX8mpOG0vfXH1R11ooGrRdY%253D&crd=mXKe51B3LcpJnGj6pepi6TUfOvauYd5GOY74zYl4hJe9g5am9JrXgtoCYhiudFQ1achjJe72xIAyoHp9vjpe2w%253D%253D' alt='QR Code'/>

        <TextFiledSCT
            v-for="device in devices"

            @iconClicked="removeDevice(device.id)"
            :defaultValue="device.name"
            icon="cross"
            class="filed"
        ></TextFiledSCT>
    </div>
</template>

<script>
    import DropdownSCT from "./inputs/DropdownSCT";
    import TextSCT from "./inputs/TextSCT";
    import TextFiledSCT from "./DisplayTexts/TextFiledSCT";
    import EditCircleBtnSCT from "./Buttons/EditCircleBtnSCT";
    import ValidationCircleBtnSCT from "./Buttons/ValidationCircleBtnSCT";

    export default {
        name: "CompanionCard",
        components: { DropdownSCT, TextSCT, TextFiledSCT, EditCircleBtnSCT, ValidationCircleBtnSCT },
        data() {
            return {
                isEditionMode: false,
                devices: [
                    {
                        name: 'phone-1',
                        id: 1,
                    },
                    {
                        name: 'phone-2',
                        id: 2,
                    }
                ]
            }
        },
        methods: {
            removeDevice: function (device_id) {
                console.log("Remove device ", device_id);
            },
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
