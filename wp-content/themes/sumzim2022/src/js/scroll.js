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

  var tommysBanner = document.querySelector(".banner__tommys-electric");
  var header = document.querySelector(".site-header");

  var headerCall = document.querySelector(".header__call");
  var mobileCall = document.querySelector(".header__mobile-call");
  var headerSocial = document.querySelector(".header__social");

  var headerReviews = document.querySelector(".header-google-reviews");

  window.addEventListener("scroll", function () {
    if (window.pageYOffset >= 1) {
      if (headerContent) {
        headerContent.classList.add("header__content--min");
      }

	  if(tommysBanner) {
		tommysBanner.classList.add('--tommys--hide');
	  }

	  if(header) {
		header.classList.add('header--bannerScroll');
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

	  if(mobileCall) {
		mobileCall.classList.add("header__mobile-call--scroll");
	  }

	  if(headerCall) {
		headerCall.classList.add("header__call--scroll");
	  }

	  if(headerSocial) {
		headerSocial.classList.add("header__social--scroll");
	  }

	  if(headerReviews) {
		// headerReviews.classList.add("header-google-reviews--scroll");
		console.log("have reviews");
	  }
	  
    } else if (window.pageYOffset <= 1) {
      if (headerContent) {
        headerContent.classList.remove("header__content--min");
      }

	  if(tommysBanner) {
		tommysBanner.classList.remove('--tommys--hide');
	  }	  

	  if(header) {
		header.classList.remove('header--bannerScroll');
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
	  if(mobileCall) {
		mobileCall.classList.remove("header__mobile-call--scroll");
	  }
	  if(headerCall) {
		headerCall.classList.remove("header__call--scroll");
	  }
	  if(headerSocial) {
		headerSocial.classList.remove("header__social--scroll");
	  }
	//   if(headerReviews) {
	// 	headerReviews.classList.remove("header-google-reviews--scroll");
	// 	console.log("have reviews show");
	//   }
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  minimizeHeader();
});
