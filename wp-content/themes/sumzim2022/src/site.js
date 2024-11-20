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

		// console.log(selects);

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
});

document.addEventListener("DOMContentLoaded", () => {
	const form = document.getElementById('gform_4');
	const gas_furnace = document.getElementById('input_4_15');
	const gas_furnace_watchdog = document.getElementById('input_4_24');
	const gas_boiler = document.getElementById('input_4_41');
	const oil_boiler_furnace = document.getElementById('input_4_42');
	const heat_pump_oil_furnace_backup = document.getElementById('input_4_43');
	const heat_pump_gas_furnace_backup = document.getElementById('input_4_44');
	const heat_pump_electric_furnace_backup = document.getElementById('input_4_45');
	const whole_house_humidifier = document.getElementById('input_4_46');
	const air_conditioner = document.getElementById('input_4_37');
	const air_conditioner_watchdog = document.getElementById('input_4_38');
	const dehumidifier = document.getElementById('input_4_39');
	const whole_house_electrical = document.getElementById('input_4_49');
	const backup_generator_maintenance = document.getElementById('input_4_50');
	const tankless_water_heater = document.getElementById('input_4_52');
	const water_softener = document.getElementById('input_4_53');
	const backflow_preventer = document.getElementById('input_4_54');
	const additional_water_filter = document.getElementById('input_4_55');
	const whole_house_plumbing = document.getElementById('input_4_56');
	const media_filter = document.getElementById('input_4_58');



	const next_button = document.getElementById('gform_next_button_4_8');

	console.log(gas_furnace_watchdog.value);

	if(
		gas_furnace.value == 0 &
		gas_furnace_watchdog.value == 0 &
		gas_boiler.value == 0 &
		oil_boiler_furnace.value == 0 &
		heat_pump_oil_furnace_backup.value == 0 &
		heat_pump_gas_furnace_backup.value == 0 &
		heat_pump_electric_furnace_backup.value == 0 &
		whole_house_humidifier.value == 0 &
		air_conditioner.value == 0 &
		air_conditioner_watchdog.value == 0 &
		dehumidifier.value == 0 &
		whole_house_electrical.value == 0 &
		backup_generator_maintenance.value == 0 &
		tankless_water_heater.value == 0 &
		water_softener.value == 0 &
		backflow_preventer.value == 0 &
		additional_water_filter.value == 0 &
		whole_house_plumbing.value == 0 &
		media_filter.value == 0) {
			next_button.disabled = true;
			next_button.classList.add("disabled");
	}

	form.addEventListener("change", ()=> {
		if(
			gas_furnace.value == 0 &
			gas_furnace_watchdog.value == 0 &
			gas_boiler.value == 0 &
			oil_boiler_furnace.value == 0 &
			heat_pump_oil_furnace_backup.value == 0 &
			heat_pump_gas_furnace_backup.value == 0 &
			heat_pump_electric_furnace_backup.value == 0 &
			whole_house_humidifier.value == 0 &
			air_conditioner.value == 0 &
			air_conditioner_watchdog.value == 0 &
			dehumidifier.value == 0 &
			whole_house_electrical.value == 0 &
			backup_generator_maintenance.value == 0 &
			tankless_water_heater.value == 0 &
			water_softener.value == 0 &
			backflow_preventer.value == 0 &
			additional_water_filter.value == 0 &
			whole_house_plumbing.value == 0 &
			media_filter.value == 0) {
				next_button.disabled = true;
				next_button.classList.add("disabled");
		} else {
			next_button.disabled = false;
			next_button.classList.remove("disabled");
		}
	})



	// if(monthly_total) {
	// 	console.log(monthly_total.value);
	// }  else {
	// 	console.log("no monthly total");
	// }

});

window.onbeforeunload = function () {
	window.scrollTo(0, 0);
  }
