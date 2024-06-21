<template>
    <primary-header></primary-header>
    <v-container style="max-width: var(--ota-ku-max-width); padding: 20px 10px 0 10px; align-items: center;">
        <v-breadcrumbs :items="['Главная Страница', 'Каталог']" class="pa-0" style="font-size: 0.8em">
            <template v-slot:divider>
                <v-icon icon="mdi-chevron-right" color="#9e9e9e"></v-icon>
            </template>
        </v-breadcrumbs>
        <Anime-catalog></Anime-catalog>
    </v-container>
</template>

<script>
import { useHead } from "@vueuse/head";

import PrimaryHeader from "@/components/web/PrimaryHeader.vue";
// import Search from "@/components/web/catalog/search.vue";
// import AnimeCatalog from "@/components/web/catalog/animeCatalog.vue";
// import Footer from '@/components/web/Footer.vue';
import AnimeCatalog from '@/components/web/AnimeCatalog.vue';

export default {
    components: {
        // Welcome,
        // AnimeCatalog,
        PrimaryHeader,
        AnimeCatalog,
        // Search,
    },
    mounted() {
        useHead({
            title: "Лучший aниме каталог",
            meta: [
                {name: 'description', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме'},
                {
                    name: 'keywords',
                    content: 'ota-ku, аниме смотреть, аниме, лучшие аниме онлайн бесплатно, ота-ку, сайт аниме отаку, лучшие топ аниме смотреть'
                },
                {name: 'subject', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме'},
                {name: 'language', content: 'RU'},
                {name: 'abstract', content: 'Смотреть лучшие аниме на русском'},
                {
                    name: 'topic',
                    content: 'ota-ku, аниме смотреть, аниме, лучшие аниме онлайн бесплатно, ота-ку, сайт аниме отаку, лучшие топ аниме смотреть'
                },
                {name: 'summary', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме'},
                {property: 'og:type', content: 'website'},
                {property: 'og:url', content: 'https://ota-ku.ru'},
                {property: 'og:title', content: 'Лучший aниме каталог'},
                {property: 'og:description', content: 'лучший аниме каталог для поиска и фильтраци любимых аниме'},
                {property: 'og:image', content: 'https://ota-ku.ru/favicon.ico'},
                {property: 'og:locale', content: 'ru_RU'},
                {property: 'og:site:name', content: 'ota-ku'}
            ]
        });
    }
}
</script>

<style lang="scss" scoped>
</style>
