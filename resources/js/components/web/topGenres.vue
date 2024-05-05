<template>
    <section class="all-genres">
        <div class="all-genres-list-inner">
            <div class="all-genres-list-tit">
                <div class="all-genres-list-container" ref="allGenresFlickityContainer">
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=5'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/avant_garde_1.webp"
                                alt>
                        </div>
                        <h3>Авангард</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=543'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/gourmet_1.webp"
                                alt>
                        </div>
                        <h3>Гурман</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=8'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/drama_1.webp"
                                 alt>
                        </div>
                        <h3>Драмма</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=4'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/comedy_1.webp"
                                 alt>
                        </div>
                        <h3>Комедия</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=36'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/everyday_life_1.webp"
                                alt>
                        </div>
                        <h3>Повседневность</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=2'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/adventures_1.webp"
                                alt>
                        </div>
                        <h3>Приключения</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=22'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/romance_1.webp"
                                alt>
                        </div>
                        <h3>Романтика</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=37'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/supernatural_1.webp"
                                alt>
                        </div>
                        <h3>Сверхъестественное</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=30'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/sport_1.webp"
                                 alt>
                        </div>
                        <h3>Спорт</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=7'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/secret_1.webp"
                                 alt>
                        </div>
                        <h3>Тайна</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=117'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/thriller_1.webp"
                                alt>
                        </div>
                        <h3>Триллер</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=14'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/horror_1.webp"
                                 alt>
                        </div>
                        <h3>Ужасы</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=10'">
                        <div class="genre-cont-image-conatiner">
                            <img
                                src="../../../img/genres/fantasy_1.webp"
                                alt>
                        </div>
                        <h3>Фэнтези</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=1'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/action_1.webp"
                                 alt>
                        </div>
                        <h3>Экшен</h3>
                    </div>
                    <div class="genre-cont" onclick="window.location.href = 'catalog.php?genres=9'">
                        <div class="genre-cont-image-conatiner">
                            <img src="../../../img/genres/etti_1.webp"
                                 alt>
                        </div>
                        <h3>Этти</h3>
                    </div>
                    <!-- <div class="genre-cont"  onclick="window.location.href = 'catalog.php?genres=539'">
                      <h3>Эротика</h3>
                    </div> -->
                    <!-- <div class="genre-cont"  onclick="window.location.href = 'catalog.php?genres=12'">
                      <h3>Хентай</h3>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import Flickity from 'flickity';
import 'flickity/css/flickity.css';

export default {
    data() {
        return {};
    },
    mounted() {
        let elem = this.$refs.allGenresFlickityContainer;
        let flcky = new Flickity(elem, {
            cellAlign: "left",
            pageDots: false,
            wrapAround: true,
            prevNextButtons: false
        });

        let isDragging = false;
        flcky.on('dragStart', function () {
            isDragging = true;
            elem.style.pointerEvents = 'none';
        });

        flcky.on('dragEnd', function () {
            setTimeout(() => {
                elem.style.pointerEvents = 'auto';
            }, 500);
            isDragging = false;
        });
    },
}
</script>
<style lang="scss">
.all-genres {
    width: 100%;

}

.all-genres .all-genres-list-inner {
    width: 100%;
    padding: 0 10px;
}

.is-dragging .genre-cont {
    pointer-events: none;
}

.all-genres-list-container .genre-cont h3 {
    padding: 3px 0 5px 0;
}

.genre-cont-image-conatiner {
    width: 100%;
    overflow: hidden;
    position: relative;
    height: 200px;
    display: block;
}

.genre-cont-image-conatiner img {
    width: 100%;
    height: 100%;
    position: relative;
    object-fit: cover;
    object-position: center;
    transition: transform 0.2s ease-in-out;
}

.all-genres-list-inner .all-genres-list-tit {
    max-width: var(--ota-ku-max-width);
    width: 100%;
    margin: 0 auto;
}

.all-genres-list-container::-webkit-scrollbar {
    height: 0;
}

.all-genres-list-container .genre-cont {
    overflow: hidden;
    width: 150px;
    min-width: 150px;
    background-color: var(--genres-genres-list-container-background-color);
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    margin-right: 10px;
    color: var(--genres-genres-list-container-text-color);
}

.all-genres-list-container .genre-cont:hover {
    background-color: var(--genres-genres-list-container-background-hover-color);
    color: var(--genres-genres-list-container-text-hover-color);
}

.all-genres-list-container .genre-cont h3 {
    font-size: 1em;
    font-weight: normal;
}

.all-genres-list-container .genre-cont:hover .genre-cont-image-conatiner img {
    transform: scale(1.1);
}

.all-genres-list-container .genre-cont span {
    color: var(--status-font-color);
}
</style>
