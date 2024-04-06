const container = document.querySelector('.top-popular-animes-content');

let isDown = false;
let startX;
let scrollLeft;

container.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - container.offsetLeft;
  scrollLeft = container.scrollLeft;
  container.style.cursor = "grab";
  addGrabbingCursorToChildren();
});

container.addEventListener('mouseleave', () => {
  isDown = false;
  container.style.cursor = "auto";
  setDefaultCursorToChildren()
});

container.addEventListener('mouseup', () => {
  isDown = false;
  container.style.cursor = "auto";
  setDefaultCursorToChildren()
});

container.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - container.offsetLeft;
  const walk = (x - startX) * 1;
  container.scrollLeft = scrollLeft - walk;
});

function addGrabbingCursorToChildren() {
  const children = container.querySelectorAll('*');
  children.forEach(child => {
    child.style.cursor = "grabbing";
  });
}

function setDefaultCursorToChildren() {
  const children = container.querySelectorAll('*');
  children.forEach(child => {
    child.style.cursor = "pointer";
  });
}
