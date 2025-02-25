function minimizeGoogleReview() {

  var headerGoogleReviews = document.querySelector(".header-google-reviews");

  console.log(headerGoogleReviews);

  window.addEventListener("scroll", function () {
    if (window.scrollY >= 1) {
		
		if(headerGoogleReviews) {
			console.log("reviews be scrollin'");
		}
	  
    } else if (window.scrollY <= 1) {

		if(headerGoogleReviews) {
			console.log("reviews be done scrollin'");
		}
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
 minimizeGoogleReview();
});
