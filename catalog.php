<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCO Смотреть аниме Онлайн</title>
  <link rel="shortcut icon" href="./assets/images/fav-icon.png" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="css/palette_dark.css" />
  <link rel="stylesheet" href="css/scrollbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="src/components/header/header.css" />
  <link rel="stylesheet" href="src/components/genres/genres.css" />
  <link rel="stylesheet" href="src/components/footer/footer.css" />
  <link rel="stylesheet" href="src/_root/catalog.css">
  <link rel="stylesheet" href="src/components/_content/content.css" />
  <link rel="stylesheet" href="src/components/_filter/filter.css" />
</head>

<body>
  <!-- anime header Init Start -->
  <?php include_once 'src/components/header/header.php'; ?>
  <!-- anime header Init End -->
  <!-- all genres Init Start -->
  <?php include_once 'src/components/genres/genres.php'; ?>
  <!-- all genres Init End -->
  <!-- main Start -->
  <main class="main">
    <div class="main-inner">
      <div class="main-tit">
        <!-- filter Init Start -->
        <?php include_once 'src/components/_filter/filter.php'; ?>
        <!-- filter Init End -->
        <!-- content Start -->
        <?php include_once 'src/components/_content/content.php'; ?>
        <!-- content End -->
      </div>
    </div>
  </main>
  <!-- main End -->
  <!-- footer Init Start -->
  <?php include_once 'src/components/footer/footer.php'; ?>
  <!-- footer Init End -->
</body>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
  integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/logo.js"></script>
<script src="js/_BLACKLIST.js"></script>

<script defer src="js/flickity/genres.js"></script>

<script src="js/other/cursorGrapToScrool.js"></script>
<script src="js/other/shuffleArray.js"></script>
<script src="js/genAnimeListSkeleton.js"></script>
<script src="js/genres/scrollbar.js"></script>
<script src="js/filter/filter.js"></script>
<script src="js/filter/openCustomSelect.js"></script>
<script src="js/displayAnimeList.js"></script>
<script src="js/filterSearchSystem.js"></script>
</html>