function displayAnimeList(animeList, selector) {
  let mainContent = document.querySelector(selector);
  let movies = mainContent.querySelectorAll('.movie:not(#appended)');
  
  animeList.forEach((anime, index) => {
    let currentCell = movies[index];
    if (!currentCell) return;
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
          <a href="anime.php?animeId=${anime.id}">${anime.russian}</a>
        </div>
      </div>
    `;

    currentCell.insertAdjacentHTML('beforeend', animeHTML);
    currentCell.id = "appended";
    currentCell.onclick = function() {
      window.location.href = `anime.php?animeId=${anime.id}`;
    };
  });
}
