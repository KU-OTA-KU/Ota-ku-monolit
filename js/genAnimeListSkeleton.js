async function generateAnimeListStekelton(count, selector) {
  let mainContent = document.querySelector(selector);

  for (let i = 0; i < count; i++) {
    let animeHTML = `
        <div class="movie" id="not-appended">
        <div class="movie-image"></div>
        <div class="movie-name">
        <div class="status">
          <div class="type"></div>
            <div class="rating"></div>
          </div>
          <div class="name"></div>
        </div>
      </div>
      `;
    mainContent.insertAdjacentHTML("beforeend", animeHTML);
  }
}

generateAnimeListStekelton(50, ".main-content");
