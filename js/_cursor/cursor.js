document.addEventListener("DOMContentLoaded", function () {
  const cursor = document.querySelector(".cursorBorder");
  const cursorPoint = document.querySelector(".cursorPoint");
  const cursorSize = 20;

  document.addEventListener("mousemove", function (e) {
    const x = e.clientX;
    const y = e.clientY;

    cursor.style.transform = `translate(${x}px, ${y}px)`;
    cursorPoint.style.transform = `translate(${x}px, ${y}px)`;
  });

  document.addEventListener("mouseover", function (e) {
    const target = e.target;
    const validTags = ["a", "button", "input", "label"];
    const validClasses = [
    ];

    if (
      (validTags.includes(target.tagName.toLowerCase()) &&
        !validClasses.some((className) =>
          target.classList.contains(className)
        )) ||
      (validClasses.some((className) => target.classList.contains(className)) &&
        !validTags.includes(target.tagName.toLowerCase()))
    ) {
      cursor.classList.add("hovered");
      cursorPoint.classList.add("hovered");
    }
  });

  document.addEventListener("mouseout", function (e) {
    cursor.classList.remove("hovered");
    cursorPoint.classList.remove("hovered");
  });
});
