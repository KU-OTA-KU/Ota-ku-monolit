<?php

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCO. Read manga online</title>
  <link rel="shortcut icon" href="./assets/images/fav-icon.png" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="css/palette_dark.css" />
  <link rel="stylesheet" href="css/scrollbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="src/components/_header/header.css" />
  <link rel="stylesheet" href="src/components/_cursor/cursor.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="src/components/_filter/filter.css" />
  <link rel="stylesheet" href="src/components/_content/content.css" />
</head>

<body>
  <!-- cursor Init start -->
  <?php include_once 'src/components/_cursor/cursor.php'; ?>
  <!-- cursor Init End -->
  <!-- header Init start -->
  <?php include_once 'src/components/_header/header.php'; ?>
  <!-- header Init End -->
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
</body>
<!-- scripts -->
<!-- dependecies -->
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>

<script src="js/_cursor/cursor.js"></script>
<script src="js/animeList.js"></script>
<script src="./js/logo.js"></script>
<script src="./js/filter.js"></script>
<script src="./js/getManga.js"></script>

</html>