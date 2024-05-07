<template>
    <section class="what-is-anime-container">
        <div class="what-is-anime-container-inner">
            <div class="what-is-anime-container-tit">
                <div class="what-is-anime-main">
                    <h1><a href="https://ota-ku.ru">OTA-KU</a> – Смотреть аниме онлайн бесплатно!</h1>
                    <div class="what-is-cont-1">
                        <p>Хочешь смотреть лучшие аниме онлайн бесплатно на русском? У нас ты найдешь огромную базу
                            самых
                            популярных аниме с качественной русской озвучкой! Наслаждайся захватывающими приключениями,
                            яркими персонажами и захватывающим сюжетом, не отходя от экрана. Мы предлагаем только лучшие
                            аниме в HD качестве, чтобы ты мог полностью погрузиться в мир японской анимации. Забудь о
                            поиске
                            по разным сайтам – у нас все аниме собраны на одной платформе! Присоединяйся к нам прямо
                            сейчас
                            и окунись в увлекательный мир аниме без каких-либо ограничений!</p>
                    </div>
                    <div class="what-is-cont-2">
                        <p><strong>Ота-ку</strong> (от японского слова <strong>"отаку" "オタク"</strong>.) – это не
                            просто
                            термин, это страсть и преданность миру аниме и манги! Наш сайт одаёт дань этому увлечению и
                            предлагаем насладиться разнообразным контентом. Мы собрали лучшие произведения этого жанра,
                            чтобы каждый посетитель мог найти что-то особенное для себя. Наши страницы наполнены яркими
                            эмоциями и захватывающими приключениями. Присоединяйся к нам и погрузись в волшебный мир
                            японской анимации прямо сейчас!</p>
                    </div>
                    <div class="what-is-anime-social">
                        <div class="what-is-anime-social-item">
                            <b>Мы в соц Сетях:</b>
                        </div>
                        <div class="what-is-anime-social-item">
                            <a href="https://www.youtube.com/channel/UC4W8zn36O0oZwgzE_UnV7ng" target="_blank"><i
                                class="fa-brands fa-youtube"></i></a>
                        </div>
                        <div class="what-is-anime-social-item">
                            <a href="https://t.me/+JixEqAyK48UwY2Vi" target="_blank"><i
                                class="fa-brands fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="what-is-anime-other">
                    <img
                        v-lazy="'/img/other/aqua.png'"
                        alt="главная аниме тян в ota-ku.ru">
                </div>
            </div>
        </div>
    </section>
</template>
<script></script>
<style lang="scss" scoped>
.what-is-anime-container {
    width: 100%;
}

.what-is-anime-container-inner {
    padding: 0 10px;
    width: 100%;
}

.what-is-anime-container-tit {
    max-width: var(--ota-ku-max-width);
    margin: 0 auto;
    width: 100%;
    display: flex;
}

.what-is-anime-container-tit h1 {
    margin-bottom: 5px;
}

.what-is-anime-container-tit h1 a {
    color: var(--what-is-anime-container-h1-color);
    text-decoration: underline;
    transition: color 0.2s ease-in-out;
}

.what-is-anime-container-tit h1 a:hover {
    color: var(--what-is-anime-container-h1-color-hover);
}

.what-is-anime-container-tit .what-is-cont-1 {
    margin-bottom: 10px;
}

.what-is-anime-main {
    width: 70%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.what-is-anime-other {
    width: 30%;
    position: relative;
    user-select: none;
    z-index: -1;
}

.what-is-anime-other img {
    width: 100%;
    pointer-events: none;
}

.what-is-anime-social {
    width: 100%;
    padding: 5px 0;
    gap: 20px;
    display: flex;
    align-items: center;
}

.what-is-anime-social .what-is-anime-social-item i {
    font-size: 2.5em;
    transition: color 0.2s ease-in-out;
}

.what-is-anime-social .what-is-anime-social-item:nth-child(2):hover i {
    color: var(--what-is-anime-social-item-2-hover-color-youtube);
}

.what-is-anime-social .what-is-anime-social-item:nth-child(3):hover i {
    color: var(--what-is-anime-social-item-3-hover-color-telegram);
}

.what-is-anime-social .what-is-anime-social-item:nth-child(4):hover i {
    color: var(--what-is-anime-social-item-3-hover-color-tiktok);
}

@media screen and (max-width: 1020px) {
    .what-is-anime-other {
        display: none;
    }

    .what-is-anime-main {
        width: 100%;
    }
}
</style>
