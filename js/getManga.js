document.querySelectorAll(".search-input-fa").forEach(function (input) {
  input.addEventListener("input", function (event) {
    var query = event.target.value;
    performSearch(query);
  });
});

function performSearch(query) {
  console.log("Sending request for query:", query);
  if (!query.trim()) {
    document
      .querySelectorAll(".search-results")
      .forEach(function (resultContainer) {
        resultContainer.innerHTML = "";
        resultContainer.style.display = "none";
      });
    return;
  }

  fetch("../inc/getManga.php?q=" + query)
    .then((response) => response.json())
    .then((data) => {
      console.log("Received data:", data);
      displayResults(data);
    })
    .catch((error) => console.error("Error:", error));
}

function displayResults(results) {
  console.log("Displaying results:", results);

  var searchResults = document.querySelectorAll(".search-results");

  Array.from(searchResults).forEach(function (resultContainer) {
    resultContainer.innerHTML = "";

    if (results.length > 0) {
      results.forEach(function (result) {
        var animeBlock = document.createElement("div");
        animeBlock.innerHTML =
          "<h3>" + result.name + "</h3><p>" + result.content + "</p>";

        resultContainer.appendChild(animeBlock);
      });
      resultContainer.style.display = "block";
    } else {
      resultContainer.style.display = "none";
    }
  });
}

function searchAnime() {
  console.log("Form submitted");
  return false;
}
