<template>
    <!-- PRIMARY HEADER INIT START-->
    <primary-header></primary-header>
    <!-- PRIMARY HEADER INIT END -->
    <!-- TOP SLIDER INIT START -->
    <top-slider></top-slider>
    <!-- TOP SLIDER INIT END -->
    <!-- MOST ANIMES INIT START -->
    <most-animes></most-animes>
    <!-- MOST ANIMES INIT END-->
    <div class="ad-container">
        <div class="ad-container-inner">
            <div class="ad-container-inner-tit">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8586315114228333"
                     data-ad-slot="8268539420"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
            </div>
        </div>
    </div>
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
    <!-- ANIME WELCOME INIT START -->
    <Welcome></Welcome>
    <!-- ANIME WELCOME INIT END -->
    <!-- FOOTER INIT START -->
    <Footer></Footer>
    <!-- FOOTER INIT END -->
</template>

<script>
import {useHead} from "@vueuse/head";

import TopSlider from './web/topSlider.vue';
import PrimaryHeader from './web/primaryHeader.vue';
import MostAnimes from './web/mostAnimes.vue';
import Content from './web/animeList.vue';
import Filter from './web/filter.vue';
import Welcome from './web/welcome.vue';
import Footer from './web/footer.vue';

export default {
    components: {
        PrimaryHeader,
        TopSlider,
        MostAnimes,
        Content,
        Filter,
        Welcome,
        Footer,
    },
    mounted() {
        sessionStorage.removeItem("CurrentAnime");
        console.log('Index Mounted!');
        (adsbygoogle = window.adsbygoogle || []).push({});
        window.scrollTo({top: 0});
        useHead({
            title: "Смотреть аниме онлайн бесплатно в хорошем качестве",
            meta: [
                {
                    name: 'description',
                    content: 'Хочешь смотреть лучшие аниме онлайн бесплатно на русском? У нас ты найдешь огромную базу самых популярных аниме с качественной русской озвучкой! Наслаждайся захватывающими приключениями, яркими персонажами и захватывающим сюжетом, не отходя от экрана. Мы предлагаем только лучшие аниме в HD качестве, чтобы ты мог полностью погрузиться в мир японской анимации. Забудь о поиске по разным сайтам – у нас все аниме собраны на одной платформе! Присоединяйся к нам прямо сейчас и окунись в увлекательный мир аниме без каких-либо ограничений!'
                },
                {
                    name: 'keywords',
                    content: 'ota-ku, аниме смотреть, аниме, лучшие аниме онлайн бесплатно, ота-ку, сайт аниме отаку, лучшие топ аниме смотреть'
                },
                {name: 'subject', content: 'Смотреть лучшие аниме онлайн бесплатно на русском!'},
                {name: 'language', content: 'RU'},
                {name: 'abstract', content: 'Смотреть лучшие аниме на русском'},
                {
                    name: 'topic',
                    content: 'ota-ku, аниме смотреть, аниме, лучшие аниме онлайн бесплатно, ота-ку, сайт аниме отаку, лучшие топ аниме смотреть'
                },
                {name: 'summary', content: 'Смотреть лучшие аниме онлайн бесплатно на русском!'},
                {property: 'og:type', content: 'website'},
                {property: 'og:url', content: 'https://ota-ku.ru'},
                {property: 'og:title', content: 'ota-ku Смотреть лучшие аниме онлайн бесплатно на русском!'},
                {
                    property: 'og:description',
                    content: 'Хочешь смотреть лучшие аниме онлайн бесплатно на русском? У нас ты найдешь огромную базу самых популярных аниме с качественной русской озвучкой!'
                },
                {property: 'og:image', content: 'https://ota-ku.ru/favicon.ico'},
                {property: 'og:locale', content: 'ru_RU'},
                {property: 'og:site:name', content: 'ota-ku'}
            ]
        });
    },
}
</script>

<style lang="scss" scoped>
</style>
