<!-- header Start -->
<header>
    <div class="header-inner">
        <div class="header-tit">
            <div class="header-log-and-nav">
                <div class="header-logo"
                     onclick="window.location.href = '<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>/index.php';">
                    <img src="<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>/assets/images/ota-ku.webp"
                         alt="Логотип Ota Ku - лучший аниме"
                         id="ota-ku-best-anime-logo"/>
                </div>
                <nav class="header-navigation">
                    <button onclick="openSidenav()">
                        <i class="fa-sharp fa-solid fa-bars"></i>
                    </button>
                    <!--                    <a href="catalog.php" class="nav-button">КАТАЛОГ</a>-->
                    <!--                    <a href="javascript:void(0)" class="nav-button" onclick="scrollToAnchor('main-content')">ТОП</a>-->
                </nav>
                <div class="header-search">
                    <form action="catalog.php" method="GET">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input type="text" required placeholder="Что будем искать в мире аниме?" class="search-input-fa"
                               name="search" autocomplete="off" value="<?php if (isset($_GET['search'])) {
                          echo $_GET['search'];
                        } ?>">
                    </form>
                </div>
            </div>
            <!--            <div class="header-login">-->
            <!--                <div class="user-is-reg-1" style="display: none">-->
            <!--                    <div class="user">-->
            <!--                        <div class="user-cont">-->
            <!--                            <p class="user-name">Esudesu</p>-->
            <!--                            <span class="user-email">w33bv.gl@gmail.com</span>-->
            <!--                        </div>-->
            <!--                        <div class="user-img" onclick="userProfile();">-->
            <!--                            <img src="assets/images/user.jpg" alt="userimg"/>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="user-is-reg-2" style="display: none">-->
            <!--                    <button onclick="">-->
            <!--                        Войти-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</header>
<!-- header End -->

<div id="my-sidenav" class="my-sidenav">
    <div class="sidenav-inner">
        <div class="sidenav-tit">
            <div class="sidenav-top-name-close-button">
                <p>НАВИГАЦИЯ</p>
                <button onclick="closeSidenav()">
                    Закрыть<i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="sidenav-name-container">
                <button onclick="window.location.href = '/index.php'"><i class="fa-solid fa-house"></i>Главная</button>
                <button onclick="window.location.href = '/catalog.php'"><i class="fa-solid fa-layer-group"></i>Каталог
                </button>
<!--                <button><i class="fa-solid fa-bolt"></i>Топ</button>-->
<!--                <button><i class="fa-regular fa-calendar-days"></i>Расписание Аниме</button>-->
<!--                <button><i class="fa-solid fa-user"></i>Персонажи</button>-->
<!--                <button><i class="fa-solid fa-film"></i>Reels</button>-->
<!--                <button><i class="fa-solid fa-blog"></i>Блог</button>-->
<!--                <button onclick="const randomId = Math.floor(Math.random() *(9999 - 1000 + 1))+ 1000; window.location.href = `anime.php?animeId=${randomId}`">-->
<!--                    <i class="fa-solid fa-dice"></i>Случайное Аниме-->
<!--                </button>-->
            </div>
            <div class="sidenav-user-settings">
                <p>Настройки:</p>
                <select class="sidenav-user-sett-selector" id="theme-selector">
                    <option value="dark_1">Темная (океан)</option>
                    <option value="light_1">Светлая</option>
                </select>
                <select class="sidenav-user-sett-selector" id="voice-selector">
                    <option value="null">Выбрать Озвучку</option>
                    <option value="610">Anilibria.TV</option>
                    <option value="609">AniDub</option>
                    <option value="910">AniStar</option>
                    <option value="923">AnimeVost</option>
                    <option value="767">SHIZA PROJECT</option>
                    <option value="1811">OnWave</option>
                    <option value="2403">AniJoy</option>
                    <option value="1978">DreamCast</option>
                    <option value="3288">RadiandVoice</option>
                    <option value="557">JAM</option>
                    <option value="3288">Bress Club</option>
                    <option value="3141">MoonWalkers</option>
                    <option value="1895">FomoDub</option>
                    <option value="2781">LDA TEAM</option>
                    <option value="1071">AniRise.Субтитры</option>
                    <option value="1291">Crunchyroll.Субтитры</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- search Start media 630px -->
<section class="search">
    <div class="search-inner">
        <div class="search-tit">
            <div class="header-search spm-search">
                <form action="catalog.php" method="GET">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <input type="text" required placeholder="Что будем искать в мире аниме?" class="search-input-fa"
                           name="search" autocomplete="off" value="<?php if (isset($_GET['search'])) {
                      echo $_GET['search'];
                    } ?>">
                </form>
            </div>
        </div>
    </div>
</section>
<!-- search End media 630px -->