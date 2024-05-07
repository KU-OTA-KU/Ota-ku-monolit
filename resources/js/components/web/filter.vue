<template>
    <section class="main-filter">
        <div class="filter-clear">
            <div class="filter-title">
                <i class="fa-solid fa-sliders"></i>
                <p>Фильтры</p>
            </div>
            <button @click="clearFilters" id="clear-button">
                Очистить
                <i class="fa-solid fa-xmark"></i>
            </button>
            <button @click="closeFilter" id="close-button">
                Закрыть
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <!--        <section class="filter-query">-->
        <!--            <div class="filter-title">-->
        <!--                <i class="fa-solid fa-search"></i>-->
        <!--                <p>Ваши запросы:</p>-->
        <!--            </div>-->
        <!--            <div class="filter-query-content">-->
        <!--                <template v-for="(value, name) in filters">-->
        <!--                    <div v-if="value !== '' && value.length !== 0" :key="name" class="filter-item">-->
        <!--                        {{ name }}: {{ Array.isArray(value) ? value.join(', ') : value }}-->
        <!--                    </div>-->
        <!--                </template>-->
        <!--            </div>-->
        <!--        </section>-->

        <div class="filter-selector">
            <form @submit.prevent="submitFilters">
                <div class="filter-fl-genre filter-box">
                    <label for="select-status">Статус</label>
                    <span>Пожалуйста, выберите статус, в котором находится аниме, из предложенных вариантов:</span>
                    <div class="custom-select">
                        <div class="custom-select-title" @click="toggleSelect('status')">Выберите Статус</div>
                        <div v-show="selectOpen.status" class="custom-select-options" data-filter="status"
                             style="transform: translateY(10px); opacity: 0; display: none;">
                            <div v-for="option in statusOptions" :key="option.value">
                                <input type="checkbox" :id="option.value" v-model="filters.status"
                                       :value="option.value">
                                <label :for="option.value">{{ option.label }}</label>
                            </div>
                        </div>
                    </div>
                    <label for="select-kind">Тип</label>
                    <span>Пожалуйста, выберите один или несколько типов аниме из списка:</span>
                    <div class="custom-select">
                        <div class="custom-select-title" @click="toggleSelect('kind')">Выберите Тип</div>
                        <div v-show="selectOpen.kind" class="custom-select-options" data-filter="kind"
                             style="transform: translateY(10px); opacity: 0; display: none;">
                            <div v-for="option in kindOptions" :key="option.value">
                                <input type="checkbox" :id="option.value" v-model="filters.kind" :value="option.value">
                                <label :for="option.value">{{ option.label }}</label>
                            </div>
                        </div>
                    </div>
                    <label for="select-genre">Жанры</label>
                    <span>Пожалуйста, укажите жанры для фильтрации наших релизов. Вы можете выбрать несколько опций одновременно:</span>
                    <div class="custom-select">
                        <div class="custom-select-title" @click="toggleSelect('genre')">Выберите Жанры</div>
                        <div v-show="selectOpen.genre" class="custom-select-options" data-filter="genre"
                             style="transform: translateY(10px); opacity: 0; display: none;">
                            <div v-for="option in genreOptions" :key="option.value">
                                <input type="checkbox" :id="option.value" v-model="filters.genre" :value="option.value">
                                <label :for="option.value">{{ option.label }}</label>
                            </div>
                        </div>
                    </div>
                    <label for="select-genre">Cортировка</label>
                    <span>Пожалуйста, выберите предпочтительный порядок сортировки из списка опций:</span>
                    <div class="custom-select">
                        <div class="custom-select-title" @click="toggleSelect('sort')">Сортировать По</div>
                        <div v-show="selectOpen.sort" class="custom-select-options" data-filter="sort"
                             style="transform: translateY(10px); opacity: 0; display: none;">
                            <div v-for="option in sortOptions" :key="option.value">
                                <input type="radio" :id="option.value" v-model="filters.sort" :value="option.value">
                                <label :for="option.value">{{ option.label }}</label>
                            </div>
                        </div>
                    </div>
                    <label for="select-genre">Сезон</label>
                    <span>Пожалуйста, выберите желаемый сезон из предложенных вариантов:</span>
                    <div class="custom-select">
                        <div class="custom-select-title" @click="toggleSelect('season')">Выберите Сезон</div>
                        <div v-show="selectOpen.season" class="custom-select-options" data-filter="season"
                             style="transform: translateY(10px); opacity: 0; display: none;">
                            <div v-for="option in seasonOptions" :key="option.value">
                                <input type="radio" :id="option.value" v-model="filters.season" :value="option.value">
                                <label :for="option.value">{{ option.label }}</label>
                            </div>
                        </div>
                    </div>
                    <label for="select-genre">Оценка</label>
                    <span>Выберите параметры для сортировки аниме по оценкам:</span>
                    <div class="custom-select">
                        <div class="custom-select-title" @click="toggleSelect('rating')">Выберите Оценку</div>
                        <div v-show="selectOpen.rating" class="custom-select-options" data-filter="rating"
                             style="transform: translateY(10px); opacity: 0; display: none;">
                            <div v-for="option in ratingOptions" :key="option.value">
                                <input type="radio" :id="option.value" v-model="filters.rating" :value="option.value">
                                <label :for="option.value">{{ option.label }}</label>
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
    <section class="filt-button">
        <button @click="openFilter"><i class="fa-solid fa-sliders" aria-hidden="true"></i>Фильтры</button>
    </section>
</template>

<script>
export default {
    data() {
        return {
            filters: {
                status: [],
                kind: [],
                sort: '',
                season: '',
                rating: '',
                genre: []
            },
            selectOpen: {
                status: false,
                kind: false,
                genre: false
            },
            statusOptions: [
                {value: 'anons', label: 'Анонсировано'},
                {value: 'ongoing', label: 'Сейчас выходит'},
                {value: 'released', label: 'Вышедшее'}
            ],
            kindOptions: [
                {value: 'tv', label: 'ТВ Сериал'},
                {value: 'ova', label: 'OVA'},
                {value: 'movie', label: 'Фильм'},
                {value: 'ona', label: "ONA",}
            ],
            seasonOptions: [
                {type: 'radio', value: 'summer_2024', label: 'Лето 2024'},
                {value: 'spring_2024', label: 'Весна 2024'},
                {value: 'winter_2024', label: 'Зима 2024'},
                {value: 'fall_2024', label: 'Осень 2024'},
                {value: '2024', label: '2024 год'},
                {value: '2023', label: '2023 год'},
                {value: '2021_2022', label: '2021-2022'},
                {value: '2016_2020', label: '2016-2020'},
                {value: '2010_2015', label: '2010-2015'},
                {value: '2000_2009', label: '2000-2009'},
                {value: '1980_1999', label: '1999е годы'},
                {value: '1970_1980', label: '1980е годы'},
                {value: '1968_1999', label: 'Динозавры 1968г'}
            ],
            ratingOptions: [
                {value: 'none', label: 'Без оценки'},
                {value: 'g', label: 'Все оценки'},
                {value: 'pg', label: 'PG - для детей'},
                {value: 'pg_13', label: 'PG_13 - для детей 13 лет'},
                {value: 'r', label: 'r - для подростков 17+'},
                {value: 'r_plus', label: 'R_plus - умеренная ногота'},
                // { value: 'rx', label: 'RX - Хентай' }
            ],
            sortOptions: [
                {value: 'ranked', label: 'По рейтингу'},
                {value: 'popularity', label: 'По Популярности'},
                {value: 'name', label: 'По алфавиту'},
                {value: 'aired_on', label: 'По дате выхода'},
                {value: 'status', label: 'Случайно'},
                {value: 'episodes', label: 'По количеству Серии'},
                {value: 'id', label: 'По ID'}
            ],
            genreOptions: [
                {value: '5', label: 'Авангард'},
                {value: '543', label: 'Гурман'},
                {value: '8', label: 'Драма'},
                {value: '4', label: 'Комедия'},
                {value: '36', label: 'Повседневность'},
                {value: '2', label: 'Приключения'},
                {value: '22', label: 'Романтика'},
                {value: '37', label: 'Сверхъестественное'},
                {value: '30', label: 'Спорт'},
                {value: '7', label: 'Тайна'},
                {value: '117', label: 'Триллер'},
                {value: '14', label: 'Ужасы'},
                {value: '24', label: 'Фантастика'},
                {value: '10', label: 'Фэнтези'},
                {value: '1', label: 'Экшен'},
                {value: '9', label: 'Этти'},
                {value: '143', label: 'Антропоморфизм'},
                {value: '119', label: 'CGDCT'},
                {value: '17', label: 'Боевые исскусства'},
                {value: '32', label: 'Вампиры'},
                {value: '104', label: 'Взрослые персонажы'},
                {value: '103', label: 'Видеоигры'},
                {value: '38', label: 'Военное'},
                {value: '141', label: 'Выживание'},
                {value: '35', label: 'Гарем'},
                {value: '3', label: 'Гонки'},
                {value: '112', label: 'Гэг-юмор'},
                {value: '39', label: 'Детектив'},
                {value: '105', label: 'Жесткость'},
                {value: '134', label: 'Забота о детях'},
                {value: '146', label: 'Игра с высокими ставками'},
                {value: '145', label: 'Идолы (жен.)'},
                {value: '150', label: 'Идолы (муж.)'},
                {value: '108', label: 'Изобразительное искусство'},
                {value: '142', label: 'Исполнительское искусство'},
                {value: '13', label: 'Исторический'},
                {value: '130', label: 'Исэкай'},
                {value: '140', label: 'Иясикэй'},
                {value: '102', label: 'Командный спорт'},
                {value: '29', label: 'Космос'},
                {value: '144', label: 'Кроссдрессинг'},
                {value: '137', label: 'Культура отаку'}
            ],
        };
    },
    mounted() {
    },
    methods: {
        clearFilters() {
            this.filters = {
                status: [],
                kind: [],
                sort: '',
                season: '',
                rating: '',
                genre: []
            };
            this.$router.push('/catalog');
        },
        closeFilter() {
            let filterBox = document.querySelector(".main-filter");
            let body = document.body;
            anime({
                targets: filterBox,
                left: [0, "-100"],
                opacity: [1, 0],
                duration: 450,
                easing: "easeInOutExpo",
                complete: function () {
                    console.log("Animation Started =>  close filter <=");
                    body.style.overflow = "auto";
                    filterBox.style.display = "none";
                },
            });
        },
        openFilter() {
            let filterBox = document.querySelector(".main-filter");
            let body = document.body;
            anime({
                targets: filterBox,
                left: ["-100%", 0],
                opacity: [0, 1],
                duration: 450,
                easing: "easeInOutExpo",
                begin: function () {
                    console.log("Animation started => open filter <=");
                    body.style.overflow = "hidden";
                    filterBox.style.display = "block";
                },
            });
        },
        toggleSelect(filter) {
            Object.keys(this.selectOpen).forEach(key => {
                if (key !== filter) {
                    this.selectOpen[key] = false;
                    this.closeCustomSelect(key);
                }
            });

            this.selectOpen[filter] = !this.selectOpen[filter];
            if (this.selectOpen[filter]) {
                this.openCustomSelect(filter);
            } else {
                this.closeCustomSelect(filter);
            }
        },
        openCustomSelect(filter) {
            let selectOptions = document.querySelector(`.custom-select-options[data-filter="${filter}"]`);
            anime({
                targets: selectOptions,
                translateY: 0,
                opacity: 1,
                duration: 100,
                easing: "easeInOutQuad",
                begin: function () {
                    selectOptions.style.display = "block";
                    console.log("Opened current select");
                },
            });
        },
        closeCustomSelect(filter) {
            let selectOptions = document.querySelector(`.custom-select-options[data-filter="${filter}"]`);
            anime({
                targets: selectOptions,
                translateY: "10px",
                opacity: 0,
                duration: 100,
                easing: "easeInOutQuad",
                complete: function () {
                    selectOptions.style.display = "none";
                    console.log("Closed current select");
                },
            });
        },
        submitFilters() {
            let queryParams = Object.keys(this.filters)
                .filter(key => this.filters[key] !== '')
                .map(key => {
                    if (Array.isArray(this.filters[key])) {
                        return `${key}=${this.filters[key].join(',')}`;
                    } else {
                        return `${key}=${this.filters[key]}`;
                    }
                })
                .join('&');

            let catalogUrl = `/catalog?${queryParams}`;
            console.log('Отправка фильтров', this.filters);
            console.log('URL-адрес каталога с параметрами:', catalogUrl);
            this.$router.push(catalogUrl);
            // window.location.href = `${catalogUrl}`
        }
    }
};
</script>

<style lang="scss">
/* filter */
.main-filter {
    min-width: 350px;
    max-width: 350px;
    top: 80px;
    position: sticky;
}

@media screen and (max-width: 1440px) {
    .main-filter {
        min-width: 300px;
        max-width: 300px;
    }
}

.filter-clear {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#close-button {
    display: none;
    white-space: nowrap;
}

.main-filter .filter-title {
    display: flex;
    align-items: center;
    gap: 5px;
}

.filter-title i {
    font-size: 1.3em;
}


.filter-clear button {
    padding: 5px 10px;
    display: flex;
    align-items: center;
    font-size: 1em;
    gap: 8px;
    border-radius: 20px;
    color: var(--filter-filter-clear-button);
    background-color: transparent;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.filter-clear button img {
    width: 15px;
    margin-left: 5px;
    filter: invert(1);
}

.filter-clear button:hover {
    background-color: var(--filter-filter-clear-button-hover);
}

.filter-selector {
    padding: 10px 0;
}

.filter-selector label {
    font-size: 1em;
    padding: 10px 0 1px 0;
    width: 100%;
    display: block;
}

.filter-box {
    height: 100%;
    padding: 20px 10px;
    background-color: var(--filter-filter-genre-box-color);
}

.filter-box span {
    font-size: 0.8em;
    color: var(--filter-filter-box-label-span-font-color);
    padding-bottom: 5px;
    display: block;
}

.tags-checkbox {
    width: 100%;
    display: flex;
    flex-direction: column;
    max-height: 400px;
    overflow: hidden;
    overflow-y: scroll;
    margin: 10px 0;
}

.tags-checkbox::-webkit-scrollbar {
    width: 5px;
}

.tags-checkbox::-webkit-scrollbar-thumb {
    background-color: var(--tags-checkbox-scrool-thumb);
    border-radius: 5px;
}

.tags-checkbox::-webkit-scrollbar-track {
    background-color: var(--filter-filter-scrollbar-color-track);
    border-radius: 5px;
}

.tags-checkbox::-webkit-scrollbar-thumb:hover {
    background-color: var(--filter-filter-scrollbar-color-hover);
}

.tags-checkbox label {
    margin: 5px 0;
}

.filter-selector .submit button {
    width: 100%;
    padding: 0 20px;
    cursor: pointer;
    background-color: var(--filter-filter-search-button-color);
    border: 2px solid var(--filter-filter-search-button-border-color);
    transition: background-color 0.2s ease-in-out, border 0.2s ease-in-out;
    height: 40px;
    color: var(--filter-filter-search-button-font-color);
}

.filter-selector .submit button:hover {
    background-color: var(--filter-filter-search-button-hover-color);
    border: 2px solid var(--filter-filter-search-button-border-hover-color);
}

.filt-button {
    display: none;
    position: sticky;
    top: 65px;
    width: 100%;
    z-index: 100;
}

.filt-button button {
    display: flex;
    width: 100%;
    outline: none;
    align-items: center;
    border: none;
    justify-content: center;
    gap: 5px;
    padding: 8px 0;
    font-size: 1.1em;
    cursor: pointer;
    background-color: var(--filter-filter-filt-button);
    color: white;
    transition: background-color 0.2s ease-in-out;
}

.filt-button button:hover {
    background-color: var(--filter-filter-filt-button);
}

.filt-button button i {
    font-size: 1.3em;
}

.filter-selector .submit {
    width: 100%;
    padding: 10px 0;
}

.filter-query {
    padding: 10px;
    width: 100%;
    z-index: 100;
    background-color: var(--filter-filter-query-background-color);
    margin-top: 10px;
}

.filter-title {
    width: 100%;
}

/* customSelector */
.custom-select {
    display: block;
    width: 100%;
    position: relative;
}

.filter-query .filter-item:nth-child(1) {
    margin-top: 10px;
    padding: 0 !important;
}

.filter-query .filter-item {
    padding-top: 5px;
}

.custom-select .custom-select-title {
    padding: 10px 15px;
    font-size: 1em;
    width: 100%;
    border: none;
    color: var(--filter-filter-custom-select-title-color);
    background-color: var(--filter-filter-custom-select-title-background-color);
    cursor: pointer;
    position: relative;
    display: inline-block;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.custom-select .custom-select-options {
    z-index: 10;
    max-height: 200px;
    overflow: hidden;
    overflow-y: scroll;
    position: absolute;
    width: 100%;
    background-color: var(--filter-filter-custom-select-options-background-color);
    padding: 8px 15px;
    border: 1px solid var(--filter-custom-select-border-color)
}

.custom-select .custom-select-options::-webkit-scrollbar {
    width: 3px;
}

.custom-select .custom-select-options div {
    padding: 5px 0;
    display: flex;
    align-items: center;
}

.custom-select .custom-select-options div input,
.custom-select .custom-select-options div label {
    cursor: pointer;
    padding: 0;
}

.custom-select .custom-select-options div input {
    margin-right: 10px;
    transform: scale(1.4);
}

@media screen and (max-width: 1024px) {
    .custom-select .custom-select-options::-webkit-scrollbar {
        width: 0;
    }

    .main-filter {
        display: none;
    }

    .main-filter {
        display: none;
        position: fixed;
        top: 0;
        max-width: 350px;
        width: 100%;
        height: 100dvh;
        background-color: var(--filter-filter-background-color);
        z-index: 1001;
        padding: 20px;
        overflow: hidden;
    }

    .filter-selector {
        overflow: auto;
        height: 100%;
        max-width: none;
    }

    #clear-button {
        display: none;
    }

    #close-button {
        display: block;
    }

    .filter-open {
        left: 0;
        display: block;
    }

    .no-scroll {
        overflow: hidden !important;
    }

    .submit {
        margin-bottom: 50px;
    }

    .filt-button {
        display: flex;
    }
}

@media screen and (max-width: 425px) {
    .main-filter {
        width: 100%;
        max-width: 100%;
    }
}
</style>
