document.addEventListener("DOMContentLoaded", () => {
	const memForm = document.getElementById("gform_4");

	if (memForm) {
		console.log("have form");

		memForm.addEventListener("change", ()=> {
			const tankless_water_heater = document.getElementById("input_4_52");
			const tankless_water_heater_container = document.getElementById("field_4_52");

			const water_softener = document.getElementById("input_4_53");
			const water_softener_container = document.getElementById("field_4_53");

			const backflow_preventer = document.getElementById("input_4_54");
			const backflow_preventer_container = document.getElementById("field_4_54");

			const whole_house_plumbing = document.getElementById("input_4_56");
			const whole_house_plumbing_container = document.getElementById("field_4_56");	

			const whole_house_electrical = document.getElementById("input_4_49");
			const whole_house_electrical_container = document.getElementById("field_4_49");				

			const backup_generator_maintenance = document.getElementById("input_4_50");
			const backup_generator_maintenance_container = document.getElementById("field_4_50");							
			
			/** Plumbing */
			if(
				tankless_water_heater.value > 0 ||
				water_softener.value > 0 ||
				backflow_preventer.value > 0
			) {
				console.log("checked");
				whole_house_plumbing.disabled = true;
				whole_house_plumbing_container.classList.add("disabled");
			} else {
				console.log("unchecked");
				whole_house_plumbing.disabled = false;
				whole_house_plumbing_container.classList.remove("disabled");
			}

			if(whole_house_plumbing.value > 0) {
				tankless_water_heater.disabled = true;
				tankless_water_heater.value = 0;
				tankless_water_heater_container.classList.add("disabled");

				water_softener.disabled = true;
				water_softener.value = 0;
				water_softener_container.classList.add("disabled");	
				
				backflow_preventer.disabled = true;
				backflow_preventer.value = 0;
				backflow_preventer_container.classList.add("disabled");					
			} else {
				tankless_water_heater.disabled = false;
				// tankless_water_heater.value = 0;
				tankless_water_heater_container.classList.remove("disabled");

				water_softener.disabled = false;
				// water_softener.value = 0;
				water_softener_container.classList.remove("disabled");	
				
				backflow_preventer.disabled = false;
				// backflow_preventer.value = 0;
				backflow_preventer_container.classList.remove("disabled");						
			}

			/** Electrical */
			
			if(backup_generator_maintenance.value > 0) {
				whole_house_electrical.disabled = true;
				whole_house_electrical_container.classList.add("disabled");
			} else {
				whole_house_electrical.disabled = false;
				whole_house_electrical_container.classList.remove("disabled");
			}


			if(whole_house_electrical.value > 0) {
				backup_generator_maintenance.disabled = true;
				backup_generator_maintenance.value = 0;
				backup_generator_maintenance_container.classList.add("disabled");				
			} else {
				backup_generator_maintenance.disabled = false;
				// backup_generator_maintenance.value = 0;
				backup_generator_maintenance_container.classList.remove("disabled");				
			}			

		})
	}
});
