document.addEventListener("DOMContentLoaded", () => {
  const tooltip__icons = document.querySelectorAll(".tooltip__icon");

  tooltip__icons.forEach((el) => {
    el.addEventListener("click", () => {
      el.nextElementSibling.classList.remove("tooltip--hide");
      el.nextElementSibling.classList.add("tooltip--show");
      el.nextElementSibling
        .querySelector(".tooltip__close")
        .addEventListener("click", () => {
          el.nextElementSibling.classList.remove("tooltip--show");
          el.nextElementSibling.classList.add("tooltip--hide");
        });
    });
  });
});