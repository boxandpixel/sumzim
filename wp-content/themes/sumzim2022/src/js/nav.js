function mobileNavControl() {
  var navControl = document.querySelector(".header__nav-button");

  navControl.addEventListener("click", function () {
    var ariaStatus = document
      .querySelector(".header__nav-button")
      .getAttribute("aria-expanded");

    var body = document.querySelector("body");

    // var navItems = document.querySelector('#menu-primary-navigation');
    // var headerEl = document.querySelector('header.site-header');
    var headerNav = document.querySelector(".header__nav");
    // var statusMessage = document.querySelector('.header__status-message-phone-book-container');
    // var headerStatus = document.querySelector('.header__status');
    var menuIconClose = document.querySelector(
      ".header__nav-button-icon-close"
    );
    var menuIcon = document.querySelector(".header__nav-button-icon-menu");
    // var alert = document.querySelector('.alert');
	var siteHeader = document.querySelector(".site-header");
	var menuIconSpan = document.querySelector(".header__nav-button-span");
	var headerSocialIcons = document.querySelector(".header__social");

    if (ariaStatus == "true") {
      ariaStatus = "false";
      headerNav.classList.toggle("header__nav--show");
      // headerEl.classList.toggle('header--static');
      // headerNav.classList.toggle('header__nav--show');
      body.classList.toggle("body__no-overflow");
      // statusMessage.classList.toggle('header__status-message-phone-book-container--show');
      // headerStatus.classList.toggle('header__status--mobile');
      menuIconClose.classList.toggle("header__nav-button-icon-close--show");
      menuIcon.classList.toggle("header__nav-button-icon-menu--hide");
      // alert.classList.toggle('alert--hide');
	  siteHeader.classList.toggle("header__nav--open");
	  menuIconSpan.classList.toggle("header__nav-button-span--open");
	  headerSocialIcons.classList.toggle("header__social--navOpen");
    } else {
      ariaStatus = "true";
      headerNav.classList.toggle("header__nav--show");
      // headerEl.classList.toggle('header--static');
      // headerNav.classList.toggle('header__nav--show');
      body.classList.toggle("body__no-overflow");
      // statusMessage.classList.toggle('header__status-message-phone-book-container--show');
      // headerStatus.classList.toggle('header__status--mobile');
      menuIconClose.classList.toggle("header__nav-button-icon-close--show");
      menuIcon.classList.toggle("header__nav-button-icon-menu--hide");
      // alert.classList.toggle('alert--hide');
	  siteHeader.classList.toggle("header__nav--open");
	  menuIconSpan.classList.toggle("header__nav-button-span--open");
	  headerSocialIcons.classList.toggle("header__social--navOpen");
    }

    navControl.setAttribute("aria-expanded", ariaStatus);
  });

  var navParent = document.querySelectorAll(".menu-item-has-children");

  if (window.matchMedia("(max-width: 1279px")) {
    navParent.forEach(function (el) {
      var buttonDrop = document.createElement("button");
      buttonDrop.classList.add("header__nav-button-drop");
      buttonDrop.innerHTML = "Expand Menu";
      el.append(buttonDrop);

      buttonDrop.addEventListener("click", function () {
        el.querySelector(".sub-menu").classList.toggle("sub-menu--show");
        buttonDrop.classList.toggle("header__nav-button-drop--expand-less");
      });
    });
  }

  // Hide the mobile menu overlay if window is resized
  var hideMobileNav = function () {
    var body = document.querySelector("body");
    var headerEl = document.querySelector("header.site-header");
    var navControl = document.querySelector(".header__nav-button");
    var headerNav = document.querySelector(".header__nav");
    var statusMessage = document.querySelector(
      ".header__status-message-phone-book-container"
    );
    var headerStatus = document.querySelector(".header__status");
    var alert = document.querySelector(".alert");
    var menuIconClose = document.querySelector(
      ".header__nav-button-icon-close"
    );
    var menuIcon = document.querySelector(".header__nav-button-icon-menu");

    if (headerNav.classList.contains("header__nav--show")) {
      if (window.innerWidth > 1279) {
        headerNav.classList.remove("header__nav--show");
        body.classList.remove("body__no-overflow");
        headerEl.classList.remove("header--static");
        navControl.setAttribute("aria-expanded", "false");
        headerStatus.classList.remove("header__status--mobile");

        menuIconClose.classList.remove("header__nav-button-icon-close--show");
        menuIcon.classList.remove("header__nav-button-icon-menu--hide");

        if (alert) {
          alert.classList.remove("alert--hide");
        }
      }
    }
  };
  window.addEventListener("resize", hideMobileNav);
}

// document.addEventListener("DOMContentLoaded", () => {
  mobileNavControl();
// });
