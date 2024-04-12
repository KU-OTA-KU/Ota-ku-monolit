document.addEventListener('DOMContentLoaded', function () {
  let topSlider = new Flickity('.flickity-inner', {
    wrapAround: true,
    prevNextButtons: false,
    pageDots: false,
    autoPlay: 5000,
  });

  let cells = document.querySelectorAll(".gallery-cell");

  topSlider.on("select", function () {
    cells.forEach(function (cell) {
      cell.classList.remove("is-selected");
    });
    cells[topSlider.selectedIndex].classList.add("is-selected");
  });

  let isPointerDown = false;

  topSlider.on("pointerDown", function () {
    isPointerDown = true;
    topSlider.stopPlayer();
  });

  topSlider.on("pointerUp", function () {
    isPointerDown = false;
    topSlider.playPlayer();
  });

  topSlider.on("dragEnd", function () {
    if (!isPointerDown) {
      topSlider.playPlayer();
    }
  });
});
