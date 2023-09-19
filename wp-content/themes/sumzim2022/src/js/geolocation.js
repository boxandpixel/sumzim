if ("geolocation" in navigator) {
  const street_address = document.getElementById("street-address");
  const street_address_pay = document.getElementById("x_address");

  if (street_address !== null) {
    street_address.classList.add("fetching-address");

    street_address.value = "Fetching street address...";

    navigator.geolocation.getCurrentPosition(
      (position) => {
        const lat = position.coords.latitude;
        const long = position.coords.longitude;

        const pos_endpoint = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${long}&key=${WPVars.GOOGLE_API}`;

        fetch(pos_endpoint)
          .then((response) => response.json())
          .then((data) => {
            street_address.classList.remove("fetching-address");
            street_address.classList.add("fetching-address--fetched");

            street_address.value = data["results"][0]["formatted_address"];
          });
      },
      (error) => {
        if (error.code == error.PERMISSION_DENIED) {
          street_address.value = "";
        }
      }
    );
  }
}
