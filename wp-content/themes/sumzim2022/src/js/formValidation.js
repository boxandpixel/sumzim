document.addEventListener("DOMContentLoaded", () => {
  /** START OBSERVER VALIDATION */

  /** Validation: Mutation Observer on wpcf7invalid */

  // Get element to check mutation
  const wpcf7El = document.querySelector(".wpcf7-form");

  // Set observer options
  let observerOptions = {
    childList: true,
    attributes: false,
    subtree: true,
  };

  // Mutation callback function
  function callBack(mutations) {
    for (let i = 0; i < mutations.length; i++) {
      if (mutations[i].addedNodes[0].className == "wpcf7-not-valid-tip") {
        switch (mutations[i].target.dataset.name) {
          case "full-name":
            mutations[i].addedNodes[0].textContent = "Please enter your name";
            break;
          case "street-address":
            mutations[i].addedNodes[0].innerHTML =
              "Please enter your street address";
            break;
          case "email-address":
            mutations[i].addedNodes[0].innerHTML =
              "Please enter your email address";
            break;
          case "phone-number":
            mutations[i].addedNodes[0].innerHTML =
              "Please enter your phone number";
            break;
          case "membership-options":
            mutations[i].addedNodes[0].innerHTML =
              "Please choose a membership option";
            break;
          case "no-units":
            mutations[i].addedNodes[0].innerHTML =
              "Please enter the number of units";
            break;
          default:
            mutations[i].addedNodes[0].innerHTML = "Please fill out this field";
            break;
        }
      }
    }
  }

  if (wpcf7El !== null) {
    // Set observer variable
    let observer = new MutationObserver(callBack);

    // Invalid event listener to check for mutated elements
    wpcf7El.addEventListener("wpcf7invalid", () => {
      observer.observe(wpcf7El, observerOptions);
    });
  }

  /** END OBSERVER VALIDATION */
});
