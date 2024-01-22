function changeImagePath() {
  var logo = document.getElementById("logo");
  var windowWidth = window.innerWidth;
  var changeSize = 768;
  if (windowWidth <= changeSize) {
    logo.src = "./assets/images/fav-icon.png";
  } else {
    logo.src = "./assets/images/animeCo.png";
  }
}

window.onload = changeImagePath;
window.onresize = changeImagePath;
