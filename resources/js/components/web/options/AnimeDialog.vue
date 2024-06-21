<template>
    <v-dialog v-model="dialog" class="most-anime-dialog-modal-panel">
        <v-card color="#212121" class="d-flex flex-row most-anime-dialog-modal-panel-card" rounded="lg">
            <div class="most-anime-dialog-modal-panel-one pa-0">
                <v-img :lazy-src="selectedAnime.poster.main2xUrl" :src="selectedAnime.poster.main2xUrl" :alt="selectedAnime.name" width="100%" aspect-ratio="0.7" cover></v-img>
            </div>
            <div class="most-anime-dialog-modal-panel-two">
                <v-card-title class="headline pb-0 d-flex justify-space-between"><p class="text-wrap">{{ selectedAnime.russian }}</p>
                    <v-btn variant="tonal" min-width="30px" min-height="30px" @click="closeDialog">
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
                <v-card-text v-text="cleanDescription(selectedAnime.description)" style="font-family: 'Inter', sans-serif; overflow: hidden; color: #9e9e9e; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;" class="mt-2 most-anime-dialog-modal-panel-text pa-0 pl-4 pr-4">
                </v-card-text>
                <v-card-actions class="d-flex ga-1 pa-4 most-anime-dialog-modal-panel-actions">
                    <v-btn prepend-icon="mdi-play" variant="flat" :loading="loading" theme="customDarkTheme" @click="openAnime(selectedAnime.id)">Смотреть
                    </v-btn>
                    <v-btn prepend-icon="mdi-bookmark" variant="tonal" disabled theme="customDarkTheme">В избранное
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </v-dialog>
</template>

<script>
import { defineComponent } from 'vue';
import { cleanDescription } from "@/ts/cleanDescription.ts";
import { openAnime } from '@/ts/goTo.ts';

export default defineComponent({
    props: {
        selectedAnime: Object,
    },
    data() {
        return {
            cleanDescription,
            openAnime,
            dialog: false,
            loading: false,
        }
    },
    emits: ['update:dialog', 'open-anime'],
    methods: {
        openDialog() {
            this.dialog = true;
        },
        closeDialog() {
            this.dialog = false;
        },
    },
});
</script>

<style lang="sass">
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
