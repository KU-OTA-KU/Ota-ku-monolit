@php
    require_once ('php/inc/other/theme_init.php');
@endphp
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
    <meta name="google-adsense-account" content="ca-pub-8586315114228333">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8586315114228333" crossorigin="anonymous"></script>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Vahe Sargsyan">
    <meta name="reply-to" content="w33bv.gl@domain.com">
    <meta name="url" content="https://ota-ku.ru">
    <meta name="identifier-URL" content="https://ota-ku.ru">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="1 day">
    <link class="currentTheme" rel="stylesheet" href="css/palette/<?php echo $currentTheme ?>.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://www.ota-ku.ru/" fetchpriority="high">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    @yield('content')
</div>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
        integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
