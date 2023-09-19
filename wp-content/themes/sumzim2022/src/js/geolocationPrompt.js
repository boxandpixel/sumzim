document.addEventListener("DOMContentLoaded", () => {
  if ("geolocation" in navigator) {
    const street_address = document.getElementById("street-address");

    if (street_address !== null) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const lat = position.coords.latitude;
          const long = position.coords.longitude;

          const pos_endpoint = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${long}&key=${WPVars.GOOGLE_API}`;

          fetch(pos_endpoint)
            .then((response) => response.json())
            .then((data) => {
              const is_address = document.createElement("span");
              is_address.setAttribute("id", "is-address");
              street_address.insertAdjacentElement("beforebegin", is_address);

              // Test console log
              console.log(
                `The results are ${data["results"][0]["formatted_address"]}`
              );

              is_address.innerHTML =
                "It looks like your current address is: " +
                "<span class='is-address--current'>" +
                data["results"][0]["formatted_address"] +
                "</span>. <br>Would you like to use this address? <div class='is-address__options'><span class='is_address__option is_address__option--yes'>Yes</span> <span class='is_address__option is_address__option--no'>No</span></div>";

              const is_address__yes = document.querySelector(
                ".is_address__option--yes"
              );
              const is_address__no = document.querySelector(
                ".is_address__option--no"
              );

              is_address__yes.addEventListener("click", () => {
                is_address.classList.add("--hide");
                street_address.value = data["results"][0]["formatted_address"];
              });

              is_address__no.addEventListener("click", () => {
                is_address.classList.add("--hide");
                street_address.focus();
              });

              street_address.addEventListener("keyup", () => {
                is_address.classList.add("--hide");
              });
            });
        },
        (error) => {
          if (error.code == error.PERMISSION_DENIED) {
            //
          }
        }
      );
    }
  }
});
