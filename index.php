<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="css/flickity.min.css">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OTA-KU Смотреть аниме Онлайн</title>
    <link rel="shortcut icon" href="./assets/images/fav-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="src/_root/root.css"/>
    <link rel="stylesheet" href="css/palette_dark.css"/>
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="css/main.css"/>

    <link rel="stylesheet" href="src/components/header/header.css"/>
    <link rel="stylesheet" href="src/components/flickity/flickity.css"/>
    <link rel="stylesheet" href="src/components/genres/genres.css"/>
    <link rel="stylesheet" href="src/components/most/most.css"/>
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
<?php include_once 'src/components/most/most.php'; ?>
<!-- most Init End -->
<!-- popular Init Start -->
<?php include_once 'src/components/popular/popular.php'; ?>
<!-- popular Init End -->
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
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js" integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/flickity/genres.js"></script>
<script src="js/flickity/popularAnimes.js"></script>
<script src="js/topSlider/flickityTopAnimes.js"></script>

<script defer src="js/_BLACKLIST.js"></script>
<script defer src="js/other/delay.js"></script>
<script defer src="js/other/shuffleArray.js"></script>
<script defer src="js/other/scrollToAnchor.js"></script>

<script defer src="js/most/mostAnimes.js"></script>
<script defer src="js/popular/popularAnimes.js"></script>
<script defer src="js/animeList.js"></script>

<script defer src="js/filter/filter.js"></script>
<script defer>
    async function __INIT__() {
        await flickityTopAnimesOpen(5);
        await delay(500);
        await mostFetchOnGoing(5);
        await delay(1000);
        await fetchPopularAnimes(11);
        await delay(1000);
        await fetchAnimeData();
    }

    window.addEventListener('load', async () => {
        console.log("%cНачинаю Выполнение запросов...", "color: aqua");
        await __INIT__()
    });
</script>

</body>
</html>