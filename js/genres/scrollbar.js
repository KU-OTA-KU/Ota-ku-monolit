const genresScrollbar = document.querySelector('.all-genres-list-container');
console.log("wdwd")
let genresScrollisDown = false;
let genresScrollstartX;
let genresScrollscrollLeft;

genresScrollbar.addEventListener('mousedown', (e) => {
  genresScrollisDown = true;
  genresScrollstartX = e.pageX - genresScrollbar.offsetLeft;
  genresScrollscrollLeft = genresScrollbar.scrollLeft;
  genresScrollbar.style.cursor = "grab";
  addGrabbingCursorToChildren(genresScrollbar);
});

genresScrollbar.addEventListener('mouseleave', () => {
  genresScrollisDown = false;
  genresScrollbar.style.cursor = "auto";
  setDefaultCursorToChildren(genresScrollbar)
});

genresScrollbar.addEventListener('mouseup', () => {
  genresScrollisDown = false;
  genresScrollbar.style.cursor = "auto";
  setDefaultCursorToChildren(genresScrollbar)
});

genresScrollbar.addEventListener('mousemove', (e) => {
  if (!genresScrollisDown) return;
  e.preventDefault();
  const x = e.pageX - genresScrollbar.offsetLeft;
  const walk = (x - genresScrollstartX) * 1;
  genresScrollbar.scrollLeft = genresScrollscrollLeft - walk;
});
