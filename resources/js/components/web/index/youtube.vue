<template xmlns="http://www.w3.org/1999/html">
    <section class="youtube-videos">
        <div class="youtube-videos-inner">
            <div class="youtube-videos-title">
                <h3>Последние видео</h3>
                <span>Будьте в курсе самых последних обновлений нашего канала</span>
            </div>
            <div class="videos-container" v-if="videoList">
                <div v-for="video in videoList" :key="video.id.videoId" class="yt-container"
                     @click="goToYoutubeVideo(video.id.videoId)">
                    <div class="yt-container-image">
                        <img :src="video.snippet.thumbnails.high.url" :alt="video.snippet.title">
                    </div>
                    <div class="yt-container-info">
                        <p>{{ video.snippet.title }}</p>
                        <span> {{ formatDate(video.snippet.publishedAt) }} <span
                            class="dot">•</span> {{ video.snippet.channelTitle }}</span>
                    </div>
                </div>
            </div>
            <div class="videos-container" v-if="videoList.length === 0">
                <div class="yt-container">
                    <div class="yt-container-image skeleton-bg skeleton-cell-slide skeleton-border-radius">
                    </div>
                    <div class="yt-container-info">
                        <p class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></p>
                        <span class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></span>
                    </div>
                </div>
                <div class="yt-container">
                    <div class="yt-container-image skeleton-bg skeleton-cell-slide skeleton-border-radius">
                    </div>
                    <div class="yt-container-info">
                        <p class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></p>
                        <span class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></span>
                    </div>
                </div>
                <div class="yt-container">
                    <div class="yt-container-image skeleton-bg skeleton-cell-slide skeleton-border-radius">
                    </div>
                    <div class="yt-container-info">
                        <p class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></p>
                        <span class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></span>
                    </div>
                </div>
                <div class="yt-container">
                    <div class="yt-container-image skeleton-bg skeleton-cell-slide skeleton-border-radius">
                    </div>
                    <div class="yt-container-info">
                        <p class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></p>
                        <span class="skeleton-cell-slide skeleton-bg skeleton-height skeleton-border-radius"></span>
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
            videoList: [],
            apiKey: 'AIzaSyDHOe3BtTGvzLaIBxekCyylM6DYTXrLFSE',
            channelId: 'UC4W8zn36O0oZwgzE_UnV7ng'
        };
    },
    mounted() {
        setTimeout(() => {
            this.fetchVideosInChannel();
        }, "2000")
    },
    methods: {
        async fetchVideosInChannel() {
            const url = `https://www.googleapis.com/youtube/v3/search?key=${this.apiKey}&channelId=${this.channelId}&part=snippet&order=date&maxResults=4`;
            try {
                const response = await fetch(url);
                const data = await response.json();
                this.videoList = data.items;
                console.log(this.videoList)
            } catch (error) {
                console.error('Ошибка при получении видео:', error);
            }
        },
        goToYoutubeVideo(videoId) {
            const videoUrl = `https://www.youtube.com/watch?v=${videoId}`;
            window.open(videoUrl, '_blank');
        },
        formatDate(publishedAt) {
            const date = new Date(publishedAt);
            return date.toLocaleDateString();
        }
    }
};
</script>

<style lang="scss" scoped>
.youtube-videos {
    padding: 0 10px;
    width: 100%;

    &-inner {
        max-width: var(--ota-ku-max-width);
        width: 100%;
        margin: 0 auto;

        .youtube-videos-title {
            width: 100%;
            margin: 20px 0 10px 0;
        }

        .videos-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 10px;

            .yt-container {
                background-color: var(--cl-16);
                width: 100%;
                padding: 10px;
                border-radius: 10px;
                cursor: pointer;

                &:hover {
                    .yt-container-image {
                        img {
                            transform: scale(1.2) !important;
                        }
                    }
                }

                &-image {
                    width: 100%;
                    position: relative;
                    //height: 160px;
                    aspect-ratio: 1/ 0.62;
                    overflow: hidden;
                    border-radius: 10px;

                    img {
                        transition: transform 0.2s ease-in-out;
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        object-fit: cover;
                        object-position: center;
                        transform: scale(1.1);
                    }
                }

                &-info {
                    display: flex;
                    width: 100%;
                    height: 70px;
                    flex-direction: column;
                    justify-content: space-between;

                    p {
                        margin: 5px 0 5px 0;
                    }

                    span {
                        display: flex;
                        align-items: center;

                        .dot {
                            padding: 0 5px;
                        }
                    }
                }
            }
        }
    }
}

@media screen and (min-width: 940px) and (max-width: 1249px) {
    .youtube-videos-inner {
        .yt-container:last-child {
            display: none;
        }
    }
}
</style>
