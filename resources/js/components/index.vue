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
    <!-- TOP POPULAR ANIMES INIT START -->
    <!-- <top-animes></top-animes> -->
    <!-- TOP POPULAR ANIMES INIT END -->
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
        Footer
    },
    mounted() {
        document.title = `Смотреть аниме онлайн бесплатно в хорошем качестве`;
        sessionStorage.removeItem("CurrentAnime");
        console.log('Index Mounted!');
        window.scrollTo({ top: 0});
    }
}
</script>

<style lang="scss" scoped>
</style>
