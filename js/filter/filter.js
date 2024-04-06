function openFilter() {
  let filterBox = document.querySelector(".main-filter");
  let body = document.body;
  anime({
    targets: filterBox,
    right: ["-100%", 0],
    opacity: [0, 1],
    duration: 300,
    easing: "easeInOutExpo",
    begin: function () {
      console.log("Animation started => open filter <=");
      body.style.overflow = "hidden";
      filterBox.style.display = "block";
    },
  });
}

function closeFilter() {
  let filterBox = document.querySelector(".main-filter");
  let body = document.body;
  anime({
    targets: filterBox,
    right: [0, "-100"],
    opacity: [1 , 0],
    duration: 300,
    easing: "easeInOutExpo",
    complete: function () {
      console.log("Animation Started =>  close filter <=");
      body.style.overflow = "auto";
      filterBox.style.display = "none";
    },
  });
}
