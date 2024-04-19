<?php
global $isMobile;
require_once('inc/other/set_mobile_cookie.php');

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
    <link rel="stylesheet" href="css/flickity.min.css">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OTA-KU: Смотреть аниме онлайн бесплатно в хорошем качестве</title>
    <!-- SEO -->
    <link rel="shortcut icon" href="assets/images/ota-ku-sign.ico" type="image/x-icon">
    <meta name="description" content="OTA-KU - ваш путеводитель в мир аниме. Наши рекомендации и обширная коллекция помогут вам насладиться лучшими аниме.">
    <meta name="keywords" content="OTA-KU, аниме, сайт, смотреть, онлайн, рекомендации">
    <script src="js/other/mobileMode.js"></script>
    <link rel="stylesheet" href="src/_root/root.css"/>
    <link rel="stylesheet" href="css/palette_dark.css"/>
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="css/main.css"/>

    <link rel="stylesheet" href="src/components/header/header.css"/>
    <link rel="stylesheet" href="src/components/flickity/flickity.css"/>
    <link rel="stylesheet" href="src/components/genres/genres.css"/>
    <link rel="stylesheet" href="src/components/most/most.css"/>
    <link rel="stylesheet" href="src/components/banners/banners.css"/>
    <link rel="stylesheet" href="src/components/popular/popular.css"/>
    <link rel="stylesheet" href="src/components/filter/filter.css"/>
    <link rel="stylesheet" href="src/components/content/content.css"/>
    <link rel="stylesheet" href="src/components/footer/footer.css"/>
    <link rel="stylesheet" href="src/_root/index.css"/>
</head>

<body>
<!-- header Init start -->
<?php include_once 'src/components/header/header.php'; ?>
<!-- header Init End -->
<!-- heading Init start -->
<?php include_once 'src/components/flickity/flickity.php'; ?>
<!-- heading Init end -->
<!-- all genres Init Start -->
<?php include_once 'src/components/genres/genres.php'; ?>
<!-- all genres Init End -->
<!-- most Init Start -->
<?php
if (!$isMobile) {
  include_once 'src/components/most/most.php';
}
?>
<!-- most Init End -->
<!-- popular Init Start -->
<?php
if (!$isMobile) {
  include_once 'src/components/popular/popular.php';
}
?>
<!-- popular Init End -->
<!-- anime Ban_1 Init Start -->
<?php include_once 'src/components/banners/ban_1_type_1.php'; ?>
<!-- anime Ban_1 Init End-->
<!-- main Start -->
<main class="main">
    <div class="main-inner">
        <div class="main-tit">
            <!-- filter Init Start -->
          <?php include_once 'src/components/filter/filter.php'; ?>
            <!-- filter Init End -->
            <!-- content Start -->
          <?php include_once 'src/components/content/content.php'; ?>
            <!-- content End -->
        </div>
    </div>
</main>
<!-- main End -->
<!-- footer Init Start -->
<?php include_once 'src/components/footer/footer.php'; ?>
<!-- footer Init End -->

<!-- scripts -->
<script>
    if (!checkMobileModeStatus()) {
        let script1 = document.createElement('script');
        script1.src = 'js/most/mostAnimes.js';
        script1.defer = true;
        document.body.appendChild(script1);

        let script2 = document.createElement('script');
        script2.src = 'js/popular/popularAnimes.js';
        script2.defer = true;
        document.body.appendChild(script2);
    }
</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
        integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/flickity/genres.js"></script>
<script src="js/flickity/popularAnimes.js"></script>
<script src="js/topSlider/flickityTopAnimes.js"></script>

<script defer src="js/_BLACKLIST.js"></script>
<script defer src="js/other/delay.js"></script>
<script defer src="js/other/shuffleArray.js"></script>
<script defer src="js/other/scrollToAnchor.js"></script>

<script defer src="js/animeList.js"></script>
<script defer src="js/filter/filter.js"></script>
<script defer>
    async function __INIT__() {
        await flickityTopAnimesOpen(5);
        if (!checkMobileModeStatus()) {
            await delay(500);
            await mostFetchOnGoing(5);
            await fetchPopularAnimes(11);
        }
        await fetchAnimeData();
    }

    window.addEventListener('load', async () => {
        console.log("%cНачинаю Выполнение запросов...", "color: aqua");
        await __INIT__()
    });
</script>
</body>
</html>