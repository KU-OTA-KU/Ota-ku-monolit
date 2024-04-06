function displayAnimeListPopular(animeList, selector) {
  let mainContent = document.querySelector(selector);
  let movie = mainContent.querySelectorAll('.movie');
  
  animeList.forEach((anime, index) => {
    let currentCell = movie[index];
    currentCell.innerHTML = '';
    let animeHTML = `
          <div class="movie-image">
            <img src="${anime.poster.originalUrl}" alt="${anime.name}">
          </div>
          <div class="movie-name">
          <div class="status" style="background: transparent !important;">
            <div class="type">${anime.kind}</div>
              <div class="rating">
                  ${anime.score}
                  <i class="fa-solid fa-star"></i>
              </div>
            </div>
            <div class="name" style="background: transparent !important;">
              <a href="#">${anime.russian}</a>
            </div>
          </div>
      `;
      currentCell.insertAdjacentHTML("beforeend", animeHTML);
  });
}