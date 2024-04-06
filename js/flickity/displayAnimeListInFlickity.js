function displayAnimeListInFlickity(animeList, selector) {
  let mainContent = document.querySelector(selector);
  let galleryCells = mainContent.querySelectorAll('.gallery-cell');

  animeList.forEach((anime, index) => {
    let currentCell = galleryCells[index];

    const genres = anime.genres.map(genre => genre.russian);
    const limitedGenres = genres.slice(0, 4);
    const genresHTML = limitedGenres.map(genre => `<a>${genre}</a>`).join('');

    let animeHTML = `
      <div class="flickity-content-gallery-block">
        <div class="gallery-cell-content">
          <div class="gallery-cell-image"><img src="${anime.poster.originalUrl}" alt="${anime.name}"></div>
          <div class="gallery-cell-info">
            <h2>${anime.russian}</h2>
            <p>Название: ${anime.japanese}</p>
            <p>Оценка: ${anime.score}<i class="fa-solid fa-star" aria-hidden="true"></i></p>
            <div class="gallery-cell-genres">${genresHTML}</div>
            <a href="${anime.url}" target="_blank">Подробнее</a>
          </div>
        </div>
      </div>
    `;
    currentCell.insertAdjacentHTML("beforeend", animeHTML);
  });
}
