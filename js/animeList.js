let currpage = 1;
const limit = 10;
let loading = false;
let nextPageTimeout = null;
let maxFetchsInAnimeList = 5;

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
            if (currpage <= maxFetchsInAnimeList) {
                //generateAnimeListStekelton(50, ".main-content");
                fetchAnimeData();
            } else {
                console.log("goodbye my love!");
                window.removeEventListener("scroll", loadNextPage);
            }
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
      `.replace(/\n/g, ""),
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("NEW DATA ADDED SUCCESSFULLY!");
            const animeList = data.data.animes.filter(anime =>
                !blacklistedAnimeIds.includes(anime.id) &&
                anime.name !== null && anime.name.trim() !== ""
            );
            //const filteredAnime = shuffleArray(animeList);
            generateAnimeListStekelton(animeList.length, ".main-content");
            //displayAnimeList(animeList, ".main-content");
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
