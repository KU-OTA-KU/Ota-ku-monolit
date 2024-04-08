const charactersScrollbar = document.querySelector('.characters-list-container');
console.log("wdwd")
let charactersScrollisDown = false;
let charactersScrollstartX;
let charactersScrollscrollLeft;

charactersScrollbar.addEventListener('mousedown', (e) => {
  charactersScrollisDown = true;
  charactersScrollstartX = e.pageX - charactersScrollbar.offsetLeft;
  charactersScrollscrollLeft = charactersScrollbar.scrollLeft;
  charactersScrollbar.style.cursor = "grab";

});

charactersScrollbar.addEventListener('mouseleave', () => {
  charactersScrollisDown = false;
  charactersScrollbar.style.cursor = "auto";
});

charactersScrollbar.addEventListener('mouseup', () => {
  charactersScrollisDown = false;
  charactersScrollbar.style.cursor = "auto";
});

charactersScrollbar.addEventListener('mousemove', (e) => {
  if (!charactersScrollisDown) return;
  e.preventDefault();
  const x = e.pageX - charactersScrollbar.offsetLeft;
  const walk = (x - charactersScrollstartX) * 1;
  charactersScrollbar.scrollLeft = charactersScrollscrollLeft - walk;
});
