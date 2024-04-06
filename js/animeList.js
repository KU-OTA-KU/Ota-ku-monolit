let currpage = 1;
const limit = 50;
let loading = false;
let nextPageTimeout = null;

function isNearBottom() {
  return window.innerHeight + window.scrollY >= document.body.offsetHeight - 1000;
}

function loadNextPage() {
  if (!loading) {
    loading = true;

    if (nextPageTimeout) {
      clearTimeout(nextPageTimeout);
    }

    nextPageTimeout = setTimeout(() => {
      currpage++;
      fetchAnimeData();
    }, 100);
  }
}

function fetchAnimeData() {
  fetch("https://shikimori.one/api/graphql", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({
      query: `
      query {
        animes(season: "2020_2024", limit: ${limit}, page: ${currpage}, kind: "tv,movie,special,tv_special") {
          name
          russian
          licenseNameRu
          english
          japanese
          kind
          score
          status
          url
          poster {
            originalUrl
          }
        }
      }
      `.replace(/\n/g, ''),
    }),
  })
  .then((response) => response.json())
  .then((data) => {
    console.log("NEW DATA ADDED SUCCESSFULLy!");
    const filteredAnime = data.data.animes.filter(anime => anime.score > 0 && anime.name);
    displayAnimeList(filteredAnime, ".main-content");
    loading = false;
  })
  .catch((error) => {
    console.error("Request Error => ", error);
    loading = false;
  });
}

window.addEventListener("scroll", () => {
  if (isNearBottom()) {
    loadNextPage();
  }
});

fetchAnimeData();
