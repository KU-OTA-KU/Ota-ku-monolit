async function mostFetchOnGoing() {
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
          animes(limit: 5, order: popularity, status: "ongoing", kind: "tv") {
            name
            russian
            english
            kind
            score
            status
            poster {
              originalUrl
            }
            airedOn {
              year
            }
          }
        }
        `,
      }),
    });
    const data = await response.json();
    console.log("Most ongoing animes has detected append!!");
    const popularAnime = data.data.animes;
    const filteredAnime = shuffleArray(popularAnime);
    displayAnimeListMost(filteredAnime, ".most-content-animes-list-option-1");
    await mostFetchOnAnonse();
  } catch (error) {
    console.error("Request error => ", error);
    await mostFetchOnGoing();
  }
}

async function mostFetchOnAnonse() {
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
          animes(season: "2024" limit: 5, order: random, status: "anons", kind: "tv") {
            name
            russian
            english
            kind
            score
            status
            poster {
              originalUrl
            }
            airedOn {
              year
            }
          }
        }
        `,
      }),
    });
    const data = await response.json();
    console.log("Most ongoing animes has detected append!!");
    const popularAnime = data.data.animes;
    const filteredAnime = shuffleArray(popularAnime);
    displayAnimeListMost(filteredAnime, ".most-content-animes-list-option-2");
    await mostFetchOnTop();
  } catch (error) {
    console.error("Request error => ", error);
    await mostFetchOnAnonse();
  }
}

async function mostFetchOnTop() {
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
          animes(limit: 5, order: ranked, status: "released", kind: "tv") {
            name
            russian
            english
            kind
            score
            status
            poster {
              originalUrl
            }
            airedOn {
              year
            }
          }
        }
        `,
      }),
    });
    const data = await response.json();
    console.log("Most ongoing animes has detected append!!");
    const popularAnime = data.data.animes;
    const filteredAnime = shuffleArray(popularAnime);
    displayAnimeListMost(filteredAnime, ".most-content-animes-list-option-3");
    await mostFetchOnReleased();
  } catch (error) {
    console.error("Request error => ", error);
    await mostFetchOnTop();
  }
}

async function mostFetchOnReleased() {
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
          animes(, limit: 5, order: ranked, status: "released", kind: "tv") {
            name
            russian
            english
            kind
            score
            status
            poster {
              originalUrl
            }
            airedOn {
              year
            }
          }
        }
        `,
      }),
    });
    const data = await response.json();
    console.log("Most ongoing animes has detected append!!");
    const popularAnime = data.data.animes;
    const filteredAnime = shuffleArray(popularAnime);
    displayAnimeListMost(filteredAnime, ".most-content-animes-list-option-4");
  } catch (error) {
    console.error("Request error => ", error);
    await mostFetchOnReleased();
  }
}

mostFetchOnGoing();
