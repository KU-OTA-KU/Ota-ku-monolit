document.addEventListener("DOMContentLoaded", function () {
  var imageLinks = [
    "https://free-png.ru/wp-content/uploads/2022/07/free-png.ru-770.png",
    "https://avatanplus.com/files/resources/original/5bb621bfcebea1663f73d567.png",
    "https://avatanplus.com/files/resources/original/5eff325e4c0e817314dcc068.png",
    "https://avatanplus.com/files/resources/original/5bd9e658581e2166cb2bc929.png",
    "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/e282f310-ab7d-4519-a888-3e339bcac12e/dafg7uw-c04ae279-87ad-46b8-834e-e4a967a25551.png/v1/fill/w_800,h_999/_original__anime_girl_render_by_lckiwi_dafg7uw-pre.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTEyNCIsInBhdGgiOiJcL2ZcL2UyODJmMzEwLWFiN2QtNDUxOS1hODg4LTNlMzM5YmNhYzEyZVwvZGFmZzd1dy1jMDRhZTI3OS04N2FkLTQ2YjgtODM0ZS1lNGE5NjdhMjU1NTEucG5nIiwid2lkdGgiOiI8PTkwMCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.R6WgPiFbsFIth5SdWcLib22nQjVUIZ-yMuvHqh4j4mw",
    "https://i.pinimg.com/originals/4d/20/62/4d206279a463dac5556f3e172b8cefbd.png",
    "https://i.pinimg.com/originals/70/bf/94/70bf94c28aefc8c7aa11a2820928b143.png",
    "https://i.pinimg.com/originals/5b/c9/61/5bc96136eb6edc4da063f856ac94f99e.png",
    "https://animethief.wordpress.com/wp-content/uploads/2014/06/2014-05-29-652191-1.png",
    "https://i.pinimg.com/originals/8d/f8/ce/8df8ced16c9be59e9256a2dbe3fd45de.png",
  ];
  var imgElement = document.querySelector(".background-sexy-tyanka");
  var randomIndex = Math.floor(Math.random() * imageLinks.length);
  var randomImageLink = imageLinks[randomIndex];

  imgElement.src = randomImageLink;
});
