<template>
    <section class="flickity skeleton" v-if="animeList.length === 0">
        <div class="flickity-inner" style=" justify-content: center;">
            <div class="gallery-cell skeleton-cell-pulse skeleton-bg"
                 style="margin: 10px 0 0 0; filter: grayscale(0)"></div>
        </div>
    </section>
    <section class="flickity" v-if="animeList">
        <div class="flickity-inner" ref="flickityContainer">
            <div v-for="(anime, index) in animeList.slice(0, 5)" :key="anime.id" class="gallery-cell">
                <div class="flickity-content-gallery-block">
                    <div class="gallery-cell-content">
                        <div class="gallery-cell-image">
                            <img style="" v-lazy="anime.poster.originalUrl" :alt="'ota-ku-топ аниме-' + anime.name">
                        </div>
                        <div class="gallery-cell-info">
                            <h2>{{ anime.russian }}</h2>
                            <p>Название: <span>{{ anime.name }}</span></p>
                            <p class="top-slider-anime-rating">Оценка: <span>{{ anime.score }}</span> <i
                                class="fa-solid fa-star"
                                aria-hidden="true"></i></p>
                            <div class="flickity-genres-list">
                                Жанры:
                                <span>
                  <router-link class="raco-secondary" v-for="(genre, genreIndex) in anime.genres.slice(0, 3)"
                               :to="'/catalog?genre=' + genre.id" :key="genreIndex">
                    {{ genre.russian }}
                  </router-link>
                </span>
                            </div>
                            <p class="description"><span> {{ cleanDescription(anime.description) }} </span></p>
                            <button @click="this.goToAnime(anime.id)" class="pd-normal raco-secondary" style="margin-top: 5px;"><i
                                class="fa-solid fa-play"></i>Cмотреть
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {error} from "@/other/techOperation.ts";
import {shuffleArray} from '@/other/shuffleArray.ts';
import Flickity from 'flickity';
import 'flickity/css/flickity.css';
import {cleanDescription} from "@/other/cleanDescription.ts";
import { goToAnime } from "@/other/goToAnime.ts";

export default {
    data() {
        return {
            animeList: [],
            shuffleArray,
            flickityInstance: null,
            cleanDescription,
            error,
            goToAnime,
        };
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
                                animes(season: "2024", limit: ${limit}, order: popularity, status: "released", kind: "tv") {
                                    id
                                    name
                                    russian
                                    english
                                    score
                                    poster {
                                        originalUrl
                                    }
                                    genres {
                                        id
                                        russian
                                    }
                                    description
                                }
                            }
                        `,
                    }),
                });
                if(!response.ok) {
                    this.error();
                }
                const data = await response.json();
                const popularAnime = data.data.animes;
                this.animeList = shuffleArray(popularAnime);
                this.createFlickityInstance();
            } catch (error) {
                this.error();
            }
        },
        createFlickityInstance() {
            setTimeout(() => {
                let elem = this.$refs.flickityContainer;
                this.flickityInstance = new Flickity(elem, {
                    cellAlign: "center",
                    pageDots: false,
                    wrapAround: true,
                    prevNextButtons: false,
                    autoPlay: 5000
                });

                let isDragging = false;

                this.flickityInstance.on('dragStart', () => {
                    isDragging = true;
                    this.flickityInstance.pausePlayer();
                });

                this.flickityInstance.on('dragEnd', () => {
                    isDragging = false;
                    this.flickityInstance.unpausePlayer();
                });
            }, 1)
        }
    },
    mounted() {
        this.fetchAnimeList(5);
    }
};
</script>

<style lang="scss">
.flickity {
    width: 100%;

    &-inner {
        width: 100%;
        margin: 0 auto;
        display: flex;
    }

    .flickity-viewport {
        width: 100%;
    }

    .flickity-slider {
        width: 100%;
        display: flex;
        align-items: center;
    }


    .gallery {
        background-color: var(--col-16);
    }

    .gallery-cell {
        max-width: var(--ota-ku-max-width);
        width: 100%;
        height: 420px;
        margin: 10px 40px 10px 0;
        border-radius: 8px;
        box-shadow: 0 5px 15px var(--col-7), 0 -5px 15px var(--col-7);
        transition: height 0.4s, filter 0.4s;
        filter: grayscale(100%);

        &.is-selected {
            height: 430px;
            filter: grayscale(0);
            margin: 0 40px 0 0;
        }
    }

    .flickity-content-gallery-block {
        width: 100%;
        position: relative;
        height: 100%;
        overflow: hidden;
        border-radius: 8px;
        background: var(--cl-17);
    }

    .gallery-cell-content {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .flickity-content-gallery-block .gallery-cell-image {
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        display: flex;
        justify-content: flex-end;
        z-index: -1;
        align-items: center;
        object-fit: cover;
        object-position: center;
    }

    .flickity-content-gallery-block .gallery-cell-image img {
        width: 55%;
        object-fit: cover;
        object-position: center;
        -webkit-mask-image: var(--cl-8);
    }
}

.gallery-cell-info {
    width: 100%;
    height: 100%;
    padding: 20px 30px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;

    h2 {
        max-width: 60%;
    }

    .top-slider-anime-rating {
        i {
            margin-left: 1px;
            color: var(--cl-19);
        }
    }

    .flickity-genres-list {
        span {
            display: flex;
            gap: 10px;
        }
    }

    .flickity-genres-list {
        display: flex;
        gap: 10px;
        align-items: center;

        a {
            text-decoration: underline;
        }
    }

    .description {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        max-width: 60%;
        padding: 5px 0;
        color: var(--cl-11);
    }
}

@media screen and (max-width: 1024px) {
    .gallery-cell-info h2 {
        max-width: 80%;
    }

    .gallery-cell {
        height: 350px !important;

        &.is-selected {
            height: 360px !important;

        }
    }

}

@media screen and (max-width: 768px) {
    .gallery-cell {
        height: 290px !important;

        &.is-selected {
            height: 300px !important;
        }
    }

    .description {
        max-width: 80% !important;
        -webkit-line-clamp: 3 !important;
    }
}

@media screen and (max-width: 425px) {
    .gallery-cell-info h2 {
        max-width: 100%;
    }

    .gallery-cell {
        height: 240px !important;

        &.is-selected {
            height: 250px !important;
        }
    }

    .description {
        max-width: 100% !important;
    }
}
</style>
