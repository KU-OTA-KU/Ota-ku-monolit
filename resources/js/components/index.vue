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
                <content></content>
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
// import TopAnimes from './web/popularAnimes.vue';
import content from './web/animeList.vue';
import Filter from './web/filter.vue';
import Welcome from './web/welcome.vue';
import Footer from './web/footer.vue';

export default {
    components: {
        PrimaryHeader,
        TopSlider,
        MostAnimes,
        // TopAnimes,
        content,
        Filter,
        Welcome,
        Footer
    },
    mounted() {
        console.log('Component mounted.');
    }
}
</script>

<style>
.main {
    width: 100%;
    flex: 1;
}

.main-inner {
    width: 100%;
    padding: 0 10px;
}

.main-tit {
    max-width: 1500px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 10px;
}

@media screen and (max-width: 1024px) {
    .main-tit {
        flex-direction: column-reverse;
    }
}
</style>
