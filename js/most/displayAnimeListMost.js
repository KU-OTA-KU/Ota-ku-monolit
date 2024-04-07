function displayAnimeListMost(animeList, selector) {
  let mainContent = document.querySelector(selector);
  let movie = mainContent.querySelectorAll('.most-content-movie');
  
  animeList.forEach((anime, index) => {
    let currentCell = movie[index];
    currentCell.innerHTML = '';
    let animeHTML = `
        <div class="most-content-movie-image">
        <img src="${anime.poster.originalUrl}" alt="${anime.name}">
        </div>
        <div class="most-content-movie-info">
          <div class="most-name" style="background: transparent !important;">
            <p>${anime.russian}</p>
          </div>
          <div class="most-status" style="background: transparent !important;">
            <div class="most-type">${anime.kind}</div>
            <div class="rating">
              ${anime.score}
              <i class="fa-solid fa-star" aria-hidden="true" style="cursor: pointer;"></i>
            </div>
          </div>
          <div class="most-data" style="background: transparent !important;"><p>${anime.airedOn.year}</p></div>
        </div>
      `;
      currentCell.insertAdjacentHTML("beforeend", animeHTML);
      currentCell.onclick = function() {
        window.location.href = `anime.php?animeId=${anime.id}`;
      };
  });
}