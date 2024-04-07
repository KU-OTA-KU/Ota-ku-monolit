async function getCurrAnime(GET) {
  fetch("https://shikimori.one/api/graphql", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
  body: JSON.stringify({
    query: `
    query {
      animes(ids: "${GET}", limit: 1) {
        id
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
    const anime = data.data.animes;
    appendAnimeInSite(anime);
  })
  .catch((error) => {
    console.warn("Request error => ", error);
  });
}

getCurrAnime(currAnime);