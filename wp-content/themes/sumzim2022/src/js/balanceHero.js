import balanceText from "../../../../node_modules/balance-text/balancetext.js";

window.addEventListener("DOMContentLoaded", () => {
  let headerStatus = document.querySelector(".header__status-message");

  balanceText(headerStatus, { watch: true });
});
