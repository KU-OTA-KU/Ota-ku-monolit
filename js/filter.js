function openFilter() {
  var filter = document.querySelector(".main-filter");
  var body = document.body;

  filter.classList.toggle("filter-open");
  body.classList.toggle("no-scroll");
}
