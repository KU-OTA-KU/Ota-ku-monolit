async function getAnimeInKodikAndAppend(animeId) {
    var kodikAddPlayers = {
        width: "100%",
        height: "100%",
        onDomReady: false,
        shikimoriID: "1000",
        foundCallback: function (data, link) {},
        notFoundCallback: function (data) {},
        types: "anime,anime-serial",
        notExist: true
    };

    !function(e,n,t,r,a){r=e.createElement(n),a=e.getElementsByTagName(n)
        [0],r.async=!0,r.src=t,a.parentNode.insertBefore(r,a)}
    (document,"script","//kodik-add.com/add-players.min.js");
}

getAnimeInKodikAndAppend(currentAnime);