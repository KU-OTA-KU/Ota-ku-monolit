const popularAnimesScrollbar = document.querySelector(
  ".top-popular-animes-content"
);

let isDown = false;
let startX;
let scrollLeft;

popularAnimesScrollbar.addEventListener("mousedown", (e) => {
  isDown = true;
  startX = e.pageX - popularAnimesScrollbar.offsetLeft;
  scrollLeft = popularAnimesScrollbar.scrollLeft;
  popularAnimesScrollbar.style.cursor = "grab";
  addGrabbingCursorToChildren(popularAnimesScrollbar);
});

popularAnimesScrollbar.addEventListener("mouseleave", () => {
  isDown = false;
  popularAnimesScrollbar.style.cursor = "auto";
  setDefaultCursorToChildren(popularAnimesScrollbar);
});

popularAnimesScrollbar.addEventListener("mouseup", () => {
  isDown = false;
  popularAnimesScrollbar.style.cursor = "auto";
  setDefaultCursorToChildren(popularAnimesScrollbar);
});

popularAnimesScrollbar.addEventListener("mousemove", (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - popularAnimesScrollbar.offsetLeft;
  const walk = (x - startX) * 1;
  popularAnimesScrollbar.scrollLeft = scrollLeft - walk;
});
