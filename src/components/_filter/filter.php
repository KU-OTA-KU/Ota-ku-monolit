<!-- filter Start -->
<section class="main-filter">
    <div class="filter-clear">
        <div class="filter-title">
            <i class="fa-solid fa-sliders"></i>
            <p>Фильтры</p>
        </div>
        <button onclick="window.location.href = 'catalog.php';" id="clear-button">
            Очистить
            <i class="fa-solid fa-xmark"></i>
        </button>
        <button onclick="closeFilter()" id="close-button">
            Закрыть
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="filter-selector">
        <form action="catalog.php" method="GET">
            <div class="filter-fl-genre filter-box">
                <label for="select-status">Статус:</label>
                <div class="custom-select">
                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите Статус</div>
                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
                        <div>
                            <input type="checkbox" id="status1" name="status[]" value="anons"><label
                                    for="status1">Анонсировано</label>
                        </div>
                        <div><input type="checkbox" id="status2" name="status[]" value="ongoing"><label for="status2">Сейчас
                                выходит</label>
                        </div>
                        <div><input type="checkbox" id="status3" name="status[]" value="released"><label
                                    for="status3">Вышедшее</label></div>
                    </div>
                </div>
                <label for="select-type">Тип:</label>
                <div class="custom-select">
                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите Тип</div>
                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
                        <div><input type="checkbox" id="type2" name="kind[]" value="tv"><label for="type2">Аниме</label>
                        </div>
                        <div><input type="checkbox" id="type3" name="kind[]" value="movie"><label
                                    for="type3">Фильм</label>
                        </div>
                        <!--                        <div><input type="checkbox" id="type4" name="kind[]" value="ova"><label for="type4">OVA</label>-->
                        <!--                        </div>-->
                        <!--                        <div><input type="checkbox" id="type5" name="kind[]" value="ona"><label-->
                        <!--                                    for="type5">ONA</label>-->
                        <!--                        </div>-->
                        <div><input type="checkbox" id="type6" name="kind[]" value="special"><label
                                    for="type6">Спецвыпуск</label>
                        </div>
                        <div><input type="checkbox" id="type7" name="kind[]" value="tv_special"><label
                                    for="type7">TV-спецвыпуск</label>
                        </div>
                        <!--                        <div><input type="checkbox" id="type8" name="kind[]" value="pv"><label for="type7">PV-->
                        <!--                                (промо-видео)</label>-->
                        <!--                        </div>-->
                        <!--                        <div><input type="checkbox" id="type9" name="kind[]" value="cm"><label for="type7">CM-->
                        <!--                                (реклама)</label>-->
                        <!--                        </div>-->
                        <div><input type="checkbox" id="type10" name="kind[]" value="tv_13"><label for="type10">
                                TV_13</label>
                        </div>
                        <div><input type="checkbox" id="type11" name="kind[]" value="tv_24"><label for="type11">
                                TV_24</label>
                        </div>
                        <div><input type="checkbox" id="type12" name="kind[]" value="tv_48"><label for="type12">
                                TV_48</label>
                        </div>
                    </div>
                </div>
                <label for="select-sorting">Сортировка:</label>
                <div class="custom-select">
                    <div class="custom-select-title" onclick="openCustomSelect(this)">Сортировать по</div>
                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
                        <div><input type="radio" id="sort1" name="sort" value="ranked"><label for="sort1">По рейтингу</label></div>
                        <div><input type="radio" id="sort2" name="sort" value="popularity"><label for="sort2">По Популярности</label></div>
                        <div><input type="radio" id="sort3" name="sort" value="name"><label for="sort3">По алфавиту</label></div>
                        <div><input type="radio" id="sort4" name="sort" value="aired_on"><label for="sort4">По дате выхода</label></div>
                        <div><input type="radio" id="sort5" name="sort" value="status"><label for="sort5">Случайно</label></div>
                        <div><input type="radio" id="sort6" name="sort" value="episodes"><label for="sort6">По количеству Серии</label></div>
                        <div><input type="radio" id="sort7" name="sort" value="id"><label for="sort7">По ID</label></div>
                    </div>
                </div>
                <label for="select-season">Сезон:</label>
                <div class="custom-select">
                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите сезон</div>
                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
                        <div><input type="radio" id="season1" name="season" value="summer_2024"><label for="season1">Лето 2024</label></div>
                        <div><input type="radio" id="season2" name="season" value="spring_2024"><label for="season2">Весна 2024</label></div>
                        <div><input type="radio" id="season3" name="season" value="winter_2024"><label for="season3">Зима 2024</label></div>
                        <div><input type="radio" id="season4" name="season" value="fall_2024"><label for="season4">Осень 2024</label></div>
                        <div><input type="radio" id="season5" name="season" value="2024"><label for="season5"></label>2024 год</div>
                        <div><input type="radio" id="season6" name="season" value="2023"><label for="season6"></label>2023 год</div>
                        <div><input type="radio" id="season7" name="season" value="2021_2022"><label for="season7"></label>2021-2022</div>
                        <div><input type="radio" id="season8" name="season" value="2016_2020"><label for="season8"></label>2016-2020</div>
                        <div><input type="radio" id="season9" name="season" value="2010_2015"><label for="season9"></label>2010-2015</div>
                        <div><input type="radio" id="season10" name="season" value="2000_2009"><label for="season10"></label>2000-2009</div>
                        <div><input type="radio" id="season11" name="season" value="1999"><label for="season11"></label>1999е годы</div>
                        <div><input type="radio" id="season12" name="season" value="1980"><label for="season12"></label>1980е годы</div>
                    </div>
                </div>
                <label for="select-rating">Оценка:</label>
                <div class="custom-select">
                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите оценку</div>
                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
                        <div><input type="radio" id="rating1" name="rating" value="none"><label for="rating1">Без оценки</label></div>
                        <div><input type="radio" id="rating2" name="rating" value="g"><label for="rating2">Все оценки</label></div>
                        <div><input type="radio" id="rating3" name="rating" value="pg"><label for="rating3">PG - для детей</label></div>
                        <div><input type="radio" id="rating4" name="rating" value="pg_13"><label for="rating4">PG_13 - для детей 13 лет</label></div>
                        <div><input type="radio" id="rating5" name="rating" value="r"><label for="rating5">r - для подростков 17+</label></div>
                        <div><input type="radio" id="rating6" name="rating" value="r_plus"><label for="rating6">R_plus - умеренная ногота</label></div>
<!--                        <div><input type="radio" id="rating7" name="rating" value="rx"><label for="rating7">RX - Хентай</label></div>-->
                    </div>
                </div>
<!--                <label for="select-audience">Аудитория:</label>-->
<!--                <div class="custom-select">-->
<!--                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите аудиторию</div>-->
<!--                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">-->
<!--                        <div><input type="checkbox" id="audience1" name="audience" value=""><label-->
<!--                                    for="audience1">Сёнен</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="audience2" name="audience" value=""><label-->
<!--                                    for="audience2">Сёдзё</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="audience3" name="audience" value=""><label for="audience3">Сэйнэн</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="audience4" name="audience" value=""><label for="audience4">Дзёсей</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="audience5" name="audience" value=""><label for="audience5">Детское</label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <label for="select-genres">Жанры:</label>
                <div class="custom-select">
                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите жанр</div>
                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
                        <div><input type="checkbox" id="genre1" name="genres" value="5"><label for="genre1">Авангард</label></div>
                        <div><input type="checkbox" id="genre2" name="genres" value="543"><label for="genre2">Гурман</label></div>
                        <div><input type="checkbox" id="genre3" name="genres" value="8"><label for="genre3">Драма</label></div>
                        <div><input type="checkbox" id="genre4" name="genres" value="4"><label for="genre4">Комедия</label></div>
                        <div><input type="checkbox" id="genre5" name="genres" value="36"><label for="genre5">Повседневность</label></div>
                        <div><input type="checkbox" id="genre6" name="genres" value="2"><label for="genre6">Приключения</label></div>
                        <div><input type="checkbox" id="genre7" name="genres" value="22"><label for="genre7">Романтика</label></div>
                        <div><input type="checkbox" id="genre8" name="genres" value="37"><label for="genre8">Сверхъестественное</label></div>
                        <div><input type="checkbox" id="genre9" name="genres" value="30"><label for="genre9">Спорт</label></div>
                        <div><input type="checkbox" id="genre10" name="genres" value="7"><label for="genre10">Тайна</label></div>
                        <div><input type="checkbox" id="genre11" name="genres" value="117"><label for="genre11">Триллер</label></div>
                        <div><input type="checkbox" id="genre12" name="genres" value="14"><label for="genre12">Ужасы</label></div>
                        <div><input type="checkbox" id="genre13" name="genres" value="24"><label for="genre13">Фантастика</label></div>
                        <div><input type="checkbox" id="genre14" name="genres" value="10"><label for="genre14">Фэнтези</label></div>
                        <div><input type="checkbox" id="genre15" name="genres" value="1"><label for="genre15">Экшен</label></div>
                        <div><input type="checkbox" id="genre16" name="genres" value="9"><label for="genre16">Этти</label></div>
                        <!-- <div><input type="checkbox" id="genre17" name="genres" value="539"><label for="genre17">Эротика</label></div>
                        <div><input type="checkbox" id="genre18" name="genres" value="12"><label for="genre18">Хентай</label></div> -->
                    </div>
                </div>
<!--                <label for="select-themes">Темы:</label>-->
<!--                <div class="custom-select">-->
<!--                    <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите тему</div>-->
<!--                    <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">-->
<!--                        <div><input type="checkbox" id="theme1" name="themes" value=""><label-->
<!--                                    for="theme1">Вампиры</label></div>-->
<!--                        <div><input type="checkbox" id="theme2" name="themes" value=""><label for="theme2">Гарем</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="theme3" name="themes" value=""><label for="theme3">Гонки</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="theme4" name="themes" value=""><label for="theme4">Идолы</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="theme5" name="themes" value=""><label-->
<!--                                    for="theme5">Исэкай</label></div>-->
<!--                        <div><input type="checkbox" id="theme6" name="themes" value=""><label-->
<!--                                    for="theme6">Иясикэй</label></div>-->
<!--                        <div><input type="checkbox" id="theme7" name="themes" value=""><label-->
<!--                                    for="theme7">Космос</label></div>-->
<!--                        <div><input type="checkbox" id="theme8" name="themes" value=""><label for="theme8">Школа</label>-->
<!--                        </div>-->
<!--                        <div><input type="checkbox" id="theme9" name="themes" value=""><label-->
<!--                                    for="theme9">Хулиганы</label></div>-->
<!--                        <div><input type="checkbox" id="theme10" name="themes" value=""><label for="theme10">Супер-->
<!--                                сила</label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div class="submit">
                <button type="submit">Искать</button>
            </div>
        </form>
    </div>
</section>
<!-- filter End -->

<!-- filter button Start -->
<section class="filt-button">
    <button onclick="openFilter();"><i class="fa-solid fa-sliders" aria-hidden="true"></i>Фильтры</button>
</section>
<!-- filter button End -->