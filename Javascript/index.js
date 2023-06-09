//// footer script


window.addEventListener("scroll", function () {
    var footer = document.querySelector("footer");
    var footerPosition = footer.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;
    var elementsAboveFooter = document.querySelectorAll(".home"); // Replace with the appropriate selector for the elements above the footer

    if (footerPosition < windowHeight) {
      // Footer is visible in the viewport
      elementsAboveFooter.forEach(function (element) {
        element.style.paddingBottom = " 80px";
      });
    } else {
      // Footer is not visible in the viewport
      elementsAboveFooter.forEach(function (element) {
        element.style.paddingBottom = "0";
      });
    }
  });
