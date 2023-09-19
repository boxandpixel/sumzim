document.addEventListener("DOMContentLoaded", () => {
  const buttonCall = document.getElementById("landing_cta--call");
  if (buttonCall) {
    if (window.innerWidth <= 767) {
      buttonCall.classList.add("buttonCallClick");
    }
  }
});
