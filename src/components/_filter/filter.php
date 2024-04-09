<!-- filter Start -->
<section class="main-filter">
  <div class="filter-clear">
    <div class="filter-title">
      <i class="fa-solid fa-sliders"></i>
      <p>Фильтры</p>
    </div>
    <button onclick="" id="clear-button">
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
            <div><input type="checkbox" id="status1" name="status" value="wdwd"><label
                for="status1">Анонсировано</label>
            </div>
            <div><input type="checkbox" id="status2" name="status" value=""><label for="status2">Сейчас выходит</label>
            </div>
            <div><input type="checkbox" id="status3" name="status" value=""><label for="status3">Вышедшее</label></div>
            <div><input type="checkbox" id="status4" name="status" value=""><label for="status4">Недавно
                Вышедшее</label>
            </div>
          </div>
        </div>
        <label for="select-type">Тип:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите Тип</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="type1" name="status" value=""><label for="type1">Анонсировано</label>
            </div>
            <div><input type="checkbox" id="type2" name="status" value=""><label for="type2">Фильм</label>
            </div>
            <div><input type="checkbox" id="type3" name="status" value=""><label for="type3">OVA</label>
            </div>
            <div><input type="checkbox" id="type4" name="status" value=""><label for="type4">ONA</label>
            </div>
            <div><input type="checkbox" id="type5" name="status" value=""><label for="type5">Спецвыпуск</label>
            </div>
            <div><input type="checkbox" id="type6" name="status" value=""><label for="type6">TV-спецвыпуск</label>
            </div>
            <div><input type="checkbox" id="type7" name="status" value=""><label for="type7">Клип</label>
            </div>
          </div>
        </div>
        <label for="select-sorting">Сортировка:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Сортировать по</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="type1" name="status" value=""><label for="sort1">По рейтингу</label>
            </div>
            <div><input type="checkbox" id="sort2" name="status" value=""><label for="sort2">По Популярности</label>
            </div>
            <div><input type="checkbox" id="sort3" name="status" value=""><label for="sort3">По алфавиту</label>
            </div>
            <div><input type="checkbox" id="sort4" name="status" value=""><label for="sort4">По дате выхода</label>
            </div>
            <div><input type="checkbox" id="sort5" name="status" value=""><label for="sort5">Случайно</label>
            </div>
            <div><input type="checkbox" id="sort6" name="status" value=""><label for="sort6">По ID</label>
            </div>
          </div>
        </div>
        <label for="select-season">Сезон:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите сезон</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="season1" name="season" value=""><label for="season1">Лето 2024</label></div>
            <div><input type="checkbox" id="season2" name="season" value=""><label for="season2">Весна 2024</label>
            </div>
            <div><input type="checkbox" id="season3" name="season" value=""><label for="season3">Зима 2024</label></div>
            <div><input type="checkbox" id="season4" name="season" value=""><label for="season4">Осень 2024</label>
            </div>
          </div>
        </div>
        <label for="select-rating">Оценка:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите оценку</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="rating1" name="rating" value=""><label for="rating1">8+</label></div>
            <div><input type="checkbox" id="rating2" name="rating" value=""><label for="rating2">7+</label></div>
            <div><input type="checkbox" id="rating3" name="rating" value=""><label for="rating3">6+</label></div>
          </div>
        </div>
        <label for="select-audience">Аудитория:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите аудиторию</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="audience1" name="audience" value=""><label for="audience1">Сёнен</label>
            </div>
            <div><input type="checkbox" id="audience2" name="audience" value=""><label for="audience2">Сёдзё</label>
            </div>
            <div><input type="checkbox" id="audience3" name="audience" value=""><label for="audience3">Сэйнэн</label>
            </div>
            <div><input type="checkbox" id="audience4" name="audience" value=""><label for="audience4">Дзёсей</label>
            </div>
            <div><input type="checkbox" id="audience5" name="audience" value=""><label for="audience5">Детское</label>
            </div>
          </div>
        </div>
        <label for="select-genres">Жанры:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите жанр</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="genre1" name="genres" value=""><label for="genre1">Авангард</label></div>
            <div><input type="checkbox" id="genre2" name="genres" value=""><label for="genre2">Гурман</label></div>
            <div><input type="checkbox" id="genre3" name="genres" value=""><label for="genre3">Драма</label></div>
            <div><input type="checkbox" id="genre4" name="genres" value=""><label for="genre4">Комедия</label></div>
            <div><input type="checkbox" id="genre5" name="genres" value=""><label for="genre5">Повседневность</label>
            </div>
            <div><input type="checkbox" id="genre6" name="genres" value=""><label for="genre6">Приключения</label></div>
            <div><input type="checkbox" id="genre7" name="genres" value=""><label for="genre7">Романтика</label></div>
            <div><input type="checkbox" id="genre8" name="genres" value=""><label
                for="genre8">Сверхъестественное</label></div>
            <div><input type="checkbox" id="genre9" name="genres" value=""><label for="genre9">Спорт</label></div>
            <div><input type="checkbox" id="genre10" name="genres" value=""><label for="genre10">Тайна</label></div>
            <div><input type="checkbox" id="genre11" name="genres" value=""><label for="genre11">Триллер</label></div>
            <div><input type="checkbox" id="genre12" name="genres" value=""><label for="genre12">Ужасы</label></div>
            <div><input type="checkbox" id="genre13" name="genres" value=""><label for="genre13">Фантастика</label>
            </div>
            <div><input type="checkbox" id="genre14" name="genres" value=""><label for="genre14">Фэнтези</label></div>
            <div><input type="checkbox" id="genre15" name="genres" value=""><label for="genre15">Экшен</label></div>
            <div><input type="checkbox" id="genre16" name="genres" value=""><label for="genre16">Этти</label></div>
            <div><input type="checkbox" id="genre17" name="genres" value=""><label for="genre17">Эротика</label></div>
            <div><input type="checkbox" id="genre18" name="genres" value=""><label for="genre18">Хентай</label></div>
          </div>
        </div>
        <label for="select-themes">Темы:</label>
        <div class="custom-select">
          <div class="custom-select-title" onclick="openCustomSelect(this)">Выберите тему</div>
          <div class="custom-select-options" style="display: none; transform: translateY(10px); opacity: 0;">
            <div><input type="checkbox" id="theme1" name="themes" value=""><label for="theme1">Вампиры</label></div>
            <div><input type="checkbox" id="theme2" name="themes" value=""><label for="theme2">Гарем</label></div>
            <div><input type="checkbox" id="theme3" name="themes" value=""><label for="theme3">Гонки</label></div>
            <div><input type="checkbox" id="theme4" name="themes" value=""><label for="theme4">Идолы</label></div>
            <div><input type="checkbox" id="theme5" name="themes" value=""><label for="theme5">Исэкай</label></div>
            <div><input type="checkbox" id="theme6" name="themes" value=""><label for="theme6">Иясикэй</label></div>
            <div><input type="checkbox" id="theme7" name="themes" value=""><label for="theme7">Космос</label></div>
            <div><input type="checkbox" id="theme8" name="themes" value=""><label for="theme8">Школа</label></div>
            <div><input type="checkbox" id="theme9" name="themes" value=""><label for="theme9">Хулиганы</label></div>
            <div><input type="checkbox" id="theme10" name="themes" value=""><label for="theme10">Супер сила</label>
            </div>
          </div>
        </div>
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