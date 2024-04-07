<?php 
if(isset($_GET['animeId'])) {
  $currentAnime = $_GET['animeId'];
  echo "<script>currAnime = $currentAnime;</script>";
  // echo $currentAnime;
} else {
  echo "get parametr id not defined!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CurrAnime</title>
  <link rel="shortcut icon" href="assets/images/fav-icon.png" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="css/palette_dark.css" />
  <link rel="stylesheet" href="css/scrollbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="src/components/header/header.css" />
</head>
<body>
  <!-- header Init Start -->
  <?php include_once 'src/components/header/header.php';?>
  <!-- header Init End -->
</body>
<script src="js/getCurrAnime.js"></script>
<script src="js/anime/appendAnimeInSite.js"></script>
<script src="js/logo.js"></script>
</html>