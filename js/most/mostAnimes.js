async function mostFetchOnGoing(limit) {
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
          animes(limit: ${limit}, order: popularity, status: "ongoing", kind: "tv") {
            id
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
        // const popularAnime = data.data.animes;
        // const filteredAnime = shuffleArray(popularAnime);
        const animeList = data.data.animes.filter(anime =>
            !blacklistedAnimeIds.includes(anime.id) &&
            anime.name !== null && anime.name.trim() !== ""
        );
        if (animeList.length < 5) {
            await mostFetchOnGoing(5);
        } else {
            displayAnimeListMost(animeList, ".most-content-animes-list-option-1");
            await delay(500)
            await mostFetchOnAnonse(5);
        }
    } catch (error) {
        console.warn("Request error => ", error);
        await delay(500)
        await mostFetchOnGoing(5);
    }
}

async function mostFetchOnAnonse(limit) {
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
          animes(season: "2024" limit: ${limit}, order: random, status: "anons", kind: "tv") {
            id
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
        // const popularAnime = data.data.animes;
        // const filteredAnime = shuffleArray(popularAnime);
        const animeList = data.data.animes.filter(anime =>
            !blacklistedAnimeIds.includes(anime.id) &&
            anime.name !== null && anime.name.trim() !== ""
        );
        if (animeList.length < 5) {
            await mostFetchOnAnonse(5);
        } else {
            displayAnimeListMost(animeList, ".most-content-animes-list-option-2");
            await delay(500)
            await mostFetchOnTop();
        }
    } catch (error) {
        console.warn("Request error => ", error);
        await delay(500)
        await mostFetchOnAnonse(5);
    }
}

async function mostFetchOnTop(limit) {
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
          animes(limit: ${limit}, order: ranked, status: "released", kind: "tv") {
            id
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
        // const popularAnime = data.data.animes;
        // const filteredAnime = shuffleArray(popularAnime);
        const animeList = data.data.animes.filter(anime =>
            !blacklistedAnimeIds.includes(anime.id) &&
            anime.name !== null && anime.name.trim() !== ""
        );
        if (animeList.length < 5) {
            await delay(500)
            await mostFetchOnTop(5);
        } else {
            displayAnimeListMost(animeList, ".most-content-animes-list-option-3");
            await delay(500)
            await mostFetchOnReleased(5);
        }
    } catch (error) {
        console.warn("Request error => ", error);
        await delay(500)
        await mostFetchOnTop(5);
    }
}

async function mostFetchOnReleased(limit) {
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
          animes(, limit: ${limit}, order: popularity, status: "released", kind: "tv") {
            id
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
        // const popularAnime = data.data.animes;
        // const filteredAnime = shuffleArray(popularAnime);
        const animeList = data.data.animes.filter(anime =>
            !blacklistedAnimeIds.includes(anime.id) &&
            anime.name !== null && anime.name.trim() !== ""
        );
        if (animeList.length < 5) {
            await delay(500)
            await mostFetchOnReleased(5);
        }
        displayAnimeListMost(animeList, ".most-content-animes-list-option-4");
    } catch (error) {
        console.warn("Request error => ", error);
        await delay(500)
        await mostFetchOnReleased();
    }
}

mostFetchOnGoing();
