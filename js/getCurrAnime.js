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
        kind
        score
        status
        poster {
          originalUrl
        }
        genres {
          id
          name
          russian
          kind
        }
        airedOn {
          year
        }
        screenshots { 
          id
          originalUrl
        }
        characterRoles {
          id
          rolesRu
          rolesEn
          character { 
            id 
            name 
            poster { 
              id 
              originalUrl
            }
          }
        }
        description
      }
    }
    `,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("topSlider popular animes top Detected!");
      const anime = data.data.animes;
      appendAnimeInSite(anime);
    })
    .catch((error) => {
      console.warn("Request error => ", error);
    });
}
