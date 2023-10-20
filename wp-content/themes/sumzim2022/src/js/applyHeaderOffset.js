/** Get header height */

document.addEventListener("DOMContentLoaded", function (event) {
  const fixedHeaderHeight = document.querySelector(".site-header").clientHeight;
  const mainEl = document.getElementById("primary");

  const headerPadding = fixedHeaderHeight + 50;
  mainEl.style.padding = `${headerPadding}px 0px 0px 0px`;
});
