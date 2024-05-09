<template>
    <!-- PRIMARY HEADER INIT START-->
    <primary-header></primary-header>
    <!-- PRIMARY HEADER INIT END -->
    <!-- ANIME HEADER INIT START -->
    <anime-header ref="AnimeHeader"></anime-header>
    <!-- ANIME HEADER INIT END -->
    <!-- ANIME HEADER INIT START -->
    <anime-description ref="AnimeDescription"></anime-description>
    <!-- ANIME HEADER INIT END -->
    <!-- ANIME STILLS INIT START -->
    <anime-stills ref="AnimeStills"></anime-stills>
    <!-- ANIME STILLS INIT END -->
    <!-- PLAYER INIT START -->
    <div id="yandex_rtb_R-A-7609325-4"></div>
    <player ref="player"></player>
    <div id="yandex_rtb_R-A-7609325-5"></div>
    <!-- PLAYER INIT END -->
    <!-- ANIME CHARACTERS INIT START -->
    <anime-characters ref="AnimeCharacters"></anime-characters>
    <!-- ANIME CHARACTERS INIT END -->
    <!-- ANIME RELATED LIST INIT START -->
    <anime-related ref="AnimeRelated"></anime-related>
    <!-- ANIME RELATED LIST INIT END -->
    <!-- FOOTER INIT START -->
    <Footer></Footer>
    <!-- FOOTER INIT END -->
</template>

<script>
import Footer from "@/components/web/footer.vue";
import PrimaryHeader from "@/components/web/primaryHeader.vue";
import AnimeHeader from "@/components/web/animeHeader.vue";
import AnimeDescription from "@/components/web/animeDescription.vue"
import AnimeStills from "@/components/web/animeStills.vue";
import Player from "@/components/web/player.vue";
import AnimeCharacters from "@/components/web/animeCharacters.vue";
import AnimeRelated from "@/components/web/animeRelated.vue";

import { bann_1 } from "@/other/banner/bann_1.js";
import { bann_2 } from "@/other/banner/bann_2.js";
export default {
    data() {
        return {
            bann_1,
            bann_2,
            animeDataReadyEventCreated: false
        };
    },
    components: {
        PrimaryHeader, AnimeHeader, AnimeDescription, AnimeStills, Player, AnimeCharacters, AnimeRelated, Footer
    },
    mounted() {
        console.log('Anime mounted!');
        window.scrollTo({top: 0});
        let headerNavigation = document.querySelector(".header-navigation");
        let headerSearch = document.querySelector(".header-search");
        let headerMobileSearch = document.querySelector(".search");
        headerMobileSearch.style.display = "none";
        headerNavigation.style.display = "none";
        headerSearch.style.display = "none";
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
            // init animeHeader
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
