<template>
    <section v-if="animeList.length === 0 && animeFoundInitialized === false" class="main-content" id="main-content" name="main-content">
        <div class="movie_2">
            <div class="movie_2-image skeleton-bg skeleton-cell-slide">
            </div>
            <div class="movie_2-info">
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height-h1 skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-genres-list skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-about skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                </div>
            </div>
        </div>
        <div class="movie_2">
            <div class="movie_2-image skeleton-bg skeleton-cell-slide">
            </div>
            <div class="movie_2-info">
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height-h1 skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-genres-list skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-about skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                </div>
            </div>
        </div>
        <div class="movie_2">
            <div class="movie_2-image skeleton-bg skeleton-cell-slide">
            </div>
            <div class="movie_2-info">
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height-h1 skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-genres-list skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-about skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                </div>
            </div>
        </div>
        <div class="movie_2">
            <div class="movie_2-image skeleton-bg skeleton-cell-slide">
            </div>
            <div class="movie_2-info">
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height-h1 skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-genres-list skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-about skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                </div>
            </div>
        </div>
        <div class="movie_2">
            <div class="movie_2-image skeleton-bg skeleton-cell-slide">
            </div>
            <div class="movie_2-info">
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height-h1 skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-genres-list skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                    <div
                        class="movie_2-info-about skeleton-margin-top skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section v-if="animeList.length !== 0" class="main-content" id="main-content" name="main-content">
        <div v-for="anime in animeList" :key="anime.id" class="movie_2">
            <div class="movie_2-image" @click="goToAnime(anime.id)">
                <img v-lazy="anime.poster && anime.poster.mainUrl ? anime.poster.mainUrl : ''" :alt="'Смотреть аниме ' + (anime.name || anime.russian)">
            </div>
            <div class="movie_2-info">
                <h3 @click="goToAnime(anime.id)">{{ anime.russian }}</h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div class="movie_2-info-info-anime">
                        <p v-if="anime.score">{{ anime.score }}<i class="fa-solid fa-star"></i></p>
                        <span class="dot" v-if="anime.score">•</span>
                        <p v-if="anime.kind">{{ anime.kind }}</p>
                        <span class="dot" v-if="anime.kind">•</span>
                        <p v-if="anime.airedOn.year">{{ anime.airedOn.year }}</p>
                        <span class="dot" v-if="anime.airedOn.year">•</span>
                        <p v-if="anime.status">{{ translateStatus(anime.status) }}</p>
                    </div>
                    <div class="movie_2-info-genres-list">
                        <router-link v-for="(genre, genreIndex) in anime.genres.slice(0, 3)" :key="genreIndex"
                                     :to="'/catalog?genre='+ genre.id">{{ genre.russian }}
                        </router-link>
                    </div>
                    <div class="movie_2-info-about">
                        <p>{{ this.cleanDescription(anime.description) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div  v-if="!animeFound ||  !animeFound && animeFoundInitialized === false" class="empty-anime-message">
        <h3>Ничего не найдено 😔</h3>
    </div>
</template>

<script>
import { cleanDescription } from "@/other/cleanDescription.js";
import { translateStatus } from "@/other/translateStatus.js";
export default {
    data() {
        return {
            animeList: [],
            currPage: 1,
            limit: 10,
            loading: false,
            animeFound: true,
            animeFoundInitialized: false,
            cleanDescription,
            translateStatus
        };
    },
    mounted() {
        this.fetchAnimeData();
        window.addEventListener("scroll", this.loadNextPage);
        this.$watch(
            () => this.$route.query,
            () => {
                this.handleUrlChange();
            }
        );
    },
    methods: {
        handleUrlChange() {
            this.animeList = [];
            this.currPage = 1;
            this.animeFound = true;
            this.animeFoundInitialized = false;
            this.fetchAnimeData();
            window.scrollTo({ top: 0});
        },
        async fetchAnimeData() {
            if (!this.loading) {
                try {
                    this.loading = true;
                    const currentParams = this.getUrlParams();
                    const response = await fetch("https://shikimori.one/api/graphql", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                        body: JSON.stringify({
                            query: `
                        query {
                            animes(
                                search: "${currentParams.search || ''}",
                                season: "${currentParams.season || ''}",
                                status: "${currentParams.status || ''}",
                                kind: "${currentParams.kind || 'tv,tv_special,ova,ona,special'}",
                                order: ${currentParams.sort || 'ranked'},
                                rating: "${currentParams.rating || ''}",
                                genre: "${currentParams.genre || ''}",
                                limit: ${this.limit},
                                page: ${this.currPage},
                            ) {
                                id
                                name
                                russian
                                kind
                                score
                                status
                                description
                                genres {
                                    id
                                    russian
                                }
                                airedOn {
                                    year
                                }
                                poster {
                                    mainUrl
                                }
                            }
                        }
                    `,
                        }),
                    });
                    const data = await response.json();
                    const animeList = data.data.animes;
                    this.animeList = [...this.animeList, ...animeList];
                    this.currPage++;
                    if (animeList.length === 0 && this.animeFoundInitialized === false) {
                        this.animeFound = false;
                        this.animeFoundInitialized = true;
                    } else {
                        this.animeFound = true;
                        this.animeFoundInitialized = true;
                    }
                } catch (error) {
                    console.error("Ошибка запроса: ", error);
                } finally {
                    this.loading = false;
                }
            }
        },
        getUrlParams() {
            const searchParams = new URLSearchParams(window.location.search);
            const params = {};
            for (const [key, value] of searchParams) {
                const paramName = key.replace(/\[\]$/, '');
                if (paramName in params) {
                    params[paramName] += `,${value}`;
                } else {
                    params[paramName] = value;
                }
            }
            return params;
        },
        loadNextPage() {
            if (this.isNearBottom()) {
                this.fetchAnimeData();
            }
        },
        goToAnime(animeId) {
            this.$router.push(`/anime?animeId=${animeId}`);
        },
        isNearBottom() {
            const mainContent = document.querySelector(".main-content");
            const mainContentBottom = mainContent.offsetTop + mainContent.offsetHeight;
            return window.innerHeight + window.scrollY >= mainContentBottom - 200;
        },
    },
};
</script>

<style lang="scss" scoped>
.main-content {
    overflow: hidden;
    width: 100%;
    display: flex;
    position: relative;
    flex-direction: column;
    background-color: var(--cl-16);
    border-radius: 20px;
}

@media screen and (max-width: 485px) {
    .main-content {
        flex-direction: row;
        flex-wrap: wrap;
    }
}

.empty-anime-message {
    z-index: 100;
    width: 100%;
    padding: 20px 0 20px 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-anime-message h3 {
    font-weight: bold;
}
</style>
