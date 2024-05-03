<template>
  <section class="flickity">
    <div class="flickity-inner" ref="flickityContainer">
      <div class="gallery-cell" ref="cell0"></div>
      <div class="gallery-cell" ref="cell1"></div>
      <div class="gallery-cell" ref="cell2"></div>
      <div class="gallery-cell" ref="cell3"></div>
      <div class="gallery-cell" ref="cell4"></div>
    </div>
  </section>
</template>

<script>
import { shuffleArray } from '../../other/shuffleArray.js';
import Flickity from 'flickity';
import 'flickity/css/flickity.css';

export default {
  data() {
    return {
      animeList: [],
      shuffleArray
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

        if (!response.ok) {
          throw new Error("Error loading anime data");
        }

        const data = await response.json();
        const popularAnime = data.data.animes;
        const filteredAnime = shuffleArray(popularAnime)

        this.animeList = filteredAnime;
        this.displayAnimeList();
      } catch (error) {
        throw new Error("Error loading anime data");
      }
    },
    displayAnimeList() {
      const cells = [
        this.$refs.cell0,
        this.$refs.cell1,
        this.$refs.cell2,
        this.$refs.cell3,
        this.$refs.cell4,
      ];

      this.animeList.slice(0, 5).forEach((anime, index) => {
        const genres = anime.genres.slice(0, 3).map(genre => {
          return `<a href="catalog.php?genres=${genre.id}">${genre.russian}</a>`;
        }).join(" ");

        const animeHTML = `
          <div class="flickity-content-gallery-block">
            <div class="gallery-cell-content">
              <div class="gallery-cell-image">
                <img src="${anime.poster.originalUrl}" alt="ota-ku-топ аниме-${anime.name}">
              </div>
              <div class="gallery-cell-info">
                <h2>${anime.russian}</h2>
                <p>Название: <span>${anime.japanese}</span></p>
                <p>Оценка: <span>${anime.score}</span> <i class="fa-solid fa-star" aria-hidden="true"></i></p>
                <div class="flickity-genres-list">
                  Жанры: 
                  ${genres}
                </div>
                <a href="anime.php?animeId=${anime.id}" class="gallery-cell-top-a-watch"><i class="fa-solid fa-play"></i>Cмотреть</a>
              </div>
            </div>
          </div>
        `;

        cells[index].innerHTML = animeHTML;
      });
      setTimeout(() => {
        const images = document.querySelectorAll('.flickity-content-gallery-block .gallery-cell-image img');
        images.forEach(image => {
          image.style.opacity = '1';
        });
      }, 300);
    },
  },
  mounted() {
    let elem = this.$refs.flickityContainer;
    let flcky = new Flickity(elem, {
      cellAlign: "center",
      pageDots: false,
      wrapAround: true,
      prevNextButtons: false,
      autoPlay: 5000
    });

    let isDragging = false;

    flcky.on('dragStart', function () {
      isDragging = true;
      flcky.pausePlayer();
    });

    flcky.on('dragEnd', function () {
      isDragging = false;
      flcky.unpausePlayer();
    });

    this.fetchAnimeList(10);
  }
};
</script>

<style lang="scss">
.flickity {
  width: 100%;
}

.flickity-inner {
  width: 100%;
  margin: 0 auto;
}

.gallery {
  background-color: var(--top-slider-gallery-background-color);
}

.flickity .flickity-viewport {
  width: 100%;
}

.flickity .flickity-slider {
  width: 100%;
  /* aspect-ratio: 1 / 2;*/
  display: flex;
  align-items: center;
}

.gallery-cell {
  max-width: 1500px;
  width: 100%;
  aspect-ratio: 1 / 0.33;
  margin: 10px 40px 10px 0;
  /* background-color: #121212; */
  border-radius: 8px;
  background: var(--top-slider-gallery-cell-background-gradient);
  box-shadow: 0 5px 15px var(--top-slider-gallery-cell-box-shadow-color), 0 -5px 15px var(--top-slider-gallery-cell-box-shadow-color);
  transition: aspect-ratio 0.2s, filter 0.4s;
  filter: grayscale(100%);
}

.gallery-cell.is-selected {
  aspect-ratio: 1 / 0.34;
  filter: grayscale(0);
  margin: 0 40px 0 0;
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
  /* filter: blur(1px); */
}

.flickity-content-gallery-block .gallery-cell-image img {
  width: 65%;
  object-fit: cover;
  object-position: center;
  -webkit-mask-image: var(--top-slider-gallery-cell-content-cell-image-webkit-mask-gradient);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
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
}

.flickity-genres-list {
  display: flex;
  gap: 10px;
  align-items: center;
}

.flickity-genres-list a {
  padding: 0 !important;
  margin: 0 !important;
  border: none !important;
  border-radius: 0 !important;
  color: var(--top-slider-gallery-cell-content-genres-link-a-color);
  white-space: nowrap;
  text-decoration: underline;
  transition: color 0.2s ease-in-out;
}

.top-slider-anime-more-button {
  transition: color 0.2s ease-in-out, border 0.2s ease-in-out;
}


.flickity-genres-list a:hover {
  color: var(--top-slider-gallery-cell-content-genres-link-a-hover);
}

.gallery-cell-info h2 {
  max-width: 60%;
}

.gallery-cell-info p,
.flickity-genres-list {
  font-size: 0.7em;
}

.gallery-cell-info p:nth-child(2) {
  /*color: #4265E9;*/
  color: var(--top-slider-gallery-cell-content-genres-cell-info-p-color);
}

.gallery-cell-info p:nth-child(3) {
  margin-bottom: 5px;
}

.gallery-cell-info p:nth-child(3) i {
  margin-left: 1px;
  color: var(--top-slider-gallery-cell-content-rating-star-color);
  font-size: 1.1em;
}

.gallery-cell-info span {
  color: var(--top-slider-gallery-cell-span-font-color);
}

.gallery-cell-info a {
  padding: 5px 15px;
  margin: 10px 0;
  border: 2px solid white;
  border-radius: 30px;
  display: flex;
  align-items: center;
}

.gallery-cell-info .gallery-cell-top-a-watch {
  font-size: 0.7em;
  transition: color 0.2s ease-in-out, border 0.2s ease-in-out;
}

.gallery-cell-info .gallery-cell-top-a-watch:hover {
  border: 2px solid var(--top-slider-gallery-cell-content-more-button-border-color);
  color: var(--top-slider-gallery-cell-content-more-button-text-color);
  border-radius: 30px;
}

.gallery-cell-info .gallery-cell-top-a-watch i {
  margin-right: 10px;
}

.gallery-cell-genres {
  width: 100%;
  padding: 10px 0 0 0;
}

.gallery-cell-genres a {
  padding: 0;
  margin: 0 10px 0 0;
  border: 0;
  border-radius: 0;
  cursor: pointer;
  transition: color 0.2s ease-in-out;
}

@media screen and (max-width: 1024px) {
  .gallery-cell-info h2 {
    max-width: 80%;
  }
}

@media screen and (max-width: 768px) {
  .gallery-cell {
    aspect-ratio: 1 / 0.42;
  }

  .gallery-cell.is-selected {
    aspect-ratio: 1 / 0.45;
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

  .gallery-cell-genres {
    display: none;
  }
}
</style>