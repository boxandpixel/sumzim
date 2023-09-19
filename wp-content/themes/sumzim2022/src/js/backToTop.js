function backToTop() {
  const backToTopLink = document.querySelector(".back-to-top");

  if (backToTopLink) {
    backToTopLink.addEventListener("click", (e) => {
      e.preventDefault;
      const href = backToTopLink.getAttribute("href");
      const offsetTop = document.querySelector(href).offsetTop;

      scroll({
        top: offsetTop,
        behavior: "smooth",
      });
    });
  }
}

backToTop();
