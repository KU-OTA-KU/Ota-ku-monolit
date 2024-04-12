async function flickityTopAnimesOpen() {
  try {
    const response = await fetch("https://shikimori.one/api/graphql", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify({
        query: `
          query {
            animes(season: "2024", limit: 20, order: popularity, status: "released", kind: "tv,movie,special,tv_special") {
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
    });

    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    const data = await response.json();
    console.log("flickity popular animes top Detected!");
    // const popularAnime = data.data.animes;
    // const filteredAnime = shuffleArray(popularAnime);
    const animeList = data.data.animes.filter(anime =>
        !blacklistedAnimeIds.includes(anime.id) &&
        anime.name !== null && anime.name.trim() !== ""
    );
    displayAnimeListInFlickity(animeList, ".flickity-slider");
  } catch (error) {
    console.warn("Request error => ", error);
    console.log("try again...")
    await delay(1000); 
    await flickityTopAnimesOpen();
  }
}

flickityTopAnimesOpen();
