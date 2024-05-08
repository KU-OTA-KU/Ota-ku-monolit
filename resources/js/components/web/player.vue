<template>
    <section class="player" name="watch">
        <div class="player-inner">
            <div class="player-tit">
                <div class="player-container">
                    <div id="kodik-player">
                        <div v-if="!kodikIframeSrc" class="kodik-anime-not-found">
                            <h3>Для начала выберите серию из списка! 😊.</h3>
                        </div>
                        <iframe :src="kodikIframeSrc" width="100%" height="100%" frameborder="0" allowfullscreen
                                allow="autoplay *; fullscreen *"></iframe>
                    </div>
                </div>
                <div class="player-right-panel">
                    <div class="ozvucka-or-player">
                        <button class="player-buttons" :class="{ active: activePanel === 'seasons' }"
                                @click="selectPanel('seasons')">
                            <i class="fa-solid fa-film"></i> Серии
                        </button>
                        <button class="player-buttons" :class="{ active: activePanel === 'voices' }"
                                @click="selectPanel('voices')">
                            <i class="fa-solid fa-microphone"></i> Озвучка
                        </button>
                    </div>
                    <div class="player-right-panel-content">
                        <div class="voices-and-subtitles-container" v-if="activePanel === 'voices'">
                            <a v-for="(anime, index) in results"
                               :key="index"
                               :class="{ 'active': anime.translation.id === currentAnimeVoice }"
                               class="voice-item"
                               @click="changeVoice(anime.translation.id)">
                                {{ anime.translation.title }}
                                <span>{{ getTotalEpisodesCount(anime) }} серии</span>
                            </a>
                        </div>
                        <div class="seasons-container"
                             v-if="activePanel === 'seasons' && currentAnimeResult && currentAnimeVoice"
                             v-for="(season, seasonIndex) in currentAnimeResult.seasons" :key="seasonIndex">
                            <a :class="'anime-episode-' + episodeIndex"
                               v-for="(episode, episodeIndex) in season.episodes" :key="episodeIndex"
                               @click="changeEpisode(seasonIndex, episodeIndex)">
                                Серия {{ episodeIndex }} <span>Сезон {{ seasonIndex }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import VueCookies from 'vue-cookies';

export default {
    data() {
        return {
            currentAnime: '',
            currentAnimeVoice: '',
            activePanel: 'seasons',
            kodikIframeSrc: '',
            results: [],
            currentAnimeResult: null,
            VueCookies,
        };
    },
    methods: {
        async fetchData() {
            try {
                this.clearData();
                this.currentAnime = this.$route.query.animeId;
                this.currentAnimeVoice = parseInt(this.VueCookies.get('selectedVoice')) || null;
                console.log(this.currentAnimeVoice);
                const response = await fetch(`https://kodikapi.com/search?token=3cf56f8708e24622e6a5cc6747d0d3ee&shikimori_id=${this.currentAnime}&with_seasons=true&with_episodes_data=true&with_material_data=true`);
                const data = await response.json();
                console.log(data);
                if (data.results.length === 0) {
                    this.$refs.player.style.display = "none";
                } else {
                    this.results = data.results;
                    this.currentAnimeResult = data.results.find(result => result.translation.id === this.currentAnimeVoice);

                    if (!this.currentAnimeResult) {
                        if (data.results.length > 0) {
                            this.currentAnimeResult = data.results[0];
                            this.currentAnimeVoice = this.currentAnimeResult.translation.id;
                        } else {
                            this.currentAnimeResult = null;
                            this.currentAnimeVoice = null;
                        }
                    }
                    console.log(this.currentAnimeResult);
                }
            } catch (error) {
                console.error('fetch error => ', error);
            }
        },
        getTotalEpisodesCount(item) {
            let totalEpisodesCount = 0;
            if (item.seasons) {
                Object.values(item.seasons).forEach(season => {
                    if (season.episodes) {
                        totalEpisodesCount += Object.keys(season.episodes).length;
                    }
                });
            }
            return totalEpisodesCount;
        },
        selectPanel(panel) {
            this.activePanel = panel;
        },
        async changeEpisode(seasonIndex, key) {
            let currAnimeData = this.results.find(item => item.translation.id === this.currentAnimeVoice);
            let currAnimeEpisode = currAnimeData.seasons[seasonIndex].episodes[key].link;
            this.kodikIframeSrc = currAnimeEpisode;

            let activeLink = document.querySelector(`.anime-episode-${key}`);
            console.log(activeLink)
            if (activeLink) {
                let deletedLastActive = document.querySelector('.seasons-container a.active');
                if (deletedLastActive) {
                    deletedLastActive.classList.remove("active");
                }
                activeLink.classList.add("active");
            }
        },
        changeVoice(voiceId) {
            const newAnimeResult = this.results.find(anime => anime.translation.id === voiceId);

            if (newAnimeResult) {
                this.currentAnimeVoice = voiceId;
                this.currentAnimeResult = newAnimeResult;

                this.results.forEach(anime => {
                    anime.isActive = anime.translation.id === voiceId;
                });
            } else {
                console.error("Failed to find anime with voice ID:", voiceId);
            }
        },
        clearData() {
                this.currentAnime = '';
                this.currentAnimeVoice ='';
                this.activePanel ='seasons';
                this.kodikIframeSrc ='';
                this.results = [];
                this.currentAnimeResult = null;
        }
    },
    mounted() {
        this.fetchData();
    }
};
</script>

<style lang="scss">
.player {
    background-color: var(--player-background-color);
    width: 100%;
}

.player-inner {
    width: 100%;
    padding: 0 10px;
}

.player .player-tit {
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 10px 0;
}

.player-tit .player-container {
    width: 75%;
    /*width: 100%;*/
    aspect-ratio: 177 / 100;
}

.player-tit .player-right-panel {
    width: 25%;
    border: 1px solid var(--player-player-right-panel-border-color);
    border-radius: 5px;
    overflow: hidden;
}

.ozvucka-or-player {
    width: 100%;
    padding-bottom: 20px;
    display: flex;

}

.ozvucka-or-player button {
    width: 50%;
    cursor: pointer;
    outline: none;
    background-color: transparent;
    color: var(--player-player-right-panel-buttons-color);
    border: none;
    padding: 10px 0;
    transition: background-color 0.2s ease-in-out;
}

.ozvucka-or-player button i {
    margin-right: 10px;
    font-size: 1.2em;
    color: white;
}

.ozvucka-or-player .active {
    background-color: var(--player-player-right-panel-active-button-backgrounc-color);
}

.player-right-panel-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    height: 450px;
}

.player-right-panel-content a {
    padding: 8px 10px;
    margin: 0 10px;
    transition: color 0.2s;
}

.player-right-panel-content a:hover {
    color: #1976D2;
}

#kodik-player {
    overflow: hidden;
    border-radius: 5px;
    position: relative;
    width: 100%;
    height: 100%;
    background-color: var(--player-kodik-background-color);
    border: 1px solid var(--player-kodik-border-color);
}

#kodik-player iframe {
    position: absolute;
    z-index: 100;
}


.kodik-anime-not-found {
    width: 100%;
    height: 100%;
    text-align: center;
    position: absolute;
    z-index: 990;
    display: flex;
    align-items: center;
    justify-content: center;
}

.kodik-anime-not-found h3 {
    font-size: 1.8em;
}

.player-right-panel-content .seasons-container {
    width: 100%;
    flex-direction: column;
    gap: 10px;
    overflow: hidden;
    overflow-y: scroll;
    display: flex;
    height: 100%;
}

.player-right-panel-content .voices-and-subtitles-container::-webkit-scrollbar,
.player-right-panel-content .seasons-container::-webkit-scrollbar {
    width: 0;
}

.player-right-panel-content .voices-and-subtitles-container {
    width: 100%;
    flex-direction: column;
    gap: 10px;
    overflow: hidden;
    overflow-y: scroll;
    height: 100%;
}

.player-right-panel-content .voices-and-subtitles-container a {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.player-right-panel-content .voices-and-subtitles-container a span {
    font-size: 0.8em;
    color: var(--player-player-right-panel-voices-seasons-cout-span-color);
}

.voices-and-subtitles-container a.active,
.seasons-container a.active {
    user-select: none;
    pointer-events: none;
    background-color: var(--player-player-right-panel-content-subtitles-and-voice-active-link-background-color) !important;
    border-radius: 2px;
    color: var(--player-player-right-panel-content-subtitles-and-voice-active-link-font-color) !important;
}


@media screen and (max-width: 1024px) {
    .player-container {
        width: 100% !important;
    }

    .player-tit {
        flex-direction: column !important;
        gap: 10px !important;
    }

    .player-right-panel {
        width: 100% !important;
    }

    .player-right-panel-content {
        height: 200px;
    }
}

@media screen and (max-width: 768px) {
    .player {
        margin: 20px 0;
    }

}

@media screen and (max-width: 425px) {
}
</style>
