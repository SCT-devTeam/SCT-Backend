<template>
    <nav id="Main-menu">
        <router-link :to="{ name: 'Dashboard' }" class="SCT-logo_link">
            <img
                class="SCT-logo_img"
                src="../../assets/logos/sct_logo_colored_roundedWithoutSubtitle.png"
                alt="SCT's logo"
                srcset="../../assets/logos/sct_logo_colored_roundedWithoutSubtitle.svg"
            />
        </router-link>

        <ul class="menu">
            <li>
                <img
                    src="../../assets/icons/dashboard_icon_blue.png"
                    alt="Dashboard icon"
                    srcset="../../assets/icons/dashboard_icon_blue.svg"
                />
                <router-link :to="{ name: 'Dashboard' }" data-title="Dashboard"
                    >Dashboard</router-link
                >
            </li>
            <li>
                <img
                    src="../../assets/icons/avatar_icon_blue.png"
                    alt="Customer icon"
                    srcset="../../assets/icons/avatar_icon_blue.svg"
                />
                <router-link :to="{ name: 'Customers' }" data-title="Customers"
                    >Customers</router-link
                >
            </li>
            <li>
                <img
                    src="../../assets/icons/invoice_icon_blue.png"
                    alt="Invoice icon"
                    srcset="../../assets/icons/invoice_icon_blue.svg"
                />
                <router-link :to="{ name: 'Writings' }" data-title="Writings"
                    >Writings</router-link
                >
            </li>
            <li>
                <img
                    src="../../assets/icons/book_icon_blue.png"
                    alt="Receipt icon"
                    srcset="../../assets/icons/book_icon_blue.svg"
                />
                <router-link
                    :to="{ name: 'ReceiptBook' }"
                    data-title="Receipt book"
                    >Receipt book</router-link
                >
            </li>
        </ul>

        <router-link :to="{ name: 'Profile' }" class="Profile_link">
            <img
                class="SCT-logo_img"
                src="../../assets/Artboards_Diversity_Avatars_by_Netguru-05.png"
                alt="Profile picture"
            />
        </router-link>
    </nav>
</template>

<script>
export default {
    name: "MainMenu"
};
</script>

<style scoped lang="scss">
@import "src/sass/colors";
@import "src/sass/typography";

nav#Main-menu {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;

    z-index: 1;

    width: 60px;

    margin: 10px;
    padding: 10px;

    border-radius: 50px;

    background: $color__main;

    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

    > a.SCT-logo_link {
        border-radius: 50px;

        > img.SCT-logo_img {
            width: 60px;
            height: 60px;
            border: 2px solid $color__secondary;
            border-radius: 50px;
        }
    }

    ul.menu {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        width: 100%;

        margin: 0;
        padding: 0;

        list-style: none;

        > li {
            display: flex;
            justify-content: center;
            align-items: center;

            position: relative;

            height: 45px;
            width: 100%;

            margin: 15px 0;

            > img {
                max-height: 45px;
                max-width: 45px;
            }

            > a {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;

                font-family: $font__heading;
                color: transparent;
                text-decoration: none;

                word-break: break-all;

                &:hover:after {
                    content: attr(data-title);
                    position: absolute;
                    left: 70px;
                    top: 50%;
                    transform: translateY(-50%);

                    width: max-content;

                    padding: 10px;

                    border-radius: 0 10px 10px 0;

                    background-color: $color__main;

                    color: $color__black;
                    font-family: $font__text;
                    font-size: 1.2em;
                }

                &.router-link-exact-active:before {
                    content: "";
                    position: absolute;
                    right: -5px;
                    top: 5px;
                    bottom: 5px;

                    width: 5px;

                    border-radius: 2.5px;

                    background-color: white;
                }
            }
        }
    }

    > a.Profile_link {
        display: flex;
        justify-content: center;
        align-items: center;

        position: relative;

        width: 60px;
        height: 60px;

        background-color: white;

        border: 2px solid $color__secondary;
        border-radius: 50px;

        > img {
            max-width: 100%;
            max-height: 100%;
        }

        &:after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;

            height: 20px;
            width: 20px;

            border-radius: 20px;

            background-color: white;
            background-image: url("../../assets/icons/settings_icon_blue.png");
            background-position: center;
            background-size: 80%;
            background-repeat: no-repeat;
        }
    }
}
</style>
