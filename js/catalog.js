let currpage = 1;
const limit = 10;
let loading = false;
let nextPageTimeout = null;
let animeFound = false;

// let maxFetchsInAnimeList = 10;

function isNearBottom() {
    return (
        window.innerHeight + window.scrollY >= document.body.offsetHeight - 1000
    );
}

function loadNextPage() {
    if (!loading) {
        loading = true;

        if (nextPageTimeout) {
            clearTimeout(nextPageTimeout);
        }

        nextPageTimeout = setTimeout(() => {
            currpage++;
            // if (currpage <= maxFetchsInAnimeList) {
            // generateAnimeListStekelton(50, ".main-content");
            fetchAnimeData();
            // } else {
            //   console.log("goodbye my love!");
            // }
        }, 100);
    }
}

function joinObjectValues(obj) {
    return Object.values(obj).join(',');
}

function getUrlParams() {
    const searchParams = new URLSearchParams(window.location.search);
    const params = {};
    for (const [key, value] of searchParams) {
        const paramName = key.replace(/\[\]$/, '');
        if (paramName in params) {
            params[paramName] += `,${value}`;
        } else {
            params[paramName] = value;
        }
    }
    // console.log(params);
    return params;
}

function getSearchParams() {
    const searchParams = new URLSearchParams(window.location.search);
    const searchValue = searchParams.get('search');
    return searchValue !== null ? searchValue : null;
}

function displayNotAnimeFound(element) {
    let mainContent = document.querySelector(element);

    let emptyAnimeMessage = `
      <div class="empty-anime-message"><h3>Ничего не нашлось, сенпай 😔</h3></div>
      <style>
       .main-content {
       grid-template-columns: repeat(1, minmax(100px, 1fr));
       }
      </style>
    `;
    mainContent.insertAdjacentHTML('beforeend', emptyAnimeMessage);
}


async function fetchAnimeData() {
    const params = getUrlParams();
    const search = getSearchParams();
    const season = params['season'];
    const status = params['status'];
    const kind = params['kind'];
    const sort = params['sort'];
    const rating = params['rating'];
    const genres = params['genres'];
    // check all
    const searchString = search || '';
    const seasonString = season || '';
    const kindString = kind || 'tv,special,tv_special';
    const statusString = status || '';
    const sortString = sort || 'ranked';
    const ratingString = rating || '';
    const genresString = genres || '';
    // console.log(statusString)
    const query = `
      query {
        animes(
          search: "${searchString}",
          season: "${seasonString}", 
          kind: "${kindString}",
          status: "${statusString}", 
          order: ${sortString},
          rating: "${ratingString}",
          genre: "${genresString}",
          limit: ${limit},
          page: ${currpage},
        ) {
          id
          name
          russian
          kind
          score
          status
          poster {
            originalUrl
          }
        }
      }
    `.replace(/\n/g, "");

    fetch("https://shikimori.one/api/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify({query}),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("%cУСПЕШНО!", "color: greenyellow");
            const animeList = data.data.animes.filter(anime =>
                !blacklistedAnimeIds.includes(anime.id) &&
                anime.name !== null && anime.name.trim() !== ""
            );
            if (animeList.length == 0) {
                console.log("no data");
                if (!animeFound) {
                    displayNotAnimeFound(".main-content");
                }
            } else {
                animeFound = true;
            }
            generateAnimeListStekelton(animeList.length, ".main-content");
            displayAnimeList(animeList, ".main-content");
            loading = false;
        })
        .catch((error) => {
            console.warn("Request Error => ", error);
            loading = false;
        });
}

window.addEventListener("scroll", () => {
    if (isNearBottom()) {
        loadNextPage();
    }
});

async function generateAnimeListStekelton(count, selector) {
    let mainContent = document.querySelector(selector);

    for (let i = 0; i < count; i++) {
        let animeHTML = `
        <div class="movie" id="not-appended">
        <div class="movie-image"></div>
        <div class="movie-name">
        <div class="status">
          <div class="type"></div>
            <div class="rating"></div>
          </div>
          <div class="name"></div>
        </div>
      </div>
      `;
        mainContent.insertAdjacentHTML("beforeend", animeHTML);
    }
}

function displayAnimeList(animeList, selector) {
    let mainContent = document.querySelector(selector);
    let movies = mainContent.querySelectorAll('.movie:not(#appended)');

    animeList.forEach((anime, index) => {
        let currentCell = movies[index];
        if (!currentCell) return;
        currentCell.innerHTML = '';
        let animeHTML = `
      <div class="movie-image">
        <img src="${anime.poster.originalUrl}" alt="${anime.name}">
      </div>
      <div class="movie-name">
        <div class="status" style="background: transparent !important;">
          <div class="type">${anime.kind}</div>
          <div class="rating">
            ${anime.score}
            <i class="fa-solid fa-star"></i>
          </div>
        </div>
        <div class="name" style="background: transparent !important;">
          <a href="anime.php?animeId=${anime.id}">${anime.russian}</a>
        </div>
      </div>
    `;

        currentCell.insertAdjacentHTML('beforeend', animeHTML);
        currentCell.id = "appended";
        currentCell.onclick = function () {
            window.location.href = `anime.php?animeId=${anime.id}`;
        };
    });
}