document.addEventListener("DOMContentLoaded", () => {
  /** Customize phone number style */
  var phoneNumber = document.querySelector('input[type="tel"]');

  if (phoneNumber !== null) {
    phoneNumber.addEventListener("keyup", function (e) {
      if (
        e.key != "Backspace" &&
        (phoneNumber.value.length === 3 || phoneNumber.value.length === 7)
      ) {
        phoneNumber.value += "-";
      }
    });
  }
});
