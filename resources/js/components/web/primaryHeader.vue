<template>
  <!-- header Start -->
  <header>
    <div class="header-inner">
      <div class="header-logo">
        <router-link to="/">
          <img src="/img/ota-ku/ota-ku.webp" alt="Логотип Ota Ku - лучший аниме" id="ota-ku-best-anime-logo" />
        </router-link>
      </div>
      <v-btn @click="openSidenav()" class="raco-primary pd-normal raco-awsome-icon ">
        <i class="fa-sharp fa-solid fa-bars"></i>Каталог
      </v-btn>
    </div>
  </header>
  <!-- header End -->

  <div id="my-sidenav" class="my-sidenav" ref="sidenav">
    <div class="sidenav-inner">
      <div class="sidenav-top-name-close-button">
        <button @click="closeSidenav()" class="pd-small raco-awsome-icon raco-icon-right raco-primary">
          <i class="fa-solid fa-xmark"></i>Закрыть
        </button>
      </div>
      <div class="sidenav-links-list">
        <router-link :to="'/'" class="pd-normal raco-awsome-icon raco-primary"><i
            class="fa-solid fa-house"></i>Главная</router-link>
        <hr>
        <router-link :to="'/catalog'" class="pd-normal raco-awsome-icon raco-primary"><i
            class="fa-solid fa-layer-group"></i>Каталог
        </router-link>
        <hr>
        <router-link to="/release" class="pd-normal raco-awsome-icon raco-primary"><i
            class="fa-solid fa-newspaper"></i>Расписание</router-link>
        <hr>
        <router-link to="/characters" class="pd-normal raco-awsome-icon raco-primary"><i
            class="fa-solid fa-user"></i>Персонажи</router-link>
      </div>
      <div class="sidenav-user-settings">
        <p>Настройки:</p>
        <span>Пожалуйста, выберите цветовую схему сайта.</span>
        <select name="themes" class="sidenav-user-sett-selector" id="theme-selector" v-model="selectedTheme"
          @change="handleThemeChange">
          <option value="dark_1">Темная (океан)</option>
          <option value="light_1">Светлая</option>
        </select>
        <span>Пожалуйста, выберите вариант озвучки для аниме.</span>
        <select name="voice-selector" id="voice-selector" v-model="selectedVoice" @change="handleVoiceChange">
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
</template>

<script>
import { setCookie, getCookie } from '@/other/getSetCookie.js';
import { SingleSelectTag } from "v-selectui/js/singleSelect.js";
import "v-selectui/css/singleSelect.css";

export default {
  data() {
    return {
      sidebarIsOpened: false,
      selectedVoice: 610,
      selectedTheme: 'dark_1',
      SingleSelectTag,
    };
  },
  mounted() {
    const selectedVoice = getCookie("selectedVoice");
    const selectedTheme = getCookie("selectedTheme");

    if (selectedVoice) {
      this.selectedVoice = selectedVoice;
    }
    if (selectedTheme) {
      this.selectedTheme = selectedTheme;
    }

    const voiceSelector = document.getElementById("voice-selector");
    if (voiceSelector) {
      voiceSelector.value = this.selectedVoice;
    }

    const themeSelector = document.getElementById("theme-selector");
    if (themeSelector) {
      themeSelector.value = this.selectedTheme;
    }
    new SingleSelectTag("voice-selector", {
      rounded: true,
      placeholder: "Поиск...",
    });

    new SingleSelectTag("theme-selector", {
      rounded: true,
      placeholder: "Поиск...",
    });
  },

  methods: {
    openSidenav() {
      if (!this.sidebarIsOpened) {
        let sidenav = this.$refs.sidenav;
        anime({
          targets: sidenav,
          left: ["-100%", 0],
          opacity: [0, 1],
          duration: 450,
          easing: "easeInOutExpo",
          begin: function () {
            this.sidebarIsOpened = true;
          }.bind(this),
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
          this.sidebarIsOpened = false;
        }.bind(this),
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
  background-color: var(--cl-4);
  font-size: 1em;
  position: sticky;
  top: 0;
  z-index: 998;
  padding: 15px 10px;

  .header-inner {
    max-width: var(--ota-ku-max-width);
    width: 100%;
    margin: 0 auto;
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: space-between;
  }

  .header-logo {
    display: flex;
    align-items: center;
    cursor: pointer;
    position: relative;

    a {
      display: flex;
    }

    img {
      height: 35px;
      pointer-events: none;
      user-select: none;
    }
  }
}

.my-sidenav {
  background-color: var(--cl-10);
  border-right: 2px solid var(--header-sidenav-border-color);
  position: fixed;
  display: flex;
  top: 0;
  opacity: 0;
  left: -100%;
  z-index: 999;
  height: 100%;
  width: 350px;
  padding: 20px 15px;

  .sidenav-inner {
    width: 100%;
  }

  .sidenav-top-name-close-button {
    display: flex;
    justify-content: flex-end;
  }


  .sidenav-links-list {
    padding: 20px 0;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  //
  .sidenav-user-settings span {
    margin: 10px 0 5px 0;
    display: block;
    color: var(--cl-15);
  }
}


@media screen and (max-width: 630px) {
  .header-search {
    display: none;
  }

  .header-log-and-nav {
    justify-content: space-between;
  }

  .search {
    display: flex;
  }

  .header-search {
    margin: 0;
  }

  .spm-search {
    display: flex;
  }
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
