import { Loader } from "@googlemaps/js-api-loader";
// https://www.npmjs.com/package/@googlemaps/js-api-loader

function loadAPI(streetName, city, state, zip, country) {
  // Load API
  const loader = new Loader({
    apiKey: `${WPVars.GOOGLE_API}`,
    version: "weekly",
    libraries: ["places"],
  });

  // Run loader
  loader.load().then((google) => {
    const placeInput = new google.maps.places.Autocomplete(streetName);

    placeInput.addListener("place_changed", () => {
      const place = placeInput.getPlace();
      const addressArray = place.address_components;

      // Loop through address_components array to get address data
      for (let i = 0; i < addressArray.length; i++) {
        // Get street number
        if (addressArray[i].types[0] == "street_number") {
          streetName.value = place.address_components[i].short_name;
        }
        // Get route
        if (addressArray[i].types[0] == "route") {
          streetName.value = `${streetName.value} ${place.address_components[i].short_name}`;
        }

        // Get locality
        if (addressArray[i].types[0] == "locality") {
          city.value = `${place.address_components[i].long_name}`;

          // Remove error messag if exists.
          if (city.value == null) {
            return;
          } else if (city.value !== null && city.nextSibling !== null) {
            city.nextSibling.remove();
          }
        }

        // Get state
        if (addressArray[i].types[0] == "administrative_area_level_1") {
          state.value = `${place.address_components[i].long_name}`;

          // Remove error messag if exists.
          if (state.value == null) {
            return;
          } else if (state.value !== null && state.nextSibling !== null) {
            state.nextSibling.remove();
          }
        }

        // Get zip code
        if (addressArray[i].types[0] == "postal_code") {
          zip.value = place.address_components[i].short_name;

          // Remove error messag if exists.
          if (zip.value == null) {
            return;
          } else if (zip.value !== null && zip.nextSibling !== null) {
            zip.nextSibling.remove();
          }
        }

        if (addressArray[i].types[0] == "postal_code_suffix") {
          zip.value = `${zip.value}-${place.address_components[i].short_name}`;
        }

        // Get country
        if (addressArray[i].types[0] == "country") {
          country.value = `${place.address_components[i].long_name}`;

          // Remove error messag if exists.
          if (country.value == null) {
            return;
          } else if (country.value !== null && country.nextSibling !== null) {
            country.nextSibling.remove();
          }
        }
      }
    });
  });
}

window.addEventListener("DOMContentLoaded", () => {
  // Get contact form
  const contactForm = document.getElementById("wpcf7-f4338-o1");

  // Get pay online form
  const payOnlineFormWrapper = document.getElementById(
    "wp_payeezy_payment_form"
  );

  if (payOnlineFormWrapper !== null) {
    const streetAddress = document.getElementById("x_address");
    const city = document.getElementById("x_city");
    const state = document.getElementById("x_state");
    const zip = document.getElementById("x_zip");
    const country = document.getElementById("x_country");

    // Load API and update address
    loadAPI(streetAddress, city, state, zip, country);
  }
});
