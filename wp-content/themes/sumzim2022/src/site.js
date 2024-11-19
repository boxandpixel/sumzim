import "./js/alert.js";
import "./js/backToTop";
import "./js/collapsibleAreas";
import "./js/forms-addressAutocomplete";
import "./js/forms-application";
import "./js/forms-payeezyGateway";
import "./js/forms-payOnlineAddressAutocomplete";
import "./js/forms-phoneNumberStyling";
import "./js/formValidation";
import "./js/geolocation";
// import "./js/geolocationPrompt";
import "./js/lazysizes.min.js";
import "./js/lazyVideo";
import "./js/nav.js";
// import "./js/payOnlineAutocomplete";
import "./js/scroll";
import "./js/time.js";
import "./js/wpcf7";
import "./js/eventButtonCallClick";
import "./js/membershipDesign";
import "./js/membershipDesignTotal.js";
// import "./js/applyHeaderOffset.js";
// import "./js/drawLineOnScroll.js";
import "./js/wpcf7submit.js";




document.addEventListener("DOMContentLoaded", () => {
	let equipmentSelections = document.querySelector(".equipment-selections-fieldset");

	if(equipmentSelections) {
		const selects = equipmentSelections.getElementsByTagName("select");

		console.log(selects);

		for (let item of selects) {
			item.addEventListener("change", ()=> {
				// console.log(itemitem.value);
				item.dataset.chosen = item.value;
				console.log(item.dataset.chosen);
			})
		}

		// selects.forEach(element => {
			
		// });
	}
})
