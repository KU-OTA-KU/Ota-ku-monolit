async function fetchPopularAnimes(limit) {
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
                      animes(season: "2024", limit: ${limit}, order: popularity, status: "released", kind: "tv") {
                        id
                        name
                        russian
                        kind
                        score
                        poster {
                          originalUrl
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
        console.log("Popular animes have been detected and appended!!");
        const animeList = data.data.animes.filter(anime =>
            !blacklistedAnimeIds.includes(anime.id) &&
            anime.name !== null && anime.name.trim() !== ""
        );

        if (animeList.length < 10) {
            await delay(1000);
            await fetchPopularAnimes(10);
        } else {
            displayAnimeListPopular(animeList, ".top-popular-animes-content");
        }
    } catch (error) {
        console.warn("Request error => ", error);
        console.log("Trying again to fetch popular animes");
        await delay(1000);
        await fetchPopularAnimes(10);
    }
}

fetchPopularAnimes(15);
