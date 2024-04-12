document.addEventListener('DOMContentLoaded', function () {
    let popularAnimeScroll = new Flickity('.top-popular-animes-content', {
        wrapAround: true,
        prevNextButtons: false,
        pageDots: false,
    });

    let popularAnimeBlockIsDragging = false;

    popularAnimeScroll.on('dragStart', function (event, pointer) {
        popularAnimeBlockIsDragging = true;
        document.querySelector('.top-popular-animes-content').classList.add('is-dragging');
    });

    popularAnimeScroll.on('pointerUp', function () {
        setTimeout(function () {
            popularAnimeBlockIsDragging = false;
            document.querySelector('.top-popular-animes-content').classList.remove('is-dragging');
        }, 500);
    });
});
