function addGrabbingCursorToChildren(scrollbar) {
  console.log(scrollbar)
  const children = scrollbar.querySelectorAll("*");
  children.forEach((child) => {
    child.style.cursor = "grabbing";
  });
}

function setDefaultCursorToChildren(scrollbar) {
  const children = scrollbar.querySelectorAll("*");
  children.forEach((child) => {
    child.style.cursor = "pointer";
  });
}
