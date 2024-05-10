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
import { useHead } from "@vueuse/head";

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
        window.scrollTo({ top: 0});
        useHead({
            title: "Лучший aниме каталог",
            meta: [
                { name: 'description', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме'},
                { name: 'keywords', content: 'ota-ku, аниме смотреть, аниме, лучшие аниме онлайн бесплатно, ота-ку, сайт аниме отаку, лучшие топ аниме смотреть'},
                { name: 'subject', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме'},
                { name: 'language', content: 'RU'},
                { name: 'abstract', content: 'Смотреть лучшие аниме на русском'},
                { name: 'topic', content: 'ota-ku, аниме смотреть, аниме, лучшие аниме онлайн бесплатно, ота-ку, сайт аниме отаку, лучшие топ аниме смотреть'},
                { name: 'summary', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме' },
                { property: 'og:type', content: 'website' },
                { property: 'og:url', content: 'https://ota-ku.ru' },
                { property: 'og:title', content: 'Лучший aниме каталог' },
                { property: 'og:description', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме' },
                { property: 'og:image', content: 'https://ota-ku.ru/favicon.ico' },
                { property: 'og:locale', content: 'ru_RU' },
                { property: 'og:site:name', content: 'ota-ku' }
            ]
        });
    }
}
</script>

<style lang="scss" scoped>
</style>
