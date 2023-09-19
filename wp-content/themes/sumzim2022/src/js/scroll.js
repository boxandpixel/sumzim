function minimizeHeader() {
  var alertMessage = document.querySelector(".alert");
  var headerContent = document.querySelector(".header__content");
  var statusMessageTime = document.querySelector(".header__status");
  var statusMessagePhone = document.querySelector(
    ".header__status-message-phone"
  );
  var statusMessageBook = document.querySelector(
    ".header__status-message-book"
  );
  var statusMessagePhoneCall = document.querySelector(
    ".header__status-message-phone-call"
  );
  var logoLarge = document.querySelector(".header__brand-logo");
  var logoMin = document.querySelector(".header__brand-logo-min");
  var badgeYears = document.querySelector(".header__badge");
  var nav = document.querySelector(".header__nav");
  var homeSection = document.querySelector(".home__section");
  let backToTop = document.querySelector(".back-to-top");

  window.addEventListener("scroll", function () {
    if (window.pageYOffset >= 1) {
      if (headerContent) {
        headerContent.classList.add("header__content--min");
      }

      if (alertMessage) {
        alertMessage.classList.add("alert--hide");
      }

      if (statusMessageTime) {
        statusMessageTime.classList.add("header__status--hide");
      }

      if (statusMessagePhone) {
        statusMessagePhone.classList.add("header__status-message-phone--pad");
      }

      if (statusMessagePhoneCall) {
        statusMessagePhoneCall.classList.add(
          "header__status-message-phone-call--hide"
        );
      }

      if (logoLarge) {
        logoLarge.classList.add("header__brand-logo--hide");
      }

      if (logoMin) {
        logoMin.classList.add("header__brand-logo-min--show");
      }

      if (badgeYears) {
        badgeYears.classList.add("header__badge--hide");
      }

      if (nav) {
        nav.classList.add("header__nav--min");
      }

      if (statusMessageBook) {
        statusMessageBook.classList.add("header__status-message-book--hide");
      }

      if (homeSection) {
        homeSection.classList.add("home__section--scroll");
      }

      if (backToTop) {
        backToTop.classList.add("back-to-top--show");
      }
    } else if (window.pageYOffset <= 1) {
      if (headerContent) {
        headerContent.classList.remove("header__content--min");
      }

      if (alertMessage) {
        alertMessage.classList.remove("alert--hide");
      }

      if (statusMessageTime) {
        statusMessageTime.classList.remove("header__status--hide");
      }

      if (statusMessagePhone) {
        statusMessagePhone.classList.remove(
          "header__status-message-phone--pad"
        );
      }

      if (statusMessagePhoneCall) {
        statusMessagePhoneCall.classList.remove(
          "header__status-message-phone-call--hide"
        );
      }

      if (logoLarge) {
        logoLarge.classList.remove("header__brand-logo--hide");
      }

      if (logoMin) {
        logoMin.classList.remove("header__brand-logo-min--show");
      }

      if (badgeYears) {
        badgeYears.classList.remove("header__badge--hide");
      }

      if (nav) {
        nav.classList.remove("header__nav--min");
      }

      if (statusMessageBook) {
        statusMessageBook.classList.remove("header__status-message-book--hide");
      }

      if (homeSection) {
        homeSection.classList.remove("home__section--scroll");
      }
      if (backToTop) {
        backToTop.classList.remove("back-to-top--show");
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  minimizeHeader();
});
