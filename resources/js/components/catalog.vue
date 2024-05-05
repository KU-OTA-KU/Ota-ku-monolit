<template>
    <!-- PRIMARY HEADER INIT START-->
    <primary-header></primary-header>
    <!-- PRIMARY HEADER INIT END -->
    <!-- TOP GENRES LIST INIT START -->
    <top-genres></top-genres>
    <!-- TOP GENRES LIST INIT END-->
    <!-- MAIN ANIMES INIT START-->
    <main class="main">
        <div class="main-inner">
            <div class="main-tit">
                <Content></Content>
                <Filter></Filter>
            </div>
        </div>
    </main>
    <!-- MAIN ANIMES INIT END -->
</template>

<script>
import TopGenres from '@/components/web/topGenres.vue';
import PrimaryHeader from "@/components/web/primaryHeader.vue";
import Content from "@/components/web/catalog.vue";
import Filter from "@/components/web/filter.vue";

export default {
    components: {
        Filter, Content,
        PrimaryHeader,
        TopGenres,
    },
    mounted() {
        console.log('catalog Mounted!');
        let headerNavigation = document.querySelector(".header-navigation");
        headerNavigation.style.display = "none";
    }
}
</script>

<style lang="scss" scoped>
</style>
