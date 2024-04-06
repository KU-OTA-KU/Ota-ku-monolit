function displayAnimeList(animeList, selector) {
  let mainContent = document.querySelector(selector);
  animeList.forEach((anime) => {
    let animeHTML = `
        <div class="movie">
          <div class="movie-image">
            <img src="${anime.poster.originalUrl}" alt="${anime.name}">
          </div>
          <div class="movie-name">
          <div class="status">
            <div class="type">${anime.kind}</div>
              <div class="rating">
                  ${anime.score}
                  <i class="fa-solid fa-star"></i>
              </div>
            </div>
            <div class="name">
              <a href="#">${anime.russian}</a>
            </div>
          </div>
        </div>
      `;
    mainContent.insertAdjacentHTML("beforeend", animeHTML);
  });
}