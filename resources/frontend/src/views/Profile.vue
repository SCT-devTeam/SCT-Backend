<template>
    <div id="profile">
        <ProfileCard></ProfileCard>
        <CompanionCard></CompanionCard>
    </div>
</template>

<script>
import ProfileCard from "../components/ProfileCard";
import CompanionCard from "../components/CompanionCard";

export default {
    name: "Profile",
    components: { ProfileCard, CompanionCard }
};
</script>

<style scoped lang="scss">
div#profile {
    display: flex;
    justify-content: space-around;
}
</style>
