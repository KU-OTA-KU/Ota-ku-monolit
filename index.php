<?php
require_once "./inc/connect.php";

$sql = "SELECT * FROM `manga` ORDER BY RAND()";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCO. Read manga online</title>
  <link rel="stylesheet" href="css/root.css" />
  <link rel="stylesheet" href="css/palette.css" />
  <!-- header -->
  <link rel="stylesheet" href="css/header.css" />
  <!-- main -->
  <link rel="stylesheet" href="css/main.css" />
  <!-- icon -->
  <link rel="shortcut icon" href="./assets/images/fav-icon.png" type="image/x-icon">
</head>

<body>
  <!-- header Start -->
  <header>
    <div class="header-inner">
      <div class="header-tit">
        <div class="header-log-and-nav">
          <div class="header-logo">
            <img src="./assets/images/animeCo.png" alt="AnimeCO" id="logo" />
          </div>
          <div class="header-navigation">
            <nav>
              <ul>
                <li>
                  <a href="#" class="nav-button"><span>Catalog</span></a>
                </li>
                <li>
                  <a href="#" class="nav-button"><span>Top</span></a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="header-search">
            <form action="#">
              <button type="submit">
                <img src="./assets/images/search.png" alt="search" />
              </button>
              <input type="text" required placeholder="What are we looking for, Senpai?" class="search-input-fa" />
            </form>
            <!-- search result Start -->
            <div class="search-results">wwwww</div>
            <!-- search result End -->
          </div>
        </div>
        <div class="header-login">
          <div class="user-is-reg-1" style="display: none">
            <div class="user">
              <div class="user-cont">
                <p class="user-name">Esudesu</p>
                <span class="user-email">w33bv.gl@gmail.com</span>
              </div>
              <div class="user-img" onclick="userProfile();">
                <img src="assets/images/user.jpg" alt="userimg" />
              </div>
            </div>
          </div>
          <div class="user-is-reg-2" style="display: flex">
            <button>
              <a href="#"><span>Sign in</span></a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header End -->

  <!-- search Start media 630px -->
  <section class="search">
    <div class="search-inner">
      <div class="search-tit">
        <div class="header-search spm-search">
          <form action="#">
            <button type="submit">
              <img src="./assets/images/search.png" alt="search" />
            </button>
            <input type="text" required placeholder="What are we looking for, Senpai?" class="search-input-fa" />
          </form>

          <!-- search result Start -->
          <div class="search-results">wwwww</div>
          <!-- search result End -->
        </div>
      </div>
    </div>
  </section>
  <!-- search End media 630px -->

  <!-- main Start -->
  <main class="main">
    <div class="main-inner">
      <div class="main-tit">
        <!-- filter Start -->
        <section class="main-filter">
          <div class="filter-clear">
            <p>Filters</p>
            <button>
              <span>Clear</span>
              <img src="./assets/images/close.png" alt="clear" />
            </button>
          </div>
          <div class="filter-selector">
            <form action="index.php">
              <div class="filter-fl-genre filter-box">
                <label for="select-type">type:</label>
                <select id="select-type" name="type">
                  <option value="Manga">Manga</option>
                  <option value="Manhwa">Manhwa</option>
                  <option value="Manhua">Manhua</option>
                  <option value="Rumanga">Rumanga</option>
                  <option value="OEL-manga">OEL-manga</option>
                  <option value="Western Comic">Western Comic</option>
                  <option value="Light Novel">Light Novel</option>
                </select>
                <label for="select-genre">Genre:</label>
                <select id="select-genre" name="genre">
                  <option value="Hentai">Hentai</option>
                  <option value="Madness">Madness</option>
                  <option value="Action">Action</option>
                  <option value="Martial Arts">Martial Arts</option>
                  <option value="Vampires">Vampires</option>
                  <option value="Military">Military</option>
                  <option value="Harem">Harem</option>
                  <option value="Gender Intrigue">Gender Intrigue</option>
                  <option value="Heroic Fantasy">Heroic Fantasy</option>
                  <option value="Demons">Demons</option>
                  <option value="Detective">Detective</option>
                  <option value="Josei">Josei</option>
                  <option value="Doujinshi">Doujinshi</option>
                  <option value="Drama">Drama</option>
                  <option value="Friendship">Friendship</option>
                  <option value="Games">Games</option>
                  <option value="Isekai">Isekai</option>
                  <option value="Historical">Historical</option>
                  <option value="History">History</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Medicine">Medicine</option>
                  <option value="Mecha">Mecha</option>
                  <option value="Mystic">Mystic</option>
                  <option value="Music">Music</option>
                  <option value="Science Fiction">Science Fiction</option>
                  <option value="Omegaverse">Omegaverse</option>
                  <option value="Parody">Parody</option>
                  <option value="Everyday">Everyday</option>
                  <option value="Police">Police</option>
                  <option value="Post-apocalyptic">Post-apocalyptic</option>
                  <option value="Adventure">Adventure</option>
                  <option value="Psychology">Psychology</option>
                  <option value="Romance">Romance</option>
                  <option value="Samurai">Samurai</option>
                  <option value="Supernatural">Supernatural</option>
                  <option value="Shojo">Shojo</option>
                  <option value="Shonen">Shonen</option>
                  <option value="Gender Swap">Gender Swap</option>
                  <option value="Sports">Sports</option>
                  <option value="Superpower">Superpower</option>
                  <option value="Seinen">Seinen</option>
                  <option value="Tragedy">Tragedy</option>
                  <option value="Thriller">Thriller</option>
                  <option value="Horror">Horror</option>
                  <option value="Fantasy">Fantasy</option>
                  <option value="School">School</option>
                  <option value="Erotica">Erotica</option>
                  <option value="Ecchi">Ecchi</option>
                </select>
                <label for="Age-rating">Age rating:</label>
                <select name="Age-rating" id="Age-rating" name="age">
                  <option value="for-all">For all</option>
                  <option value="the-16+">16+</option>
                  <option value="the-18+">18+</option>
                </select>
                <label for="status-selector">Status:</label>
                <select id="status-selector" name="status">
                  <option value="Ongoing">Ongoing</option>
                  <option value="Completed">Completed</option>
                  <option value="Announced">Announced</option>
                  <option value="Suspended">Suspended</option>
                  <option value="Publication Discontinued">
                    Publication Discontinued
                  </option>
                </select>
                <label for="format-select">Format:</label>
                <select id="format-select" name="format">
                  <option value="Compilation">Compilation</option>
                  <option value="Web">Web</option>
                  <option value="Full Color">Full Color</option>
                  <option value="4-Koma (Yonkoma)">4-Koma (Yonkoma)</option>
                  <option value="Webtoon">Webtoon</option>
                  <option value="Single">Single</option>
                  <option value="Doujinshi">Doujinshi</option>
                </select>
              </div>
              <div class="filter-fl-tags filter-box">
                <label for="#">Tags:</label>
                <div class="tags-checkbox">
                  <label>
                    <input type="checkbox" name="genre" value="Dystopia" />
                    Dystopia</label>
                  <label><input type="checkbox" name="genre" value="Apocalypse" />
                    Apocalypse</label>
                  <label><input type="checkbox" name="genre" value="Army" />
                    Army</label>
                  <label><input type="checkbox" name="genre" value="Artifacts" />
                    Artifacts</label>
                  <label><input type="checkbox" name="genre" value="Gods" />
                    Gods</label>
                  <label><input type="checkbox" name="genre" value="Sword Fights" />
                    Sword Fights</label>
                  <label><input type="checkbox" name="genre" value="Power Struggle" />
                    Power Struggle</label>
                  <label><input type="checkbox" name="genre" value="Brother and Sister" />
                    Brother and Sister</label>
                  <label><input type="checkbox" name="genre" value="Future" />
                    Future</label>
                  <label><input type="checkbox" name="genre" value="Witch" />
                    Witch</label>
                  <label><input type="checkbox" name="genre" value="Western" />
                    Western</label>
                  <label><input type="checkbox" name="genre" value="Video Games" />
                    Video Games</label>
                  <label><input type="checkbox" name="genre" value="Virtual Reality" />
                    Virtual Reality</label>
                  <label><input type="checkbox" name="genre" value="Demon Lord" />
                    Demon Lord</label>
                  <label><input type="checkbox" name="genre" value="Military" />
                    Military</label>
                  <label><input type="checkbox" name="genre" value="War" />
                    War</label>
                  <label><input type="checkbox" name="genre" value="Wizards / Mages" />
                    Wizards / Mages</label>
                  <label><input type="checkbox" name="genre" value="Magical Creatures" />
                    Magical Creatures</label>
                  <label><input type="checkbox" name="genre" value="Memories from Another World" />
                    Memories from Another World</label>
                  <label><input type="checkbox" name="genre" value="Survival" />
                    Survival</label>
                  <label><input type="checkbox" name="genre" value="Female Protagonist" />
                    Female Protagonist</label>
                  <label><input type="checkbox" name="genre" value="Overpowered Protagonist" />
                    Overpowered Protagonist</label>
                  <label><input type="checkbox" name="genre" value="Male Protagonist" />
                    Male Protagonist</label>
                  <label><input type="checkbox" name="genre" value="Gamers" />
                    Gamers</label>
                  <label><input type="checkbox" name="genre" value="Guilds" />
                    Guilds</label>
                  <label><input type="checkbox" name="genre" value="Silly Protagonist" />
                    Silly Protagonist</label>
                  <label><input type="checkbox" name="genre" value="Goblins" />
                    Goblins</label>
                  <label><input type="checkbox" name="genre" value="Maids" />
                    Maids</label>
                  <label><input type="checkbox" name="genre" value="Gyaru" />
                    Gyaru</label>
                  <label><input type="checkbox" name="genre" value="Dragons" />
                    Dragons</label>
                  <label><input type="checkbox" name="genre" value="Cruel World" />
                    Cruel World</label>
                  <label><input type="checkbox" name="genre" value="Animal Companions" />
                    Animal Companions</label>
                  <label><input type="checkbox" name="genre" value="World Conquest" />
                    World Conquest</label>
                  <label><input type="checkbox" name="genre" value="Beast People" />
                    Beast People</label>
                  <label><input type="checkbox" name="genre" value="Evil Spirits" />
                    Evil Spirits</label>
                  <label><input type="checkbox" name="genre" value="Zombies" />
                    Zombies</label>
                  <label><input type="checkbox" name="genre" value="Game Elements" />
                    Game Elements</label>
                  <label><input type="checkbox" name="genre" value="Empires" />
                    Empires</label>
                  <label><input type="checkbox" name="genre" value="Quests" />
                    Quests</label>
                  <label><input type="checkbox" name="genre" value="Space" />
                    Space</label>
                  <label><input type="checkbox" name="genre" value="Culinary" />
                    Culinary</label>
                  <label><input type="checkbox" name="genre" value="Cultivation" />
                    Cultivation</label>
                  <label><input type="checkbox" name="genre" value="Legendary Weapons" />
                    Legendary Weapons</label>
                  <label><input type="checkbox" name="genre" value="Loli" />
                    Loli</label>
                  <label><input type="checkbox" name="genre" value="Magic Academy" />
                    Magic Academy</label>
                  <label><input type="checkbox" name="genre" value="Magic" />
                    Magic</label>
                  <label><input type="checkbox" name="genre" value="Mafia" />
                    Mafia</label>
                  <label><input type="checkbox" name="genre" value="Medicine" />
                    Medicine</label>
                  <label><input type="checkbox" name="genre" value="Revenge" />
                    Revenge</label>
                  <label><input type="checkbox" name="genre" value="Monster Girls" />
                    Monster Girls</label>
                  <label><input type="checkbox" name="genre" value="Monsters" />
                    Monsters</label>
                  <label><input type="checkbox" name="genre" value="Skills / Abilities" />
                    Skills / Abilities</label>
                  <label><input type="checkbox" name="genre" value="Mercenaries" />
                    Mercenaries</label>
                  <label><input type="checkbox" name="genre" value="Violence / Cruelty" />
                    Violence / Cruelty</label>
                  <label><input type="checkbox" name="genre" value="Undead" />
                    Undead</label>
                  <label><input type="checkbox" name="genre" value="Ninja" />
                    Ninja</label>
                  <label><input type="checkbox" name="genre" value="Body Swap" />
                    Body Swap</label>
                  <label><input type="checkbox" name="genre" value="Reverse Harem" />
                    Reverse Harem</label>
                  <label><input type="checkbox" name="genre" value="Firearms" />
                    Firearms</label>
                  <label><input type="checkbox" name="genre" value="Office Workers" />
                    Office Workers</label>
                  <label><input type="checkbox" name="genre" value="Parody" />
                    Parody</label>
                  <label><input type="checkbox" name="genre" value="Pirates" />
                    Pirates</label>
                  <label><input type="checkbox" name="genre" value="Dungeons" />
                    Dungeons</label>
                  <label><input type="checkbox" name="genre" value="Politics" />
                    Politics</label>
                  <label><input type="checkbox" name="genre" value="Police" />
                    Police</label>
                  <label><input type="checkbox" name="genre" value="Criminals / Crime" />
                    Criminals / Crime</label>
                  <label><input type="checkbox" name="genre" value="Ghosts / Spirits" />
                    Ghosts / Spirits</label>
                  <label><input type="checkbox" name="genre" value="Time Travel" />
                    Time Travel</label>
                  <label><input type="checkbox" name="genre" value="Slaves" />
                    Slaves</label>
                  <label><input type="checkbox" name="genre" value="Sentient Races" />
                    Sentient Races</label>
                  <label><input type="checkbox" name="genre" value="Power Ranks" />
                    Power Ranks</label>
                  <label><input type="checkbox" name="genre" value="Reincarnation" />
                    Reincarnation</label>
                  <label><input type="checkbox" name="genre" value="Robots" />
                    Robots</label>
                  <label><input type="checkbox" name="genre" value="Knights" />
                    Knights</label>
                  <label><input type="checkbox" name="genre" value="Samurai" />
                    Samurai</label>
                  <label><input type="checkbox" name="genre" value="System" />
                    System</label>
                  <label><input type="checkbox" name="genre" value="Identity Concealment" />
                    Identity Concealment</label>
                  <label><input type="checkbox" name="genre" value="World Saving" />
                    World Saving</label>
                  <label><input type="checkbox" name="genre" value="Sports Body" />
                    Sports Body</label>
                  <label><input type="checkbox" name="genre" value="Medieval" />
                    Medieval</label>
                  <label><input type="checkbox" name="genre" value="Steampunk" />
                    Steampunk</label>
                  <label><input type="checkbox" name="genre" value="Superheroes" />
                    Superheroes</label>
                  <label><input type="checkbox" name="genre" value="Traditional Games" />
                    Traditional Games</label>
                  <label><input type="checkbox" name="genre" value="Smart Protagonist" />
                    Smart Protagonist</label>
                  <label><input type="checkbox" name="genre" value="Teacher / Student" />
                    Teacher / Student</label>
                  <label><input type="checkbox" name="genre" value="Philosophy" />
                    Philosophy</label>
                  <label><input type="checkbox" name="genre" value="Hikikomori" />
                    Hikikomori</label>
                  <label><input type="checkbox" name="genre" value="Cold Weapons" />
                    Cold Weapons</label>
                  <label><input type="checkbox" name="genre" value="Blackmail" />
                    Blackmail</label>
                  <label><input type="checkbox" name="genre" value="Elves" />
                    Elves</label>
                  <label><input type="checkbox" name="genre" value="Yakuza" />
                    Yakuza</label>
                  <label><input type="checkbox" name="genre" value="Japan" />
                    Japan</label>
                </div>
              </div>
              <div class="submit">
                <button type="submit">Submit</button>
              </div>
            </form>
          </div>
        </section>
        <!-- filter End -->

        <!-- filter button Start -->
        <section class="filt-button">
          <button onclick="openFilter();"><img src="./assets/images/filter.png" alt="filter"><span>filter</span></button>
        </section>
        <!-- filter button End -->

        <!-- content Start -->
        <section class="main-content">
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $type = $row['type'];
            $rating = $row['rating'];
            $imageSrc = $row['image'];
            echo '<div class="movie">';
            echo '<div class="movie-image">';
            echo '<img src="' . $imageSrc . '" alt="' . $name . '">';
            echo '</div>';
            echo '<div class="movie-name">';
            echo '<div class="status">';
            echo '<div class="type">' . $type . '</div>';
            echo '<div class="rating">';
            echo '' . $rating;
            echo '<img src="./assets/images/star.png" alt="star">';
            echo '</div>';
            echo '</div>';
            echo '<div class="name"><a href="#"><span>' . $name . '</span></a></div>';
            echo '</div>';
            echo '</div>';
          }
          mysqli_close($connect);
          ?>
        </section>
        <!-- content End -->
      </div>
    </div>
  </main>
  <!-- main End -->
</body>
<!-- scripts -->
<script src="./js/logo.js"></script>
<script src="./js/filter.js"></script>
<script src="./js/getManga.js"></script>

</html>