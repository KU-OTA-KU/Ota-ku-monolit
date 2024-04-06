function openCustomSelect(element) {
  var selectOptions = element.querySelector('.custom-select-options');

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
    var allSelects = document.querySelectorAll('.custom-select');

    allSelects.forEach(function(select) {
      let otherSelectOptions = select.querySelector('.custom-select-options');
      if (otherSelectOptions.style.display !== 'none' && select !== element) {
        anime({
          targets: otherSelectOptions,
          translateY: "10px",
          opacity: 0,
          duration: 100,
          easing: "easeInOutQuad",
          complete: function() {
            otherSelectOptions.style.display = "none";
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
