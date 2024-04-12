document.addEventListener('DOMContentLoaded', function () {
    let genresScroll = new Flickity('.all-genres-list-container', {
        wrapAround: true,
        prevNextButtons: false,
        pageDots: false,
    });

    let isDragging = false;

    genresScroll.on('dragStart', function (event, pointer) {
        isDragging = true;
        document.querySelector('.all-genres-list-container').classList.add('is-dragging');
    });

    genresScroll.on('pointerUp', function () {
        setTimeout(function () {
            isDragging = false;
            document.querySelector('.all-genres-list-container').classList.remove('is-dragging');
        }, 500);
    });
});
