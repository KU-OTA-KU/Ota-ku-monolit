<?php
require_once('inc/other/theme_init.php');
if (isset($_GET['animeId'])) {
  $currentAnime = $_GET['animeId'];

  if (isset($_GET['voice'])) {
    $animeVoice = $_GET['voice'];
  } else if (isset($_COOKIE['selectedVoice'])) {
    $animeVoice = $_COOKIE['selectedVoice'];
  } else {
    $animeVoice = "null";
  }
  echo "<script>let currentAnimeVoice = $animeVoice</script>";
  echo "<script>let currentAnime = $currentAnime;</script>";
  // echo $currentAnime;
} else {
  echo "get parameter id not defined!";
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XKSYJXXKPB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-XKSYJXXKPB');
    </script>
    <!-- Yandex.RTB -->
    <script>window.yaContextCb = window.yaContextCb || []</script>
    <script src="https://yandex.ru/ads/system/context.js" async></script>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OTA-KU Смотрть Аниме</title>
    <link rel="shortcut icon" href="assets/images/Ota-ku-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="src/_root/root.css"/>
    <link class="theme-link" rel="stylesheet" href="css/palette/<?php echo $currentTheme; ?>.css"/>
    <link rel="stylesheet" href="css/scrollbar.css">

    <link rel="stylesheet" href="src/components/header/header.css"/>
    <link rel="stylesheet" href="src/components/animeHeader/animeHeader.css"/>
    <link rel="stylesheet" href="src/components/animeDescription/animeDescription.css"/>
    <link rel="stylesheet" href="src/components/stills/animeStills.css"/>
    <link rel="stylesheet" href="src/components/player/player.css"/>
    <link rel="stylesheet" href="src/components/banners/banners.css"/>
    <link rel="stylesheet" href="src/components/animeRelated/animeRelated.css"/>
    <link rel="stylesheet" href="src/components/charactersList/characters.css"/>
    <link rel="stylesheet" href="src/components/footer/footer.css"/>

    <link rel="stylesheet" href="src/_root/anime.css"/>
</head>

<body>
<!-- header Init Start -->
<?php include_once 'src/components/header/header.php'; ?>
<!-- header Init End -->
<!-- anime header Init Start -->
<?php include_once 'src/components/animeHeader/animeHeader.php'; ?>
<!-- anime header Init End -->
<!-- anime description start-->
<?php include_once "src/components/animeDescription/animeDescription.php"; ?>
<!-- anime description End-->
<!-- anime Stills Init Start -->
<?php include_once 'src/components/stills/animeStills.php'; ?>
<!-- anime Stills Init End -->
<section class="ban_1-container">
    <div class="ban_1-container-inner">
        <div class="ban_1-container-tit">
            <!-- Yandex.RTB R-A-7609325-4 -->
            <div id="yandex_rtb_R-A-7609325-4"></div>
            <script>
                window.yaContextCb.push(() => {
                    Ya.Context.AdvManager.render({
                        "blockId": "R-A-7609325-4",
                        "renderTo": "yandex_rtb_R-A-7609325-4"
                    })
                })
            </script>
        </div>
    </div>
</section>
<!-- anime player Init Start -->
<?php include_once 'src/components/player/player.php'; ?>
<!-- anime player Init End -->
<section class="ban_1-container">
    <div class="ban_1-container-inner">
        <div class="ban_1-container-tit">
            <!-- Yandex.RTB R-A-7609325-5 -->
            <div id="yandex_rtb_R-A-7609325-5"></div>
            <script>
                window.yaContextCb.push(() => {
                    Ya.Context.AdvManager.render({
                        "blockId": "R-A-7609325-5",
                        "renderTo": "yandex_rtb_R-A-7609325-5"
                    })
                })
            </script>
        </div>
    </div>
</section>
<!-- anime related Init Start-->
<?php include_once 'src/components/animeRelated/animeRelated.php'; ?>
<!-- anime related Init End-->
<!-- anime characters Init Start -->
<?php include_once 'src/components/charactersList/characters.php' ?>
<!-- anime charactrs Init End -->
<!-- anime footer Init Start -->
<?php include_once 'src/components/footer/footer.php'; ?>
<!-- anime footer Init End -->

<!-- scripts -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
        integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="js/anime/getAnimeInKodik.js"></script>-->
<script defer>
    // var kodikAddPlayers = {
    //     width: "100%",
    //     height: "100%",
    //     onDomReady: false,
    //     shikimoriID: `${currentAnime}`,
    //     foundCallback: function (data, link) {
    //     },
    //     notFoundCallback: function (data) {
    //         console.log("eta anime chkaa ara");
    //         animesNotfound()
    //     },
    //     translationID: "voices",
    //     types: "anime,anime-serial",
    // };
    //
    // !function (e, n, t, r, a) {
    //     r = e.createElement(n), a = e.getElementsByTagName(n)
    //         [0], r.async = !0, r.src = t, a.parentNode.insertBefore(r, a)
    // }
    // (document, "script", "//kodik-add.com/add-players.min.js");

    async function displaySelectEpisode() {
        let kodikSelector = document.getElementById("kodik-player");

        let noAnimeHTML = `
      <div class="kodik-anime-not-found">
        <h3>Для начала выберите серию из списка! 😊.</h3>
      </div>
    `;
        kodikSelector.insertAdjacentHTML('beforeend', noAnimeHTML);
    }

    function displayAnime(data, voice, episode, season) {
        console.log("eta data" + voice + "wdwdw " + season)
        let currAnimeData = data.results.find(item => item.translation.id === currentAnimeVoice);
        console.log(currAnimeData)
        let currAnimeEpisode = currAnimeData.seasons[season].episodes[episode].link;
        let kodikIframe = document.querySelector("#kodik-player iframe");
        kodikIframe.src = currAnimeEpisode;
        console.log(currAnimeEpisode)
    }

    function changeEpisode(data, season, episode, voice) {
        let player = document.querySelector("#kodik-player iframe");
        player.src = data;

        let deletedLastActive = document.querySelector(".seasons-container a.active");
        if(deletedLastActive) {
            deletedLastActive.classList.remove("active");
            console.log(deletedLastActive);
        }
        let activeLink = document.querySelector(`.seasons-container a[data-animeepisode='${episode}'][data-animeseason='${season}']`);
        activeLink.classList.add("active");
        console.log(activeLink)
    }

    fetch(`https://kodikapi.com/search?token=3cf56f8708e24622e6a5cc6747d0d3ee&shikimori_id=${currentAnime}&with_seasons=true&with_episodes_data=true&with_material_data=true`)
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.results.length === 0) {
                console.log("epmtyAnimeNOt found");
                let player = document.querySelector(".player")
                player.style.display = "none";
            } else {
                let voicesBlockContainer = document.querySelector(".voices-and-subtitles-container");

                data.results.forEach(function (item) {
                    console.log(item.translation.title);

                    let totalEpisodesCount = 0;
                    if (item.seasons) {
                        Object.values(item.seasons).forEach(season => {
                            if (season.episodes) {
                                totalEpisodesCount += Object.keys(season.episodes).length;
                            }
                        });
                    }

                    let VoicesLinkTemplateHTML = `
                <a class="voice-${item.translation.id}" href="/anime.php?animeId=${currentAnime}&voice=${item.translation.id}">
                    ${item.translation.title}
                    <span>${totalEpisodesCount} серии</span>
                </a>
            `;
                    voicesBlockContainer.insertAdjacentHTML('beforeend', VoicesLinkTemplateHTML);
                });

                let seasonsBlockContainer = document.querySelector(".seasons-container");
                let currentAnimeResult;
                if (currentAnimeVoice === null) {
                    currentAnimeResult = data.results[0];
                    currentAnimeVoice = data.results[0].translation.id;
                } else if (data.results.find(item => item.translation.id === currentAnimeVoice)) {
                    currentAnimeResult = data.results.find(item => item.translation.id === currentAnimeVoice);
                } else if (data.results.find(item => item.translation.id !== currentAnimeVoice)) {
                    currentAnimeResult = data.results[0];
                    currentAnimeVoice = data.results[0].translation.id;
                    console.log("sins")
                } else {
                    currentAnimeResult = data.results[0];
                    currentAnimeVoice = data.results[0].translation.id;
                    console.log("sins")
                }

                if (currentAnimeVoice === null) {
                    let activeVoiceContLink = document.querySelector(".voices-and-subtitles-container a:nth-child(1)");
                    activeVoiceContLink.classList.add("active");
                } else if (data.results.find(item => item.translation.id === currentAnimeVoice)) {
                    console.log(currentAnimeVoice)
                    let activeVoiceContLink = document.querySelector(`.voice-${currentAnimeVoice}`);
                    activeVoiceContLink.classList.add("active");
                } else {
                    let activeVoiceContLink = document.querySelector(".voices-and-subtitles-container a:nth-child(1)");
                    activeVoiceContLink.classList.add("active");
                }

                if (currentAnimeResult) {
                    console.log(currentAnimeResult);
                    for (let seasonIndex in currentAnimeResult.seasons) {
                        if (currentAnimeResult.seasons.hasOwnProperty(seasonIndex)) {
                            let season = currentAnimeResult.seasons[seasonIndex];
                            for (let key in season.episodes) {
                                if (season.episodes.hasOwnProperty(key)) {
                                    let episode = season.episodes[key];
                                    let link = season.episodes[key].link;
                                    console.log(link)
                                    let episodeBlockContainerHTML = `
                    <a onclick="changeEpisode('${link}', ${seasonIndex}, ${key}, ${currentAnimeVoice})" data-animeEpisode="${key}" data-animeSeason="${seasonIndex}" class="anime-episode-${key}" href="javascript:void(0)">Сезон ${seasonIndex}, Серия ${key}</a>
                                `;
                                    seasonsBlockContainer.insertAdjacentHTML('beforeend', episodeBlockContainerHTML);
                                }
                            }
                        }
                    }
                }

                displaySelectEpisode()

                // let selectedSeason;
                // if (currentEpisode === null) {
                //     let activeEpisodesBlock = document.querySelector(".seasons-container a:nth-child(1)");
                //     activeEpisodesBlock.classList.add("active");
                //     selectedSeason = activeEpisodesBlock.getAttribute("data-animeSeason");
                //     console.log("wdw")
                // } else if (currentEpisode === "empty") {
                //     let activeEpisodesBlockFirst = document.querySelector(".seasons-container a:nth-child(1)");
                //     currentEpisode = activeEpisodesBlockFirst.getAttribute("data-animeEpisode");
                //     let activeEpisodesBlock = document.querySelector(`.anime-episode-${currentEpisode}`);
                //     selectedSeason = activeEpisodesBlock.getAttribute("data-animeSeason");
                //     activeEpisodesBlock.classList.add("active");
                // } else {
                //     console.log(currentEpisode)
                //     let activeEpisodesBlock = document.querySelector(`.anime-episode-${currentEpisode}`);
                //     console.log(activeEpisodesBlock)
                //     selectedSeason = activeEpisodesBlock.getAttribute("data-animeSeason");
                //     activeEpisodesBlock.classList.add("active");
                // }
                // console.log(selectedSeason)
                // displayAnime(data, currentAnimeVoice, currentEpisode, selectedSeason)
            }
        })
        .catch(error => {
            console.error('fetch error => ', error);
        });

</script>
<script defer src="js/_BLACKLIST.js"></script>
<script defer src="js/other/delay.js"></script>
<script defer src="js/other/scrollToAnchor.js"></script>

<script defer src="js/anime/getCurrAnime.js"></script>
<script defer src="js/anime/appendAnimeInSite.js"></script>
<script defer src="js/animeRelated/animeRelated.js"></script>
<script defer src="js/anime/selectVoicesOrSeasons.js"></script>
<script defer>
    async function __INIT__() {
        await getCurrAnime(currentAnime);
    }

    window.addEventListener('load', async () => {
        console.log("%cStarting Request Execution...", "color: aqua");
        await __INIT__()
    });
</script>
</body>

</html>