let currpage = 1;

async function IndexAnimeList
fetch("https://shikimori.one/api/graphql", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
  body: JSON.stringify({
    query: `
    query {
      animes(season: "2023_2024", limit: 50, kind: "tv,movie" page: 1) {
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
    `,
  }),
})
  .then((response) => response.json())
  .then((data) => {
    console.log("anime detected! all work!");
    displayAnimeList(data.data.animes);
  })
  .catch((error) => {
    console.error("Request error => ", error);
  });

function displayAnimeList(animeList) {
  let mainContent = document.querySelector(".main-content");
  animeList.forEach((anime) => {
    let animeHTML = `
        <div class="movie">
          <div class="movie-image">
            <img src="${anime.poster.originalUrl}" alt="${anime.name}">
          </div>
          <div class="movie-name">
          <div class="status">
            <div class="type">${anime.kind}</div>
              <div class="rating">
                  ${anime.score}
                  <i class="fa-solid fa-star"></i>
              </div>
            </div>
            <div class="name">
              <a href="#">${anime.russian}</a>
            </div>
          </div>
        </div>
      `;
    mainContent.insertAdjacentHTML("beforeend", animeHTML);
  });
}
