<template>
    <div id="profile-card">
        <img
            alt="QR Code"
            src="https://www.unitag.io/qreator/generate?crs=Ppv8rOENN3V1lAwTz82zPpEYgrTpeQPpAxSJGcmyf1zqoOPAufHCjI4ccbj8leQIffpWitL50YSc%252FcPVAqhvQcY8L%252ByEXXE2GKn8SsxpZk4WZaQp7PKE7yfTgH2P3e9CKW00WL5%252F1cMS7FElOQtZuX8mpOG0vfXH1R11ooGrRdY%253D&crd=mXKe51B3LcpJnGj6pepi6TUfOvauYd5GOY74zYl4hJe9g5am9JrXgtoCYhiudFQ1achjJe72xIAyoHp9vjpe2w%253D%253D"
        />

        <TextFiledSCT
            :defaultValue="device.name"
            :key="index"
            @iconClicked="removeDevice(device.id)"
            class="filed"
            icon="cross_icon_blue"
            name="Device name"
            title="Device name"
            v-for="(device, index) in devices"
        ></TextFiledSCT>
    </div>
</template>

<script>
import TextFiledSCT from "./Fileds/Themed/Display/TextFiled";

export default {
    name: "CompanionCard",
    components: { TextFiledSCT },
    data() {
        return {
            isEditionMode: false,
            devices: [
                {
                    name: "phone-1",
                    id: 1
                },
                {
                    name: "phone-2",
                    id: 2
                }
            ]
        };
    },
    methods: {
        removeDevice: function(device_id) {
            // TODO: API request
        }
    }
};
</script>

<style lang="scss" scoped>
@import "src/scss/colors";
@import "src/scss/typography";

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
        font-size: 1.2rem;
    }

    > div.filed {
        width: 85%;
    }
}
</style>
