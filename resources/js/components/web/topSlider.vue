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
              <p>Название: <span>{{ anime.name }}</span></p>
              <p class="top-slider-anime-rating">Оценка: <span>{{ anime.score }}</span> <i class="fa-solid fa-star"
                  aria-hidden="true"></i></p>
              <div class="flickity-genres-list">
                Жанры:
                <span>
                  <router-link v-for="(genre, genreIndex) in anime.genres.slice(0, 3)"
                    :to="'/catalog?genre=' + genre.id" :key="genreIndex">
                    {{ genre.russian }}
                  </router-link>
                </span>
              </div>
              <p class="description"><span> {{ cleanDescription(anime.description) }} </span></p>
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
import { shuffleArray } from '@/other/shuffleArray.js';
import Flickity from 'flickity';
import 'flickity/css/flickity.css';
import { cleanDescription } from "@/other/cleanDescription.js";

export default {
  data() {
    return {
      animeList: [],
      shuffleArray,
      flickityInstance: null,
      cleanDescription
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
  background-color: var(--col-5);
}

.gallery-cell {
  max-width: var(--ota-ku-max-width);
  width: 100%;
  aspect-ratio: 1 / 0.33;
  margin: 10px 40px 10px 0;
  border-radius: 8px;
  background: var(--col-6);
  box-shadow: 0 5px 15px var(--col-7), 0 -5px 15px var(--col-7);
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
  background: var(--col-6);
  box-shadow: 0 5px 15px var(--col-7), 0 -5px 15px var(--col-7);
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
  -webkit-mask-image: var(--col-8);
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
    margin-bottom: 5px;
  }

  .top-slider-anime-rating {
    i {
      margin-left: 1px;
      color: var(--col-9);
      font-size: 1.1em;
    }
  }

  .flickity-genres-list {
    span {
      display: flex;
      gap: 10px;

    }
  }

  a {
    padding: 6px 20px;
    margin: 10px 0;
    border: 2px solid white;
    border-radius: 30px;
    display: flex;
    align-items: center;

    &.gallery-cell-top-a-watch {
      transition: color 0.2s ease-in-out, border 0.2s ease-in-out;

      &:hover {
        border: 2px solid var(--col-2);
        color: var(--col-2);
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
    color: var();
    white-space: nowrap;
    text-decoration: underline;
    transition: color 0.2s ease-in-out;

    &:hover {
      color: var(--top-slider-gallery-cell-content-genres-link-a-hover);
    }
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

.description {
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
  max-width: 60%;
  margin: 5px 0;
  color: var(--col-10);
  span {
    font-size: 0.8em;
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

  .gallery-cell-info h2 {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin: 0;
  }

  .gallery-cell-info p:not(.description) {
    display: none;
  }

  .flickity-genres-list {
    display: none;
  }

  .description {
    max-width: 80%;
  }
}

@media screen and (max-width: 425px) {
  .gallery-cell-info h2 {
    max-width: 100%;
  }

  .gallery-cell-genres {
    display: none;
  }
}
</style>
