<template>
    <primary-header></primary-header>
    <anime-header ref="AnimeHeader"></anime-header>
    <section class="anime-cont">
        <div class="anime-cont-inner">
            <div class="anime-cont-info-bar">
            </div>
            <div class="anime-cont-anime-contents-bar">
                <anime-description ref="AnimeDescription"></anime-description>
                <anime-stills ref="AnimeStills"></anime-stills>
                <player ref="player"></player>
                <anime-characters ref="AnimeCharacters"></anime-characters>
                <anime-related ref="AnimeRelated"></anime-related>
            </div>
        </div>
    </section>
    <Footer></Footer>
</template>

<script>
import Footer from "@/components/web/footer.vue";
import PrimaryHeader from "@/components/web/primaryHeader.vue";
import AnimeHeader from "@/components/web/anime/animeHeader.vue";
import AnimeDescription from "@/components/web/anime/animeDescription.vue"
import AnimeStills from "@/components/web/anime/animeStills.vue";
import Player from "@/components/web/player.vue";
import AnimeCharacters from "@/components/web/animeCharacters.vue";
import AnimeRelated from "@/components/web/animeRelated.vue";

export default {
    data() {
        return {
            animeDataReadyEventCreated: false
        };
    },
    components: {
        PrimaryHeader, AnimeHeader, AnimeDescription, AnimeStills, Player, AnimeCharacters, AnimeRelated, Footer
    },
    mounted() {
        console.log('Anime mounted!');
        window.scrollTo({top: 0});
        let header = document.getElementsByTagName("header")[0];
        header.style.position = "fixed";
        header.style.backgroundColor = "transparent";
        header.style.backdropFilter = "blur(7px)";
        header.style.boxShadow = "none";
        const animeId = this.$route.query.animeId;
        // console.log(animeId)
        this.getCurrAnime(animeId)

        this.$watch(
            () => this.$route.query.animeId,
            (newValue, oldValue) => {
                if (newValue !== oldValue) {
                    this.getCurrAnime(newValue);
                    this.$refs.player.fetchData();
                }
            }
        );
    },
    methods: {
        async appendAnimeInSite(data) {
            sessionStorage.removeItem("CurrentAnime");
            data = JSON.stringify(data);
            sessionStorage.setItem("CurrentAnime", data);
            window.myData = data;

            await this.$nextTick();
            this.$refs.AnimeHeader.main();
            this.$refs.AnimeStills.main();
            this.$refs.AnimeDescription.main();
            this.$refs.AnimeCharacters.main();
            this.$refs.AnimeRelated.main();
        },
        async getCurrAnime(animeId) {
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
                    animes(ids: "${animeId}", limit: 1) {
                      id
                      name
                      russian
                      english
                      japanese
                      kind
                      score
                      status
                      duration
                      rating
                      poster {
                        originalUrl
                      }
                      genres {
                        id
                        name
                        russian
                        kind
                      }
                      airedOn {
                        year
                      }
                      screenshots {
                        id
                        x332Url
                      }
                      characterRoles {
                        id
                        rolesRu
                        rolesEn
                        character {
                          id
                          name
                          russian
                          poster {
                            id
                            mini2xUrl
                          }
                        }
                      }
                      related {
                        anime {
                          id
                          russian
                          kind
                          airedOn {
                            year
                          }
                          poster {
                            mini2xUrl
                          }
                        }
                        relationRu
                      }
                      nextEpisodeAt
                      description
                    }
                  }
                `,
                    }),
                });

                const data = await response.json();
                console.log("%cУСПЕШНО!", "color: greenyellow");
                const anime = data.data.animes;
                console.log(anime);
                this.appendAnimeInSite(anime);
                document.title = `${anime[0].russian} Смотреть аниме онлайн`;
            } catch (error) {
                console.warn("Request error => ", error);
            }
        },
    }
}
</script>
<style lang="scss" scoped>
.anime-cont {
    padding: 10px;
    width: 100%;

    &-inner {
        max-width: var(--ota-ku-max-width);
        width: 100%;
        margin: 0 auto;
        display: flex;

        .anime-cont-info-bar {
            width: 25%;
        }

        .anime-cont-anime-contents-bar {
            width: 75%;
        }
    }
}
</style>
