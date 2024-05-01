@php
require_once ('php/inc/other/theme_init.php');
@endphp

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTA-KU Смотреть аниме онлайн бесплатно в хорошем качестве</title>
  <link class="currentTheme" rel="stylesheet" href="css/palette/<?php echo $currentTheme ?>.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
  <div id="app">
    @yield('content')
  </div>
  
  <script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>