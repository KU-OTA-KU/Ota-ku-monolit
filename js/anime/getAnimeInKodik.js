var kodikAddPlayers = {
    width: "100%",
    height: "100%",
    onDomReady: false,
    shikimoriID: `${currentAnime}`,
    foundCallback: function (data, link) {},
    notFoundCallback: function (data) {
        console.log("eta anime chkaa ara");
        animesNotfound()
    },
    types: "anime,anime-serial",
};

!function(e,n,t,r,a){r=e.createElement(n),a=e.getElementsByTagName(n)
    [0],r.async=!0,r.src=t,a.parentNode.insertBefore(r,a)}
(document,"script","//kodik-add.com/add-players.min.js");

async function animesNotfound() {
    let kodikSelector = document.getElementById("kodik-player");

    let noAnimeHTML = `
      <div class="kodik-anime-not-found">
        <h3>Нечего не найдено. 😔🚫</h3>
      </div>
    `;
    kodikSelector.insertAdjacentHTML('beforeend', noAnimeHTML);
}