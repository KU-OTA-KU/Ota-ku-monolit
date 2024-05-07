<template>
    <section v-if="animeList.length === 0" class="main-content" id="main-content" name="main-content">
        <div class="movie_2 skeleton-cell-pulse">
            <div class="movie_2-image skeleton-cell-slide skeleton-bg">
            </div>
            <div class="movie_2-info">
                <h3 class="skeleton-cell-slide skeleton-bg skeleton-height-h3 skeleton-weight"></h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-genres-list skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-about skeleton-cell-slide skeleton-bg skeleton-height-full skeleton-weight"></div>
                </div>
            </div>
        </div>
        <div class="movie_2 skeleton-cell-pulse">
            <div class="movie_2-image skeleton-cell-slide skeleton-bg">
            </div>
            <div class="movie_2-info">
                <h3 class="skeleton-cell-slide skeleton-bg skeleton-height-h3 skeleton-weight"></h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-genres-list skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-about skeleton-cell-slide skeleton-bg skeleton-height-full skeleton-weight"></div>
                </div>
            </div>
        </div>
        <div class="movie_2 skeleton-cell-pulse">
            <div class="movie_2-image skeleton-cell-slide skeleton-bg">
            </div>
            <div class="movie_2-info">
                <h3 class="skeleton-cell-slide skeleton-bg skeleton-height-h3 skeleton-weight"></h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-genres-list skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-about skeleton-cell-slide skeleton-bg skeleton-height-full skeleton-weight"></div>
                </div>
            </div>
        </div>
        <div class="movie_2 skeleton-cell-pulse">
            <div class="movie_2-image skeleton-cell-slide skeleton-bg">
            </div>
            <div class="movie_2-info">
                <h3 class="skeleton-cell-slide skeleton-bg skeleton-height-h3 skeleton-weight"></h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-genres-list skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-about skeleton-cell-slide skeleton-bg skeleton-height-full skeleton-weight"></div>
                </div>
            </div>
        </div>
        <div class="movie_2 skeleton-cell-pulse">
            <div class="movie_2-image skeleton-cell-slide skeleton-bg">
            </div>
            <div class="movie_2-info">
                <h3 class="skeleton-cell-slide skeleton-bg skeleton-height-h3 skeleton-weight"></h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div
                        class="movie_2-info-info-anime skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-genres-list skeleton-cell-slide skeleton-bg skeleton-height skeleton-weight"></div>
                    <div
                        class="movie_2-info-about skeleton-cell-slide skeleton-bg skeleton-height-full skeleton-weight"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-content" id="main-content" name="main-content" v-if="animeList.length !== 0">
        <div class="movie_2" v-for="(anime, index) in animeList" :key="index" @click="goToAnime(anime.id)">
            <div class="movie_2-image">
                <img v-lazy="anime.poster.mainUrl" :alt="anime.russian">
            </div>
            <div class="movie_2-info">
                <h3>{{ anime.russian }}</h3>
                <div class="movie_2-info-kind-genres-aired-container">
                    <div class="movie_2-info-info-anime">
                        <p>{{ anime.score }}<i class="fa-solid fa-star"></i></p><span class="dot">•</span>
                        <p>{{ anime.kind }}</p><span class="dot">•</span>
                        <p>{{ anime.airedOn.year }}</p>
                        <span class="dot">•</span>
                        <p>{{ translateStatus(anime.status) }}</p>
                    </div>
                    <div class="movie_2-info-genres-list">
                        <router-link v-for="(genre, genreIndex) in anime.genres.slice(0, 3)" :key="genreIndex"
                                     :to="'/catalog?genre='+ genre.id">{{ genre.russian }}
                        </router-link>
                    </div>
                    <div class="movie_2-info-about">
                        <p>{{ cleanDescription(anime.description) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { cleanDescription } from "@/other/cleanDescription.js";
import { translateStatus } from "@/other/translateStatus.js";
export default {
    data() {
        return {
            animeList: [],
            cleanDescription,
            translateStatus,
        };
    },
    mounted() {
        this.fetchAnimeList(5);
    },
    methods: {
        async fetchAnimeList(limit) {
            try {
                const response = await fetch("https://shikimori.one/api/graphql", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        query: `
                        query {
                            animes(season: "2020_2023", limit: ${limit}, order: popularity, status: "released", kind: "tv") {
                              id
                              russian
                              kind
                              score
                              status
                              airedOn {
                                year
                              }
                              poster {
                                mainUrl
                              }
                              description
                              genres {
                                id
                                russian
                              }
                            }
                          }
                        `,
                    }),
                });

                const data = await response.json();
                this.animeList = data.data.animes;
            } catch (error) {
                console.error("Error loading anime data:", error);
            }
        },
        goToAnime(animeId) {
            this.$router.push(`/anime?animeId=${animeId}`);
        }
    },
};
</script>

<style lang="scss">
.main-content {
    width: 100%;
    display: flex;
    gap: 10px;
    position: relative;
    flex-direction: column;

    @media screen and (max-width: 485px) {
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

    h3 {
        font-weight: bold;
    }
}
</style>
