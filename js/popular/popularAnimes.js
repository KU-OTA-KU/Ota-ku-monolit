fetch("https://shikimori.one/api/graphql", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
  body: JSON.stringify({
    query: `
    query {
      animes(season: "2024", limit: 30, order: popularity, status: "released", kind: "tv,movie,special,tv_special") {
        name
        russian
        english
        kind
        score
        status
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
    console.log("Popular animes has detected append!!");
    const popularAnime = data.data.animes;
    const filteredAnime = shuffleArray(popularAnime);
    displayAnimeListPopular(filteredAnime, ".top-popular-animes-content");
  })
  .catch((error) => {
    console.error("Request error => ", error);
  });


