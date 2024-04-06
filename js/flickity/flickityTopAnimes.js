fetch("https://shikimori.one/api/graphql", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
  body: JSON.stringify({
    query: `
    query {
      animes(season: "2024", limit: 20, order: popularity, status: "released", kind: "tv,movie,special,tv_special") {
        name
        russian
        english
        japanese
        score
        url
        poster {
          originalUrl
        }
        genres {
          id
          name
          russian
          kind
        }
      }
    }
    `,
  }),
})
  .then((response) => response.json())
  .then((data) => {
    console.log("flickity popular animes top Detected!");
    const popularAnime = data.data.animes;
    const filteredAnime = shuffleArray(popularAnime);
    displayAnimeListInFlickity(filteredAnime, ".flickity-slider");
  })
  .catch((error) => {
    console.error("Request error => ", error);
  });
