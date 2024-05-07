<template>
    <section class="flickity skeleton" v-if="animeList.length === 0">
        <div class="flickity-inner" style=" justify-content: center;">
            <div class="gallery-cell skeleton-cell-pulse" style="margin: 10px 0 0 0; filter: grayscale(0)"></div>
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
                            <p>Название: <span>{{ anime.japanese }}</span></p>
                            <p>Оценка: <span>{{ anime.score }}</span> <i class="fa-solid fa-star"
                                                                         aria-hidden="true"></i></p>
                            <div class="flickity-genres-list">
                                Жанры:
                                <router-link v-for="(genre, genreIndex) in anime.genres.slice(0, 3)"
                                             :to="'/catalog?genre=' + genre.id" :key="genreIndex">
                                    {{ genre.russian }}
                                </router-link>
                            </div>
                            <router-link :to="'/anime?animeId=' + anime.id" class="gallery-cell-top-a-watch"><i
                                class="fa-solid fa-play"></i>Cмотреть
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {shuffleArray} from '@/other/shuffleArray.js';
import Flickity from 'flickity';
import 'flickity/css/flickity.css';

export default {
    data() {
        return {
            animeList: [],
            shuffleArray,
            flickityInstance: null
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
                                    japanese
                                    score
                                    poster {
                                        originalUrl
                                    }
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
                const popularAnime = data.data.animes;
                this.animeList = shuffleArray(popularAnime);
                this.createFlickityInstance();
            } catch (error) {
                throw new Error("Error Loading TopSlider data");
            }
        },
        createFlickityInstance() {
            setTimeout(() => {
                console.log("sins")
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
}

.gallery {
    background-color: var(--top-slider-gallery-background-color);
}

.gallery-cell {
    max-width: var(--ota-ku-max-width);
    width: 100%;
    aspect-ratio: 1 / 0.33;
    margin: 10px 40px 10px 0;
    border-radius: 8px;
    background: var(--top-slider-gallery-cell-background-gradient);
    box-shadow: 0 5px 15px var(--top-slider-gallery-cell-box-shadow-color), 0 -5px 15px var(--top-slider-gallery-cell-box-shadow-color);
    transition: aspect-ratio 0.2s, filter 0.4s;
    filter: grayscale(100%);

    &.is-selected {
        aspect-ratio: 1 / 0.34;
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
    background: var(--top-slider-gallery-cell-content-background-gradiend);
    box-shadow: 0 5px 15px var(--top-slider-gallery-cell-content-box-shadow-color), 0 -5px 15px var(--top-slider-gallery-cell-content-box-shadow-color);
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
    width: 65%;
    object-fit: cover;
    object-position: center;
    -webkit-mask-image: var(--top-slider-gallery-cell-content-cell-image-webkit-mask-gradient);
}

.gallery-cell-info {
    width: 100%;
    height: 100%;
    padding: 20px 30px;
    display: flex;
    font-size: 1.5em;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;

    h2 {
        max-width: 60%;
    }

    p,
    .flickity-genres-list {
        font-size: 0.7em;

        &:nth-child(2) {
            color: var(--top-slider-gallery-cell-content-genres-cell-info-p-color);
        }

        &:nth-child(3) {
            margin-bottom: 5px;

            i {
                margin-left: 1px;
                color: var(--top-slider-gallery-cell-content-rating-star-color);
                font-size: 1.1em;
            }
        }
    }

    a {
        padding: 5px 15px;
        margin: 10px 0;
        border: 2px solid white;
        border-radius: 30px;
        display: flex;
        align-items: center;

        &.gallery-cell-top-a-watch {
            font-size: 0.7em;
            transition: color 0.2s ease-in-out, border 0.2s ease-in-out;

            &:hover {
                border: 2px solid var(--top-slider-gallery-cell-content-more-button-border-color);
                color: var(--top-slider-gallery-cell-content-more-button-text-color);
                border-radius: 30px;
            }

            i {
                margin-right: 10px;
            }
        }
    }
}

.flickity-genres-list {
    display: flex;
    gap: 10px;
    align-items: center;

    a {
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        border-radius: 0 !important;
        color: var(--top-slider-gallery-cell-content-genres-link-a-color);
        white-space: nowrap;
        text-decoration: underline;
        transition: color 0.2s ease-in-out;

        &:hover {
            color: var(--top-slider-gallery-cell-content-genres-link-a-hover);
        }
    }
}

.top-slider-anime-more-button {
    transition: color 0.2s ease-in-out, border 0.2s ease-in-out;

    &:hover {
        color: var(--top-slider-gallery-cell-content-more-button-text-color);
    }
}

.gallery-cell-genres {
    width: 100%;
    padding: 10px 0 0 0;

    a {
        padding: 0;
        margin: 0 10px 0 0;
        border: 0;
        border-radius: 0;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }
}

@media screen and (max-width: 1024px) {
    .gallery-cell-info h2 {
        max-width: 80%;
    }
}

@media screen and (max-width: 768px) {
    .gallery-cell {
        aspect-ratio: 1 / 0.42;

        &.is-selected {
            aspect-ratio: 1 / 0.45;
        }
    }

    .gallery-cell-info p:nth-child(2) {
        display: none;
    }

    .gallery-cell-info h2 {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
}

@media screen and (max-width: 425px) {
    .gallery-cell-info h2 {
        max-width: 100%;
    }

    .gallery-cell-info {
        font-size: 1.1em;
    }

    .gallery-cell-genres {
        display: none;
    }
}
</style>
