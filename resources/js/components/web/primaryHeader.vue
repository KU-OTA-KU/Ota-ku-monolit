<template>
  <!-- header Start -->
  <header>
    <div class="header-inner">
      <div class="header-tit">
        <div class="header-log-and-nav">
          <div class="header-logo" onclick="">
              <router-link to="/">
                  <img src="../../../img/ota-ku/ota-ku.webp" alt="Логотип Ota Ku - лучший аниме" id="ota-ku-best-anime-logo" />
              </router-link>
          </div>
          <nav class="header-navigation">
            <button @click="openSidenav()">
              <i class="fa-sharp fa-solid fa-bars"></i>
            </button>
          </nav>
          <div class="header-search">
            <form action="/catalog" method="GET">
              <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <input name="search" type="text" v-model="searchQuery" placeholder="Что будем искать в мире аниме?"
                class="search-input-fa" autocomplete="off">
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header End -->

  <div id="my-sidenav" class="my-sidenav" ref="sidenav">
    <div class="sidenav-inner">
      <div class="sidenav-tit">
        <div class="sidenav-top-name-close-button">
          <p>НАВИГАЦИЯ</p>
          <button @click="closeSidenav()">
            Закрыть<i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="sidenav-name-container">
          <router-link :to="'/'"><i class="fa-solid fa-house"></i>Главная</router-link>
          <router-link :to="'/catalog'"><i
              class="fa-solid fa-layer-group"></i>Каталог</router-link>
        </div>
        <div class="sidenav-user-settings">
          <p>Настройки:</p>
          <select class="sidenav-user-sett-selector" id="theme-selector" v-model="selectedTheme"
            @change="handleThemeChange">
            <option value="dark_1">Темная (океан)</option>
            <option value="light_1">Светлая</option>
          </select>
          <select class="sidenav-user-sett-selector" id="voice-selector" v-model="selectedVoice"
            @change="handleVoiceChange">
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
          <form action="/catalog" method="GET">
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input name="search" type="text" v-model="searchQuery" placeholder="Что будем искать в мире аниме?"
              class="search-input-fa" autocomplete="off">
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- search End media 630px -->
</template>

<script>
import { setCookie, getCookie } from '../../other/getSetCookie.js';
export default {
  data() {
    return {
      searchQuery: '',
      sidebarIsOpened: false,
      selectedVoice: null,
      selectedTheme: 'dark_1',
    };
  },
  mounted() {
    if (this.$route.query.search) {
      this.searchQuery = this.$route.query.search;
    }

    const selectedVoice = getCookie("selectedVoice");
    if (selectedVoice) {
      this.selectedVoice = selectedVoice;
    }

    const selectedTheme = getCookie("selectedTheme");
    if (selectedTheme) {
      this.selectedTheme = selectedTheme;
    }
  },
  methods: {
    openSidenav() {
      let sidenav = this.$refs.sidenav;
      if (this.sidebarIsOpened === false) {
        anime({
          targets: sidenav,
          left: ["-100%", 0],
          opacity: [0, 1],
          duration: 450,
          easing: "easeInOutExpo",
          begin: function () {
            console.log("Animation started => open sidenav <=");
            this.sidebarIsOpened = true;
          },
        });
      }
    },
    closeSidenav() {
      let sidenav = this.$refs.sidenav;
      anime({
        targets: sidenav,
        left: [0, "-100"],
        opacity: [1, 0],
        duration: 450,
        easing: "easeInOutExpo",
        complete: function () {
          console.log("Animation Started => close sidenav <=");
          this.sidebarIsOpened = false;
        },
      });
    },
    handleVoiceChange() {
      setCookie("selectedVoice", this.selectedVoice, 30);
    },
    handleThemeChange() {
      setCookie("selectedTheme", this.selectedTheme, 30);
      const currentThemeLink = document.querySelector('.currentTheme');
      const themeStyleSheetPath = `css/palette/${this.selectedTheme}.css`;
      currentThemeLink.setAttribute('href', themeStyleSheetPath);
    }
  }
}
</script>

<style lang="scss" scoped>
header {
  width: 100%;
  padding: 10px 0;
  background-color: var(--header-background-color);
  font-size: 1em;
  position: sticky;
  box-shadow: 0 0 19px 2px var(--header-box-shadow-color);
  top: 0;
  z-index: 1000;
  min-height: 55px;
  height: 55px;
}

.header-inner {
  width: 100%;
  padding: 0 10px;
}

.header-navigation a {
  color: var(--header-navigation-link-color);
}

.header-navigation a:hover {
  color: var(--header-navigation-link-color-hover);
}

.header-tit {
  max-width: var(--ota-ku-max-width);
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* header log and nav  */
.header-log-and-nav {
  display: flex;
  height: 100%;
  max-height: 35px;
  align-items: center;
  width: 100%;
  position: relative;
}

.header-logo {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.header-logo img {
  max-height: 35px;
  margin-right: 35px;
  /*cursor: pointer;*/
  pointer-events: none;
  user-select: none;
}

.header-navigation {
  font-weight: bold;
  display: flex;
  gap: 30px;
}

.header-navigation nav {
  width: 100%;
}

.nav-button {
  padding: 7px 0;
  transition: color 0.2s;
}

/* header login */
.header-login {
  height: 100%;
}

.user {
  display: flex;
  align-items: center;
}

.user .user-img {
  margin-left: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  position: relative;
}

.user .user-img img {
  width: 40px;
  max-width: 40px;
  min-width: 40px;
  pointer-events: none;
  height: 40px;
  max-height: 40px;
  min-height: 40px;
  border-radius: 100%;
}

.user-cont {
  text-align: right;
}

.user-email {
  font-size: 9px;
}

/* search */
.header-search {
  height: 100%;
  margin-left: 30px;
  margin-right: 30px;
  width: 100%;
  position: relative;
}

.header-search form {
  background-color: var(--header-search-form-backgorund-color);
  display: flex;
  box-shadow: inset 0 0 20px 5px var(--header-search-form-box-shadow-color);
  width: 100%;
  border-radius: 20px;
  padding: 9px 20px;
  height: 100%;
  transition: border 0.2s ease-in-out;
  max-height: 35px;
  border: 1px solid var(--header-search-form-border-color);
}

.header-search form button {
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  height: 100%;
  margin: auto;
  cursor: pointer;
}

.header-search form button i {
  font-size: 1em;
  transition: color 0.2s ease-in-out;
  color: var(--header-search-form-button-color);
}

.header-search form input {
  background-color: transparent;
  border: none;
  outline: none;
  padding: 0 10px;
  color: var(--header-search-form-input-placeholder-color);
  width: 100%;
}

.search {
  width: 100%;
  /*padding-top: 10px;*/
  display: none;
}

.search-inner {
  padding: 0 10px;
  width: 100%;
}

.search-tit {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.header-search:hover form button i {
  color: var(--header-search-form-button-hover-color);
}

.header-search:hover form {
  border: 1px solid var(--header-search-form-hover-border-color);
}

.header-navigation button {
  background-color: var(--header-sidenav-burger-background-color);
  height: 35px;
  width: 50px;
  border-radius: 2px;
  display: flex;
  outline: none;
  align-items: center;
  justify-content: center;
  font-size: 1.4em;
  color: var(--header-sidenav-burger-color);
  border: 2px solid var(--header-sidenav-burger-border-color);
  cursor: pointer;
  transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
}

.sidenav-name-container {
  padding: 20px 0;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.sidenav-name-container a {
  font-size: 1em;
  padding: 10px 0;
  cursor: pointer;
  width: 100%;
  transition: color 0.2s ease-in-out;
  background-color: transparent;
  display: flex;
  outline: none;
  color: var(--header-sidenav-name-container-button-color);
  border: none;
  font-weight: normal;
}

.sidenav-name-container a:hover {
  color: var(--header-sidenav-name-container-button-hover-color) !important;
}

.sidenav-name-container i {
  font-size: 1.3em;
  margin-right: 10px;
}


.header-navigation button:hover {
  color: var(--header-sidenav-name-container-button-hover-color);
  background-color: transparent;
}

.my-sidenav {
  background-color: var(--header-sidenav-background-color);
  border-right: 2px solid var(--header-sidenav-border-color);
  position: fixed;
  display: flex;
  top: 0;
  opacity: 0;
  left: -100%;
  z-index: 1001;
  height: 100%;
  padding: 20px 15px;
}

.my-sidenav .sidenav-inner {
  width: 100%;
}

.my-sidenav .sidenav-tit .sidenav-top-name-close-button button {
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

.my-sidenav .sidenav-tit .sidenav-top-name-close-button button:hover {
  background-color: var(--header-sidenav-name-button-hover-color);
}

.sidenav-top-name-close-button {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-weight: bold;
  gap: 50px;
}

.sidenav-top-name-close-button p {
  font-size: 1.1em;
}

.sidenav-user-settings {
  width: 100%;
  display: flex;
  gap: 10px;
  flex-direction: column;
}

.sidenav-user-settings select {
  padding: 8px 15px;
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
  outline: none;
}

/* media requests */
@media screen and (max-width: 1024px) {
  /* empty  */
}

@media screen and (max-width: 768px) {
  /*.header-navigation {*/
  /*  display: none;*/
  /*}*/
  /*.header-logo img {*/
  /*  margin: 0;*/
  /*}*/
}

@media screen and (max-width: 630px) {
  .header-search {
    display: none;
  }

  .header-log-and-nav {
    justify-content: space-between;
  }

  .search {
    display: flex !important;
  }

  .header-search {
    margin: 0;
  }

  .spm-search {
    display: flex;
  }
}

@media screen and (max-width: 468px) {
  /* empty */
}

@media screen and (max-width: 425px) {
  .my-sidenav {
    width: 100%;
  }
}

@media screen and (max-width: 375px) {
  .user .user-cont {
    display: none;
  }
}
</style>
