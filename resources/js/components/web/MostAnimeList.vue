<template>
    <v-container class="most-anime-container"
                 style="max-width: var(--ota-ku-max-width); padding: 20px 10px 10px 10px; align-items: center;">
        <div v-if="mostAnimeListSkeleton">
            <v-card variant="text" class="pa-0" v-for="n in 2" :key="n">
                <v-skeleton-loader
                class="mb-3"
                type="list-item-two-line"
                >
                </v-skeleton-loader>
                <v-row no-gutters class="mt-1">
                    <v-col v-for="n in 6" :key="n" cols="6" xxl="2" xl="2" lg="2" md="3" sm="4" xs="4" class="pa-2">
                        <v-skeleton-loader
                            class="mb-5 custom-skeleton-1"
                            type="image, list-item-two-line"
                        ></v-skeleton-loader>
                    </v-col>
                </v-row>
            </v-card>
        </div>
        <div v-else>
            <div v-for="category in animeList" :key="category.title" class="mb-5">
                <v-card variant="text" class="pa-0">
                    <v-card-title class="pa-0">{{ category.title }}</v-card-title>
                    <v-card-subtitle class="pa-0">{{ category.description }}</v-card-subtitle>
                    <v-row no-gutters class="mt-1">
                        <v-col v-for="anime in category.anime" :key="anime.id" cols="6" xxl="2" xl="2" lg="2" md="3" sm="4" xs="4" class="pa-2">
                            <v-card variant="text" link rounded="lg" @click="openDialog(anime)">
                                <v-img :lazy-src="anime.poster.main2xUrl" :src="anime.poster.main2xUrl"
                                       :alt="anime.name"
                                       rounded="lg" aspect-ratio="0.7" cover
                                       style="pointer-events: none; user-select: none;"></v-img>
                                <v-card-title class="pa-1 font-weight-regular" style="font-size: 1em;">{{
                                        anime.russian
                                    }}
                                </v-card-title>
                                <v-card-subtitle class="pa-1 d-flex ga-1 pt-0 pb-3" style="font-size: 0.8em">
                                    Тип: {{ anime.kind }}
                                    <span>•</span>
                                    Оценка: {{ anime.score }}
                                </v-card-subtitle>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>
            </div>
        </div>

        <v-dialog v-model="dialog" class="most-anime-dialog-modal-panel">
            <v-card color="#212121" class="d-flex flex-row most-anime-dialog-modal-panel-card" rounded="lg">
                <div class="most-anime-dialog-modal-panel-one pa-0">
                    <v-img :lazy-src="selectedAnime.poster.main2xUrl" :src="selectedAnime.poster.main2xUrl"
                           :alt="selectedAnime.name" width="100%"
                           aspect-ratio="0.7" cover></v-img>
                </div>
                <div class="most-anime-dialog-modal-panel-two">
                    <v-card-title class="headline pb-0 d-flex justify-space-between"><p class="text-wrap">
                        {{ selectedAnime.russian }}</p>
                        <v-btn variant="tonal" min-width="30px" min-height="30px" @click="dialog = false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                    </v-card-title>
                    <v-card-subtitle class="d-flex ga-1" style="font-size: 0.8em">
                        <div>Тип: {{ selectedAnime.kind }}</div>
                        <span>•</span>
                        <div>Оценка: {{ selectedAnime.score }}</div>
                        <span>•</span>
                        <div>Год выхода: {{ selectedAnime.airedOn.year }}</div>
                    </v-card-subtitle>
                    <v-card-text v-text="cleanDescription(selectedAnime.description)"
                                 style="font-family: 'Inter', sans-serif;
                                  max-height: 10em;
                                  overflow: hidden;
                                  text-overflow: ellipsis;
                                  white-space: normal;
                                  line-height: 150%;
                                  color: #9e9e9e;"
                                 class="mt-2 most-anime-dialog-modal-panel-text">
                    </v-card-text>
                    <v-card-actions class="d-flex ga-1 pa-4 most-anime-dialog-modal-panel-actions">
                        <v-btn prepend-icon="mdi-play" variant="flat" :loading="loading" theme="customDarkTheme"
                               @click="openAnime(selectedAnime.id)">Смотреть
                        </v-btn>
                        <!--<v-btn prepend-icon="mdi-account-multiple" variant="tonal" disabled>Смотреть вместе</v-btn>-->
                        <v-btn prepend-icon="mdi-bookmark" variant="tonal" disabled theme="customDarkTheme">В избранное</v-btn>
                    </v-card-actions>
                </div>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script lang="ts">
import axios from "axios";
import {cleanDescription} from "@/ts/cleanDescription.ts";
import {openAnime} from "@/ts/goTo.ts";
import {defineComponent, ref} from "vue";

export default defineComponent({
    data() {
        return {
            animeList: [],
            dialog: false,
            selectedAnime: {},
            cleanDescription,
            loading: ref(false),
            mostAnimeListSkeleton: ref(true),
            openAnime,
        };
    },
    mounted() {
        this.fetchAllData(6);
    },
    methods: {
        async fetchAllData(animeLimit: number) {
            try {
                const response = await axios.post("https://shikimori.one/api/graphql", {
                    query: `
              query {
                ongoingAnime: animes(limit: 6, order: popularity, status: "ongoing", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
                anonseAnime: animes(season: "2024", limit: ${animeLimit}, order: name, status: "anons", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
                topAnime: animes(limit: ${animeLimit}, order: ranked, status: "released", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
                releasedAnime: animes(limit: ${animeLimit}, order: popularity, status: "released", kind: "tv") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
                filmsAnime: animes(season: "2020_2024", limit: ${animeLimit}, order: popularity, status: "released", kind: "movie") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
                ovaAnime: animes(season: "2023_2024", limit: ${animeLimit}, order: popularity, status: "released", kind: "ova") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
                onaAnime: animes(season: "2023_2024", limit: ${animeLimit}, order: popularity, status: "released", kind: "ona") {
                  id
                  name
                  russian
                  kind
                  score
                  description
                  poster {
                    main2xUrl
                  }
                  airedOn {
                    year
                  }
                }
              }
            `,
                }, {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                });

                if (response.status !== 200) {
                    this.$router.push(`/error`);
                }

                const data = response.data;
                this.animeList.push({
                    title: "Онгоинги",
                    description: "Вступай в новые эпизоды приключений, следи за сюжетом!",
                    anime: data.data.ongoingAnime,
                });
                this.animeList.push({
                    title: "Популярные ONA",
                    description: "оригинальные анимационные сети (ONA) с уникальными и захватывающими сюжетами!",
                    anime: data.data.onaAnime,
                });
                this.animeList.push({
                    title: "Топ аниме",
                    description: "Погружайся в лучшие произведения аниме, отмеченные высшим призом!",
                    anime: data.data.topAnime,
                });
                this.animeList.push({
                    title: "Популярные OVA",
                    description: "(Original Video Animation) — эксклюзивные анимационные произведения!",
                    anime: data.data.ovaAnime,
                });
                this.animeList.push({
                    title: "Анонсы",
                    description: "Узнавай первым о предстоящих релизах, которые ожидают нас!",
                    anime: data.data.anonseAnime,
                });
                this.animeList.push({
                    title: "Завершенные",
                    description: "Проведи время в компании классических аниме, наполненных волнением!",
                    anime: data.data.releasedAnime,
                });
                this.animeList.push({
                    title: "Фильмы",
                    description: "Эксклюзивная коллекция анимационных фильмов для наслаждения!",
                    anime: data.data.filmsAnime,
                });

                this.mostAnimeListSkeleton = false;
            } catch (error) {
                console.log(error);
                this.$router.push(`/error`);
            }
        },
        openDialog(anime) {
            this.selectedAnime = anime;
            this.dialog = true;
        }
    },
});
</script>

<style lang="sass">
.custom-skeleton-1
    .v-skeleton-loader__image
        height: 260px

.most-anime-dialog-modal-panel
    max-width: 1200px

    &-one
        width: 25%

    &-two
        width: 75%

@media screen and (max-width: 910px)
    .most-anime-dialog-modal-panel
        max-width: 700px !important

        .most-anime-dialog-modal-panel-card
            flex-direction: column !important

        &-one
            margin: 0 auto
            width: 100%
            height: 400px

        &-two
            width: 100%

@media screen and (max-width: 600px)
    .most-anime-dialog-modal-panel
        max-width: 500px !important

        .most-anime-dialog-modal-panel-actions
            flex-direction: column !important
            gap: 10px

            button
                width: 100%
                margin-inline-start: 0 !important

        .most-anime-dialog-modal-panel-text
            display: none !important

@media screen and (max-width: 425px)
    .most-anime-dialog-modal-panel
        max-width: 400px !important
</style>
