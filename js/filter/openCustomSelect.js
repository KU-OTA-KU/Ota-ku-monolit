function openCustomSelect(element) {
  var selectOptions = element.nextElementSibling; // Получаем следующий элемент после кликнутого заголовка

  if (selectOptions.style.display !== 'none') {
    anime({
      targets: selectOptions,
      translateY: "10px",
      opacity: 0,
      duration: 100,
      easing: "easeInOutQuad",
      complete: function() {
        selectOptions.style.display = "none";
        console.log("Closed current select");
      },
    });
  } else {
    var allSelectOptions = document.querySelectorAll('.custom-select-options');

    allSelectOptions.forEach(function(option) {
      if (option !== selectOptions) {
        anime({
          targets: option,
          translateY: "10px",
          opacity: 0,
          duration: 100,
          easing: "easeInOutQuad",
          complete: function() {
            option.style.display = "none";
            console.log("Closed other select");
          },
        });
      }
    });

    anime({
      targets: selectOptions,
      translateY: 0,
      opacity: 1,
      duration: 100,
      easing: "easeInOutQuad",
      begin: function() {
        selectOptions.style.display = "block";
        console.log("Opened current select");
      },
    });
  }
}
