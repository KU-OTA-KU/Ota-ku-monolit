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
        const paramName = key.replace(/\[\]$/, '');  // yanm banem anm ara
        if (paramName in params) {
            params[paramName] += `,${value}`;
        } else {
            params[paramName] = value;
        }
    }
    console.log(params);
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
            console.log("NEW DATA ADDED SUCCESSFULLY!");
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

fetchAnimeData();