async function appendAnimeInSite(data) {
  data = JSON.stringify(data);
  sessionStorage.setItem('CurrentAnime', data);
  window.myData = data;

}

// document.body.innerHTML = _ANIM_NAME_;
const storedData = sessionStorage.getItem('CurrentAnime');
const _ANIME_ID_ = JSON.parse(storedData)[0].id; // anime id
const _ANIME_ENGLISH_NAME_ = JSON.parse(storedData)[0].english;
const _ANIME_RUSSIAN_NAME_ = JSON.parse(storedData)[0].russian;


// 1) append anime title
document.title = `AnimeCO ${_ANIME_RUSSIAN_NAME_}`;
