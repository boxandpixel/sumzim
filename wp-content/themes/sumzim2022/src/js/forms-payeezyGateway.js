window.addEventListener("DOMContentLoaded", function () {
  /** Get Payeezy form element */
  const payeezyForm = document.querySelector("#wp_payeezy_payment_form form");

  if (!payeezyForm) {
    return;
  } else {
    payeezyForm.setAttribute("novalidate", "novalidate");

    // /** Hide first name form label */
    const xFirstName = document.querySelector("input#x_first_name");
    xFirstName.setAttribute("placeholder", "i.e. Mary");

    // /** Hide last name form label */
    const xLastName = document.querySelector("input#x_last_name");
    xLastName.setAttribute("placeholder", "i.e. Smith");

    // /** Hide street address form label */
    const xAddress = document.querySelector("input#x_address");
    xAddress.setAttribute("placeholder", "i.e. 123 Anywhere St.");

    // /** Hide street address form label */
    const xCity = document.querySelector("input#x_city");
    xCity.setAttribute("placeholder", "i.e. Atglen");

    // /** Hide zip code form label */
    const xZip = document.querySelector("input#x_zip");
    xZip.setAttribute("placeholder", "i.e. 19310");

    // /** Hide payment description label */
    const xInvoiceNum = document.querySelector("input#x_invoice_num");
    xInvoiceNum.setAttribute("placeholder", "i.e. 1234567");

    // /** Hide amount label */
    const xAmount = document.querySelector('input[name="x_amount"]');
    xAmount.setAttribute("placeholder", "i.e. 120.00");
    const xAmountLabel = document.querySelector('label[for="payeezy-amount"]');
    xAmountLabel.textContent = "Amount";
    xAmountLabel.classList.remove("payeezy-hidden");

    // Get state and country fields
    const xState = document.querySelector("select#x_state");
    const xCountry = document.querySelector("select#x_country");

    // Replace loose USD text with nothing
    // let usd = xAmountLabel.nextElementSibling.nextSibling;
    // usd.remove();

    const inputs = [
      xFirstName,
      xLastName,
      xAddress,
      xState,
      xCity,
      xZip,
      xCountry,
      xInvoiceNum,
      xAmount,
    ];

    // Loop through inputs and test changes
    for (let i = 0; i < inputs.length; i++) {
      if (inputs[i].tagName === "INPUT") {
        inputs[i].addEventListener("keyup", () => {
          if (inputs[i].nextSibling !== null) {
            inputs[i].nextSibling.remove();
          }
        });
      } else if (inputs[i].tagName == "SELECT") {
        inputs[i].addEventListener("change", () => {
          if (
            inputs[i].nextSibling !== null &&
            inputs[i].nextSibling.getAttribute("class") == "payeezy-required"
          ) {
            inputs[i].nextSibling.remove();
          }
        });
      }
    }

    // Validate form
    payeezyForm.addEventListener("submit", (e) => {
      function isValid(el) {
        return el.hasAttribute("required") && el.value == "";
      }

      if (inputs.some(isValid)) {
        e.preventDefault();

        let errorMsg = document.createElement("div");
        errorMsg.setAttribute("class", "payeezy-response-output");
        errorMsg.innerText =
          "One or more fields have an error. Please check and try again.";

        if (!payeezyForm.querySelector(".payeezy-response-output")) {
          payeezyForm.appendChild(errorMsg);
        }
      }

      for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].hasAttribute("required") && inputs[i].value == "") {
          // Indicate form is invalid
          payeezyForm.setAttribute("class", "invalid");

          // Create the error message
          let errorMsgEl = document.createElement("span");
          errorMsgEl.setAttribute("class", "payeezy-required");

          // Populate error messages with the right message
          if (inputs[i].getAttribute("id") === "x_first_name") {
            errorMsgEl.innerText = "Please enter your first name";
          } else if (inputs[i].getAttribute("id") === "x_last_name") {
            errorMsgEl.innerText = "Please enter your last name";
          } else if (inputs[i].getAttribute("id") === "x_address") {
            errorMsgEl.innerText = "Please enter your street address";
          } else if (inputs[i].getAttribute("id") === "x_city") {
            errorMsgEl.innerText = "Please enter your city";
          } else if (inputs[i].getAttribute("id") === "x_state") {
            errorMsgEl.innerText = "Please enter your state";
          } else if (inputs[i].getAttribute("id") === "x_zip") {
            errorMsgEl.innerText = "Please enter your zip code";
          } else if (inputs[i].getAttribute("id") === "x_invoice_num") {
            errorMsgEl.innerText = "Please enter payment description";
          } else if (inputs[i].getAttribute("id") === "x_country") {
            errorMsgEl.innerText = "Please enter your country";
          } else if (inputs[i].getAttribute("name") === "x_amount") {
            errorMsgEl.innerText = "Please enter your amount";
          }

          // Get input parent and add element to DOM
          const inputParent = inputs[i].parentElement;

          if (!inputParent.querySelector(".payeezy-required")) {
            inputParent.appendChild(errorMsgEl);
          }
        }
      }
    });
  }
});
