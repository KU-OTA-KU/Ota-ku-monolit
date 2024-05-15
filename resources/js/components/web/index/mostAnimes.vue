<template>
    <section class="most-container" v-if="animeLists.length === 0">
        <div class="most-container-inner">
            <div class="most-container-tit">
                <div class="most-content-gallery-cell">
                    <div class="most-content-title-h2">
                        <h2>Онгоинги</h2>
                    </div>
                    <div class="most-content-animes-list-option-1">
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="most-content-gallery-cell">
                    <div class="most-content-title-h2">
                        <h2>Анонсы</h2>
                    </div>
                    <div class="most-content-animes-list-option-2">
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="most-content-gallery-cell">
                    <div class="most-content-title-h2">
                        <h2>Топ аниме</h2>
                    </div>
                    <div class="most-content-animes-list-option-3">
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="most-content-gallery-cell">
                    <div class="most-content-title-h2">
                        <h2>Завершенные</h2>
                    </div>
                    <div class="most-content-animes-list-option-4">
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                        <div class="most-content-movie">
                            <div class="most-content-movie-image skeleton-cell-slide skeleton-bg"></div>
                            <div class="most-content-movie-info">
                                <div class="most-name skeleton-bg skeleton-height skeleton-cell-slide"></div>
                                <div class="most-status skeleton-bg skeleton-height skeleton-cell-slide">
                                </div>
                                <div class="most-data skeleton-bg skeleton-height skeleton-cell-slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="most-container" v-if="animeLists">
        <div class="most-container-inner">
            <div class="most-container-tit">
                <div class="most-content-gallery-cell" v-for="(animeList, index) in animeLists" :key="index">
                    <div class="most-content-title-h2">
                        <h2>{{ animeList.title }}</h2>
                    </div>
                    <div class="most-content-animes-list-option"
                         :class="'most-content-animes-list-option-' + (index + 1)">
                        <div class="most-content-movie" v-for="(anime, i) in animeList.animes" :key="i"
                             @click="goToAnime(anime.id)">
                            <div class="most-content-movie-image">
                                <img v-lazy="anime.poster.mainUrl" :alt="anime.name">
                            </div>
                            <div class="most-content-movie-info">
                                <div class="most-name">
                                    <router-link :to="'/anime?animeId=' + anime.id">{{ anime.russian }}</router-link>
                                </div>
                                <div class="most-status">
                                    <div class="most-type">{{ anime.kind }}</div>
                                    <div class="rating">
                                        {{ anime.score }}
                                        <i class="fa-solid fa-star" aria-hidden="true" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                                <div class="most-data">
                                    <p>{{ anime.airedOn.year }}</p>
                                </div>
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
            animeLists: [],
        };
    },
    mounted() {
        this.fetchAllData();
    },
    methods: {
        async fetchAllData() {
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
                ongoingAnimes: animes(limit: 5, order: popularity, status: "ongoing", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  poster {
                    mainUrl
                  }
                  airedOn {
                    year
                  }
                }
                anonseAnimes: animes(season: "2024", limit: 5, order: popularity, status: "anons", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  poster {
                    mainUrl
                  }
                  airedOn {
                    year
                  }
                }
                topAnimes: animes(limit: 5, order: ranked, status: "released", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  poster {
                    mainUrl
                  }
                  airedOn {
                    year
                  }
                }
                releasedAnimes: animes(limit: 4, order: popularity, status: "released", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  poster {
                    mainUrl
                  }
                  airedOn {
                    year
                  }
                }
              }
            `,
                    }),
                });

                const data = await response.json();
                console.log("%cAll data fetched successfully", "color: greenyellow");

                this.animeLists.push({
                    title: "Онгоинги",
                    animes: data.data.ongoingAnimes,
                });

                this.animeLists.push({
                    title: "Анонсы",
                    animes: data.data.anonseAnimes,
                });

                this.animeLists.push({
                    title: "Топ аниме",
                    animes: data.data.topAnimes,
                });

                this.animeLists.push({
                    title: "Завершенные",
                    animes: data.data.releasedAnimes,
                });
            } catch (error) {
                console.warn("Request error => ", error);
                this.fetchAllData();
            }
        },
        goToAnime(animeId) {
            this.$router.push(`/anime?animeId=${animeId}`);
        },
    },
};
</script>

<style lang="scss" scoped>
.most-container {
    width: 100%;

    &-inner {
        width: 100%;
        padding: 0 10px;
    }

    & .most-container-tit {
        max-width: var(--ota-ku-max-width);
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        .most-content-gallery-cell {

            .most-content-title-h2 {
                color: var(--most-content-title-h2-color);
            }
        }

        .most-content-animes-list-option {
            display: flex;
            background-color: var(--cl-16);
            width: 100%;
            gap: 10px;
            padding: 20px;


        }
    }
}



.most-content-movie {
    width: 20%;
    padding: 10px 0;
    display: flex;
    flex-direction: column;
    cursor: pointer;

    &:hover {
        .most-name {
            color: var(--most-content-movie-name-hover);
        }
    }

    .most-content-movie-image {
        width: 100%;
        aspect-ratio: 1 / 1.4;
        position: relative;
        overflow: hidden;

        img {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            pointer-events: none;
            /*object-fit: cover;*/
        }
    }

    .most-content-movie-info {
        width: 80%;
        padding-left: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;

        .most-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
            transition: color 0.2s ease-in-out;

            //background: var(--most-content-movie-most-name-background-gradient);
            text-align: left;
            margin-bottom: 3px;
            font-size: 0.9em;

            p {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        .most-status {
            display: flex;
            min-width: 50%;
            font-size: 0.8em;
            color: var(--most-content-movie-status-text-color);
            align-items: center;
            justify-content: flex-start;
            gap: 5px;
            margin-bottom: 3px;

            i {
                color: var(--most-content-movie-status-star-color);
            }
        }

        .most-data {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            min-width: 50%;
            text-align: left;
            font-size: 0.7em;
        }
    }
}

@media screen and (max-width: 1024px) {
    .most-container-tit {
        .most-content-gallery-cell {
            width: calc(33.33% - 20px);
        }

        .most-content-gallery-cell:nth-child(4) {
            display: none;
        }
    }
}

@media screen and (max-width: 768px) {
    .most-container-tit {
        gap: 20px;

        .most-content-gallery-cell {
            width: calc(50% - 20px) !important;
        }

        .most-content-gallery-cell:nth-child(4) {
            display: unset;
        }

        .most-content-gallery-cell .most-content-title-h2 {
            text-align: center;
        }
    }
}

@media screen and (max-width: 425px) {
    .most-container-tit {
        .most-content-gallery-cell {
            width: calc(100%);
        }
    }
}
</style>
