<template>
    <section class="anime-background" :style="'background-image: url(' + _ANIME_IMAGE_ +  ')'">
        <div class="anime-back-gradient"></div>
        <div class="anime-back-content">
            <div class="anime-back-content-inner">
                <div class="anime-back-content-tit">
                    <div class="anime-back-global-info">
                        <div class="anime-back-panel-left">
                            <div class="anime-back-global-info-image"><img v-if="_ANIME_IMAGE_" :src="_ANIME_IMAGE_" :alt="_ANIME_ENGLISH_NAME_"></div>
                            <div class="anime-back-global-info-watch-button">
                                <button onclick="#watch"><i class="fa-solid fa-play"></i>Смотреть
                                </button>
                                <button><i class="fa-solid fa-exclamation"></i>Пожаловаться</button>
                            </div>
                        </div>
                        <div class="anime-back-global-current-anime-information">
                            <div class="anime-eng-jpg-name"><p>{{ _ANIME_ENGLISH_NAME_ }}</p><p>{{  _ANIME_AIR_YEAR_  }}<span class="dot">•</span>{{ _ANIME_KIND_ }}<span class="dot">•</span>{{ _ANIME_RUSSIAN_STATUS_ }}</p></div>
                            <div class="anime-title-h2"><h1>{{ _ANIME_RUSSIAN_NAME_ }}</h1></div>
                            <div class="anime-score-genres">
                                <div class="anime-score"><p>{{ _ANIME_SCORE_ }} <i class="fa-solid fa-star" v-if="_ANIME_SCORE_"></i> </p></div>
                                <div class="anime-genres-list">
                                    <router-link v-for="genre in _ANIME_GENRES_" :key="genre.id" :to="'/catalog?genre=' + genre.id">{{ genre.russian }}</router-link>
                                </div>
                            </div>
                            <div class="anime-status"><p>Статус: <span :class="'status-core-block ' + _ANIME_STATUS_ ">{{ _ANIME_RUSSIAN_STATUS_ }}</span></p></div>
                            <div class="anime-year"><p>Год выхода: <span>{{ _ANIME_AIR_YEAR_ }}</span></p></div>
                            <div class="anime-rating"><p>Возрастные ограничения: <span>{{ _ANIME_RATING_ }}</span></p></div>
                            <div class="anime-duration"><p>Длительность: ~ <span>{{ _ANIME_DURATION_ }} мин.</span></p></div>
                            <div class="anime-next-episode-block"><p>Cледуюший Эпизод: <span>{{_ANIME_NEXT_EPISODE_DATE_}}</span></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import moment from 'moment';
export default {
    data() {
        return {
            _ANIME_ID_: null,
            _ANIME_IMAGE_: null,
            _ANIME_ENGLISH_NAME_: null,
            _ANIME_JAPANESE_NAME: null,
            _ANIME_STATUS_: null,
            _ANIME_RUSSIAN_NAME_: null,
            _ANIME_AIR_YEAR_: null,
            _ANIME_KIND_: null,
            _ANIME_SCORE_: null,
            _ANIME_GENRES_: null,
            _ANIME_RUSSIAN_STATUS_: null,
            _ANIME_RATING_: null,
            _ANIME_DURATION_: null,
            _ANIME_NEXT_EPISODE_DATE_: null,
        };
    },
    methods: {
       main() {
           const storedData = sessionStorage.getItem("CurrentAnime");
           if (storedData) {
               this._ANIME_ID_ = JSON.parse(storedData)[0].id;
               this._ANIME_IMAGE_ = JSON.parse(storedData)[0].poster.originalUrl;
               this._ANIME_ENGLISH_NAME_ = JSON.parse(storedData)[0].english;
               this._ANIME_JAPANESE_NAME = JSON.parse(storedData)[0].japanese;
               this._ANIME_RUSSIAN_NAME_ = JSON.parse(storedData)[0].russian;
               this._ANIME_STATUS_ = JSON.parse(storedData)[0].status;
               this._ANIME_AIR_YEAR_ = JSON.parse(storedData)[0].airedOn.year;
               this._ANIME_KIND_ = JSON.parse(storedData)[0].kind;
               this._ANIME_SCORE_ = JSON.parse(storedData)[0].score;
               this._ANIME_GENRES_ = JSON.parse(storedData)[0].genres;
               this._ANIME_RATING_ = JSON.parse(storedData)[0].rating;
               this._ANIME_DURATION_ = JSON.parse(storedData)[0].duration;
               this._ANIME_NEXT_EPISODE_DATE_ = (() => {
                   const nextEpisodeDate = JSON.parse(storedData)[0].nextEpisodeAt;
                   if (!moment(nextEpisodeDate).isValid()) {
                       return "нету";
                   } else {
                       const userLocale = moment.locale();
                       return moment(nextEpisodeDate).calendar(userLocale);
                   }
               })();
           }

           if (this._ANIME_STATUS_ === 'released') {
               this._ANIME_RUSSIAN_STATUS_ = 'Завершено';
           } else if (this._ANIME_STATUS_ === 'ongoing') {
               this._ANIME_RUSSIAN_STATUS_ = 'Онгоинг';
           } else {
               this._ANIME_RUSSIAN_STATUS_ = 'Анонс'
           }
       }
    }
};
</script>

<style lang="scss">
.anime-background {
    /* background-color: rgb(29, 231, 73); */
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
}

.anime-background .anime-back-gradient {
    position: absolute;
    width: 100%;
    height: 100%;
    background: var(--anime-header-background-back-gradient);
}

.anime-background .anime-back-content {
    position: relative;
    width: 100%;
    margin-top: 200px;
    padding: 10px 0;
}

.anime-back-content .anime-back-content-inner {
    padding: 0 10px;
    width: 100%;
}

.anime-back-content .anime-back-content-tit {
    margin: 0 auto;
    max-width: 1300px;
    width: 100%;
}

.anime-back-global-info {
    display: flex;
    gap: 20px;
}

.anime-back-panel-left {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 25%;
}

.anime-back-global-info-image {
    width: 100%;
    aspect-ratio: 1 / 1.4;
    background: var(--anime-header-global-info-image-background-gradient);
    position: relative;
    border-radius: 5px;
    overflow: hidden;
}

.anime-back-global-info-image img {
    width: 100%;
    position: absolute;
    left: 0;
    height: 100%;
    pointer-events: none;
    object-fit: cover;
}

.anime-back-global-info-watch-button {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.anime-back-global-info-watch-button button:nth-child(1) {
    width: 100%;
    padding: 10px 0;
    outline: none;
    background-color: var(--anime-header-global-info-watch-button-background-color);
    color: var(--anime-header-global-info-watch-button-font-color);
    border: 2px solid var(--anime-header-global-info-watch-button-border-color);
    cursor: pointer;
    transition: background-color 0.2s;
    white-space: nowrap;
}

.anime-back-global-info-watch-button button:nth-child(1) i {
    font-size: 1.2em;
    margin-right: 10px;
}

.anime-back-global-info-watch-button button:nth-child(1):hover {
    border-color: var(--anime-header-global-info-watch-button-border-color-hover);
    background-color: var(--anime-header-global-info-watch-button-background-color-hover);
}

.anime-back-global-info-watch-button button:nth-child(2) {
    width: 100%;
    padding: 10px 0;
    outline: none;
    background-color: var(--anime-header-global-info-report-button-background-color);
    color: var(--anime-header-global-info-report-button-text-color);
    border: 2px solid var(--anime-header-global-info-report-button-border-color);
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    white-space: nowrap;
}

.anime-back-global-info-watch-button button:nth-child(2):hover {
    background-color: var(--anime-header-global-info-report-button-background-color-hover);
    color: var(--anime-header-global-info-report-button-text-color-hover);
}

.anime-back-global-info-watch-button button:nth-child(2) i {
    font-size: 1.2em;
    margin-right: 10px;
    color: var(--anime-header-global-info-report-button-i-color);
}

.anime-back-global-current-anime-information {
    width: 75%;
}

.anime-year, .anime-duration, .anime-rating {
    margin-top: 10px;
    color: var(--anime-header-next-episode-block-color);
}

.anime-eng-jpg-name {
    margin-top: 20px;
    display: flex;
    height: 20px !important;
    border-radius: 4px;
    color: var(--anime-header-global-info-status-text-color);
    align-items: center;
    justify-content: space-between;
    gap: 5px;
    font-size: 0.9em;
    margin-bottom: 3px;
}

.anime-eng-jpg-name p:nth-child(1) {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.anime-eng-jpg-name p:nth-child(2) {
    white-space: nowrap
}

.anime-title-h2 {
    display: flex;
    min-width: 50%;
    border-radius: 4px;
    align-items: center;
    justify-content: flex-start;
    gap: 5px;
    margin-bottom: 3px;
    /*display: -webkit-box;*/
    /*-webkit-line-clamp: 3;*/
    /*-webkit-box-orient: vertical;*/
    /*overflow: hidden;*/
}

.anime-title-h2 h1 {
    user-select: auto;
}

.anime-score {
    display: flex;
    height: 20px !important;
    border-radius: 4px;
    font-size: 1em;
    color: var(--status-font-color);
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}

.anime-score p:nth-child(1) {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.anime-score p:nth-child(1) i {
    font-size: 1.2em;
    margin-right: 10px;
    color: orange;
}

.anime-score-genres {
    display: flex;
    gap: 20px;
    align-items: center;
}

.anime-genres-list {
    align-items: center;
    min-height: 21px;
    display: flex;
    border-radius: 4px;
    font-size: 1em;
    overflow: hidden;
    color: var(--anime-header-global-info-genres-list-text-color);
    gap: 10px;
}

.anime-genres-list a {
    transition: color 0.2s ease-in-out;
    white-space: nowrap;
    text-decoration: underline;
}

.anime-genres-list a:hover {
    color: var(--anime-header-global-info-genres-list-text-color-hover);
}

.anime-next-episode-block {
    margin-top: 10px;
    color: var(--anime-header-next-episode-block-color);
}

.anime-back-global-current-anime-information span {
    color: var(--anime-back-global-span-font-color);
}

.anime-status {
    position: relative;
    display: block;
    margin-top: 10px;
    color: var(--anime-header-anime-status-info-block-color);
}

.anime-status .status-core-block {
    color: var(--anime-header-anime-status-core-block-color);
    padding: 2px 10px;
}

.anime-status .status-core-block.ongoing {
    background-color: var(--anime-header-status-core-block-ongoing-color);
}

.anime-status .status-core-block.released {
    background-color: var(--anime-header-status-core-block-released-color);
}

.anime-status .status-core-block.anons {
    background-color: var(--anime-header-status-core-block-anons-color);
}

@media screen and (max-width: 1440px) {
    /*.anime-about p {*/
    /* -webkit-line-clamp: 5 !important;*/
    /*}*/
}

@media screen and (max-width: 1024px) {
    /*.anime-background {*/
    /*  min-height: 661px !important;*/
    /*}*/
    /*.anime-title-h2 {*/
    /* -webkit-line-clamp: 2 !important;*/
    /*}*/
}

@media screen and (max-width: 768px) {
    /*.anime-background {*/
    /*  min-height: 1231px !important;*/
    /*}*/
    .anime-eng-jpg-name {
        margin: 0 0 3px 0;
    }

    /* tranformerrrrniii */
    .anime-back-global-info {
        flex-direction: column;
        align-items: center;
    }

    .anime-back-panel-left {
        width: 60%;
    }

    .anime-back-global-current-anime-information {
        width: 98%;
    }

    /*.anime-back-content {*/
    /*  margin-top: 400px !important;*/
    /*}*/
}

@media screen and (max-width: 600px) {
    /*.anime-background {*/
    /*  min-height: 1100px !important;*/
    /*}*/
    .anime-back-panel-left {
        width: 60%;
    }

    .anime-back-content {
        margin-top: 200px !important;
    }
}

@media screen and (max-width: 500px) {
    /*.anime-background {*/
    /*  min-height: 1016px !important;*/
    /*}*/
}

@media screen and (max-width: 425px) {
    .anime-back-content {
        margin-top: 100px !important;
    }

    .anime-title-h2 {
        min-height: 31px;
    }

    /*.anime-background {*/
    /*  min-height: 853px !important;*/
    /*}*/
    .anime-about {
        text-align: center;
    }
}

@media screen and (max-width: 375px) {
    /*.anime-background {*/
    /*  min-height: 911px !important;*/
    /*}*/
}
</style>
