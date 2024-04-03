<!-- filter Start -->
<section class="main-filter">
  <div class="filter-clear">
    <div class="filter-title">
    <i class="fa-solid fa-sliders"></i>
      <p>Фильтры</p>
    </div>
    <button onclick="clearFilters()">
      Очистить
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
  <div class="filter-selector">
    <form action="index.php">
      <div class="filter-fl-genre filter-box">
        <label for="select-status">Статус:</label>
        <select id="select-type" name="type">
          <option value="">Анонсировано</option>
          <option value="">Сейчас выходит</option>
          <option value="">Вышедшее</option>
          <option value="">Недавно Вышедшее</option>
        </select>
        <label for="select-type">Тип:</label>
        <select id="select-genre" name="type">
          <option value="">TV-сериал</option>
          <option value="">Фильм</option>
          <option value="">OVA</option>
          <option value="">ONA</option>
          <option value="">Спецвыпуск</option>
          <option value="">TV-спецвыпуск</option>
          <option value="">Клип</option>
        </select>
        <label for="select-sorting">Сортировка:</label>
        <select name="sorting" id="select-sorting" name="sorting">
          <option value="">По рейтингу</option>
          <option value="">По Популярности</option>
          <option value="">По алфавиту</option>
          <option value="">По дате выхода</option>
          <option value="">Случайно</option>
          <option value="">По ID</option>
        </select>
        <label for="select-season">Сезон:</label>
        <select id="select-season" name="season">
          <option value="">Лето 2024</option>
          <option value="">Весна 2024</option>
          <option value="">Зима 2024</option>
          <option value="">Осень 2024</option>
        </select>
        <label for="select-rating">Оценка:</label>
        <select id="select-rating" name="rating">
          <option value="">8+</option>
          <option value="">7+</option>
          <option value="">6+</option>
        </select>
        <label for="select-audience ">Аудитория:</label>
        <select id="select-audience" name="audience">
          <option value="">Сёнен</option>
          <option value="">Сёдзё</option>
          <option value="">Сэйнэн</option>
          <option value="">Дзёсей</option>
          <option value="">Детское</option>
        </select>
        <label for="select-genres ">Жанры:</label>
        <select id="select-genres" name="genres">
          <option value="">Авангард</option>
          <option value="">Гурман</option>
          <option value="">Драма</option>
          <option value="">Комедия</option>
          <option value="">Повседневность</option>
          <option value="">Приключения</option>
          <option value="">Романтика</option>
          <option value="">Сверхъестественное</option>
          <option value="">Спорт</option>
          <option value="">Тайна</option>
          <option value="">Триллер</option>
          <option value="">Ужасы</option>
          <option value="">Фантастика</option>
          <option value="">Фэнтези</option>
          <option value="">Экшен</option>
          <option value="">Этти</option>
          <option value="">Эротика</option>
          <option value="">Хентай</option>
        </select>
        <label for="select-themes">Темы:</label>
        <select id="select-themes" name="themes">
          <option value="">Вампиры</option>
          <option value="">Гарем</option>
          <option value="">Гонки</option>
          <option value="">Идолы</option>
          <option value="">Исэкай</option>
          <option value="">Иясикэй</option>
          <option value="">Космос</option>
          <option value="">Школа</option>
          <option value="">Хулиганы</option>
          <option value="">Супер сила</option>
        </select>
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
  <button onclick="openFilter();"><img src="./assets/images/filter.png" alt="filter"><span>filter</span></button>
</section>
<!-- filter button End -->