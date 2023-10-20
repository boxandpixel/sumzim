/** Animate line drawing on scroll */

document.addEventListener("DOMContentLoaded", function (event) {
  let path = document.querySelector("path");
  let pathLength = path.getTotalLength();

  //   path.style.strokeDasharray = pathLength - pathLength;
  //   path.style.strokeDashoffset = pathLength;
  path.style.fill = "blue";

  console.log(`path style is ${path.style.strokeDashoffset}`);

  window.addEventListener("scroll", () => {
    console.log("you be scrollin");
    var scrollPercentage =
      (document.documentElement.scrollTop + document.body.scrollTop) /
      (document.documentElement.scrollHeight -
        document.documentElement.clientHeight);

    var drawLength = pathLength * scrollPercentage;

    path.style.strokeDashoffset = pathLength - drawLength;
  });
});
