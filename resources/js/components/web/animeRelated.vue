<template>
    <section class="animes-related" v-if="!_ANIME_RELATED_">
        <div class="animes-related-inner">
            <div class="animes-related-tit">
                <div class="related-animes-list-title">
                    <h2>Связенное</h2>
                    <h6>Аниме Связенные с франшизой</h6>
                </div>
                <div class="related-animes-container">
                    <div class="related-animes-block">
                        <div
                            class="related-animes-name skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></div>
                        <div class="related-animes-info">
                            <div
                                class="related-animes-info-image skeleton-cell-slide skeleton-weight skeleton-bg"></div>
                            <div class="related-animes-type-year">
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                            </div>
                        </div>
                    </div>
                    <div class="related-animes-block">
                        <div
                            class="related-animes-name skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></div>
                        <div class="related-animes-info">
                            <div
                                class="related-animes-info-image skeleton-cell-slide skeleton-weight skeleton-bg"></div>
                            <div class="related-animes-type-year">
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                            </div>
                        </div>
                    </div>
                    <div class="related-animes-block">
                        <div
                            class="related-animes-name skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></div>
                        <div class="related-animes-info">
                            <div
                                class="related-animes-info-image skeleton-cell-slide skeleton-weight skeleton-bg"></div>
                            <div class="related-animes-type-year">
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                            </div>
                        </div>
                    </div>
                    <div class="related-animes-block">
                        <div
                            class="related-animes-name skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></div>
                        <div class="related-animes-info">
                            <div
                                class="related-animes-info-image skeleton-cell-slide skeleton-weight skeleton-bg"></div>
                            <div class="related-animes-type-year">
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                            </div>
                        </div>
                    </div>
                    <div class="related-animes-block">
                        <div
                            class="related-animes-name skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></div>
                        <div class="related-animes-info">
                            <div
                                class="related-animes-info-image skeleton-cell-slide skeleton-weight skeleton-bg"></div>
                            <div class="related-animes-type-year">
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                                <p class="skeleton-cell-slide skeleton-height skeleton-weight skeleton-bg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="animes-related" v-if="_ANIME_RELATED_">
        <div class="animes-related-inner">
            <div class="animes-related-tit">
                <div class="related-animes-list-title">
                    <h2>Связенное</h2>
                    <h6>Аниме Связенные с франшизой</h6>
                </div>
                <div class="related-animes-container">
                    <div class="related-animes-block" v-for="(relatedAnime, index) in _ANIME_RELATED_" :key="index"
                         @click="goToAnime(relatedAnime.anime.id)">
                        <div class="related-animes-name">
                            <p :to="'/anime?animeId=' + relatedAnime.anime.id">{{ relatedAnime.anime.russian }}</p>
                        </div>
                        <div class="related-animes-info">
                            <div class="related-animes-info-image">
                                <img :src="relatedAnime.anime.poster.mini2xUrl" :alt="relatedAnime.anime.russian">
                            </div>
                            <div class="related-animes-type-year">
                                <p>{{ relatedAnime.anime.kind }}</p>
                                <p>{{ relatedAnime.anime.airedOn.year }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            _ANIME_RELATED_: null,
        };
    },
    methods: {
        main() {
            const storedData = sessionStorage.getItem("CurrentAnime");
            if (storedData) {
                this._ANIME_RELATED_ = JSON.parse(storedData)[0].related.filter(anime => anime.anime && anime.anime.id);
            }
            console.log(this._ANIME_RELATED_);
        },
        goToAnime(animeId) {
            this.$router.push(`/anime?animeId=${animeId}`);
            window.scrollTo({top: 0});
        },
    }
}
</script>

<style lang="scss">
.animes-related {
    width: 100%;
}

.animes-related .animes-related-inner {
    width: 100%;
    padding: 0 10px;
}

.animes-related-inner .animes-related-tit {
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
}

.related-animes-container {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(6, minmax(100px, 1fr));
    gap: 10px;
    position: relative;
}

.related-animes-container .related-animes-block {
    display: flex;
    flex-direction: column;
    gap: 5px;
    max-width: 200px;
    width: 100%;
    cursor: pointer;
}

.related-animes-block:hover .related-animes-name {
    color: #2786e4 !important;
}

.related-animes-list-title {
    margin-bottom: 5px;
}

.related-animes-list-title h6 {
    font-weight: normal;
    color: var(--related-anime-title-h6-color);
}

.related-animes-container .related-animes-block .related-animes-name {
    font-size: 1em;
    max-width: 200px;
text-decoration: underline;
    text-align: left;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: color 0.2s ease-in-out;
    cursor: pointer;
}

.related-animes-container .related-animes-block .related-animes-name:hover {
    color: var(--related-anime-continer-animes-name-link-hover-color);
}

.related-animes-container .related-animes-block .related-animes-info {
    display: flex;
    gap: 5px;
}

.related-animes-info .related-animes-info-image {
    width: 40%;
    aspect-ratio: 1 / 1.5;
    position: relative;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.related-animes-info .related-animes-info-image img {
    position: absolute;
    width: 100%;
    height: 100%;
}

.related-animes-type-year {
    width: 70%;
}

.related-animes-type-year p {
    margin-bottom: 5px;
    font-size: 0.8em;
    text-align: left;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: flex;
    align-items: center;
}

@media screen and (max-width: 1210px) {
    .related-animes-container {
        grid-template-columns: repeat(5, minmax(100px, 1fr)) !important;
    }
}

@media screen and (max-width: 1024px) {
    .related-animes-container {
        grid-template-columns: repeat(4, minmax(100px, 1fr)) !important;
    }
}

@media screen and (max-width: 768px) {
    .related-animes-container {
        grid-template-columns: repeat(3, minmax(100px, 1fr)) !important;
    }
}


@media screen and (max-width: 470px) {
    .related-animes-container {
        grid-template-columns: repeat(2, minmax(100px, 1fr)) !important;
    }
}

@media screen and (max-width: 425px) {
    .related-animes-list-title h2 {
        display: none;
    }

    .related-animes-list-title h6 {
        text-align: center;
    }
}
</style>
