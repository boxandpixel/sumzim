import { Loader } from "@googlemaps/js-api-loader";

window.addEventListener("DOMContentLoaded", () => {
  // Get pay online form
  const payOnlineFormWrapper = document.getElementById(
    "wp_payeezy_payment_form"
  );

  // Get street address input field
  const streetAddress = document.getElementById("x_address");

  // Make sure contact form exists on page before running code
  if (!payOnlineFormWrapper) {
    return;
  } else {
    // Script only runs on pay online page.

    // Load API
    const loader = new Loader({
      apiKey: `${WPVars.GOOGLE_API}`,
      version: "weekly",
      libraries: ["places"],
    });

    // Run loader
    loader
      .load()
      .then((google) => {
        const placeInput = new google.maps.places.Autocomplete(streetAddress);
        placeInput.addListener("place_changed", () => {
          const place = placeInput.getPlace();
          streetAddress.value = place.formatted_address;
        });
      })
      .catch((e) => {
        // Run an error handler if unable to load
      });
  }
});
