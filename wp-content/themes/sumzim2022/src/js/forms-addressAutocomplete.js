import { Loader } from "@googlemaps/js-api-loader";

function loadAPI(streetName, city, state, zip) {
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
      console.log(place);
      //   addressField.value = place.formatted_address;
      //   streetName.value = `${place.address_components[0].long_name} ${place.address_components[1].long_name}`;
      //   city.value = place.address_components[2].long_name;
      //   state.value = place.address_components[4].long_name;
      //   zip.value = place.address_components[6].long_name;

      const addressArray = place.address_components;

      // Loop through address_components array to get address data
      for (let i = 0; i < addressArray.length; i++) {
        // Get street number
        if (addressArray[i].types[0] == "street_number") {
          streetName.value = place.address_components[i].short_name;
        }
        // Get route
        if (addressArray[i].types[0] == "route") {
          streetName.value = `${streetName.value} ${place.address_components[i].long_name}`;
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
      }
    });
  });
}

window.addEventListener("DOMContentLoaded", () => {
  // Get contact form
  const contactUsForm = document.getElementById("wpcf7-f4338-o1");
  const joeForm = document.getElementById("wpcf7-f4161-o1");
  const freeEstimateForm = document.getElementById("wpcf7-f4179-o1");
  const startMembershipForm = document.getElementById("wpcf7-f23162-o1");
  const careerHvacForm = document.getElementById("wpcf7-f4262-o1");
  const careerPlumbingForm = document.getElementById("wpcf7-f4268-o1");
  const careerGeneralForm = document.getElementById("wpcf7-f4273-o1");
  const landingForm = document.getElementById("wpcf7-f27557-o1");
  const designMembershipForm = document.getElementById("wpcf7-f28026-o1");

  if (
    !contactUsForm &&
    !joeForm &&
    !freeEstimateForm &&
    !startMembershipForm &&
    !careerHvacForm &&
    !careerPlumbingForm &&
    !careerGeneralForm &&
    !landingForm &&
    !designMembershipForm
  ) {
    return;
  } else {
    // Get street address input field
    const streetAddress = document.getElementById("street-address");
    const city = document.getElementById("city");
    const state = document.getElementById("state");
    const zip = document.getElementById("zip-code");

    // Load API and update address
    loadAPI(streetAddress, city, state, zip);
  }
});
