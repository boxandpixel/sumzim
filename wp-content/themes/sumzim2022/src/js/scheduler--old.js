document.addEventListener("DOMContentLoaded", () => {
  /** START OBSERVER VALIDATION */

//   function fieldsetNext(currFields, nextFields) {
// 	currFields.animateFields(fieldsetAnim, fieldsetTiming);
// 	nextFields.animateFields(fieldsetAnim, fieldsetTiming);
//   }


		var animMaintenanceOrRepair__outLeft;
		var animMaintenancehowManySystems__inLeft;
		var animMaintenancehowManySystems__outRight;
		var animMaintenanceOrRepair__inRight;
		var animHowManySystems__outLeft;
		var animMaintenance__hvacORPlumbing__inLeft;

		/** HVAC or Plumbing Animations */
		var animMaintenance__hvacORPlumbing__outLeft;
		var animMaintenance__hvac__chooseSystem__inLeft;

		/** HVAC Animations */
		var animMaintenance__hvacSystems__outLeft;
		var animMaintenance__hvacSystemDetails__inLeft;

		// var fieldsetNav = document.querySelector(".fieldsetNav");

		var fieldsetMaintenanceOrRepair = document.getElementById("schedulerFieldset-MaintanceOrRepair");
		var fieldsetMaintenance__howManySystems = document.getElementById("schedulerFieldset-Maintenance-howManySystems");
		var fieldsetMaintenance__hvacOrPlumbing = document.getElementById("schedulerFieldset-Maintenance-HVACOrPlumbing");
		var fieldsetMaintenance__hvac__systemType = document.getElementById("schedulerFieldset-Maintenance-HVAC-systemType");
		var fieldset__additionalNotes = document.getElementById("schedulerFieldset-additionalNotes");
		var fieldset__contactInfo = document.getElementById("schedulerFieldset-contactInfo");

		// var fieldMaintenance__hvac = document.getElementById("schedulerField-maintenance-HVAC");

		const fieldsets = [
			fieldsetMaintenanceOrRepair,
			fieldsetMaintenance__howManySystems,
			fieldsetMaintenance__hvacOrPlumbing,
			fieldsetMaintenance__hvac__systemType
		]
		
		const rect = fieldset__additionalNotes.getBoundingClientRect();
					
		const isInViewport = rect.top >= 0 &&
				rect.left >= 0 &&
				rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
				rect.right <= (window.innerWidth || document.documentElement.clientWidth);
		
		console.log(isInViewport);			


		const invokeScheduler = document.getElementById("invokeScheduler");
		const schedulerModal = document.getElementById("scheduler-modal");
		const schedulerContainer = document.getElementById("scheduler-container");
		const schedulerClose = document.getElementById("scheduler-close");
		const schedulerForm = document.getElementById("scheduler-form");
		const schedulerFormInputs = schedulerForm.elements;
	
		if(invokeScheduler) {
			invokeScheduler.addEventListener("click", ()=> {
				schedulerModal.style.display = "flex";
				schedulerModal.style.justifyContent = "center";
				schedulerModal.style.alignItems = "center";
				schedulerModal.classList.add("--modalOpen");
	
				setTimeout(() => {
					schedulerContainer.style.display = "flex";
					schedulerContainer.style.justifyContent = "center";
					schedulerContainer.style.alignItems = "center";		
					schedulerContainer.classList.add("--modalContainerOpen");		
				}, 200);

				/** Reset the animation */
				animMaintenanceOrRepair__outLeft.cancel();
				animMaintenancehowManySystems__inLeft.cancel();
				animMaintenancehowManySystems__outRight.cancel();
				animMaintenanceOrRepair__inRight.cancel();
				
				animHowManySystems__outLeft.cancel();
				// animMaintenance__hvacORPlumbing.cancel();
				animMaintenance__hvacORPlumbing__inLeft.animate(fieldsetOutRight, fieldsetTiming);
				animMaintenance__hvac__chooseSystem__inLeft.animate(fieldsetOutRight, fieldsetTiming);
				animMaintenance__hvacSystemDetails__inLeft.animatee(fieldsetOutRight, fieldsetTiming);
	
			});
	
			schedulerClose.addEventListener("click", ()=> {

				console.log("closing time");
	
				if(schedulerContainer.classList.contains("--modalContainerOpen")) {
					schedulerContainer.classList.remove("--modalContainerOpen");
				}
	
				schedulerContainer.classList.add("--modalContainerClose");


				animMaintenance__hvacORPlumbing__inLeft = fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetOutRight, fieldsetTiming);		
	
				setTimeout(()=> {
					if(schedulerModal.classList.contains("--modalOpen")) {
						schedulerModal.classList.remove("--modalOpen");
					}
								
					schedulerModal.classList.add("--modalClose");
					
					setTimeout(()=> {
						schedulerContainer.style.display = "none";
						schedulerContainer.classList.remove("--modalContainerClose");
						schedulerModal.classList.remove("--modalClose");
						schedulerModal.style.display = "none";
						schedulerForm.reset();
					}, 1000);
				}, 300);
	
			});
	
			document.addEventListener('click', (e) => {
				if(e.target === schedulerModal) {
					if(schedulerContainer.classList.contains("--modalContainerOpen")) {
						schedulerContainer.classList.remove("--modalContainerOpen");
					}
		
					schedulerContainer.classList.add("--modalContainerClose");
		
					setTimeout(()=> {
						if(schedulerModal.classList.contains("--modalOpen")) {
							schedulerModal.classList.remove("--modalOpen");
						}
									
						schedulerModal.classList.add("--modalClose");
						
						setTimeout(()=> {
							schedulerContainer.style.display = "none";
							schedulerContainer.classList.remove("--modalContainerClose");
							schedulerModal.classList.remove("--modalClose");
							schedulerModal.style.display = "none";
							schedulerForm.reset();
						}, 1000);
					}, 300);
				}
			});	
	
			document.addEventListener("keydown", (e)=> {
				if(e.code === "Escape") {
					if(schedulerContainer.classList.contains("--modalContainerOpen")) {
						schedulerContainer.classList.remove("--modalContainerOpen");
					}
		
					schedulerContainer.classList.add("--modalContainerClose");
		
					setTimeout(()=> {
						if(schedulerModal.classList.contains("--modalOpen")) {
							schedulerModal.classList.remove("--modalOpen");
						}
									
						schedulerModal.classList.add("--modalClose");
						
						setTimeout(()=> {
							schedulerContainer.style.display = "none";
							schedulerContainer.classList.remove("--modalContainerClose");
							schedulerModal.classList.remove("--modalClose");
							schedulerModal.style.display = "none";
							schedulerForm.reset();
						}, 1000);
					}, 300);
				}
			});
	
			const fieldsetOutLeft = [
				{ 
					position: "absolute",
					left: "0",
	
				},
				{
					position: "absolute", 
					left: "calc(100vw * -1)",
				},
			];
		

			const fieldsetInRight = [
				{ 
					position: "absolute",
					left: "calc(100vw * -1)",
	
				},
				{
					position: "absolute", 
					left: "0",
				},
			];			

			const fieldsetInLeft = [
				{ 
					position: "absolute",
					left: "calc(100vw * 2)",
	
				},
				{
					position: "absolute", 
					left: "0",
				},
			];		

			const fieldsetOutRight = [
				{ 
					position: "absolute",
					left: "0",
	
				},
				{
					position: "absolute", 
					left: "calc(100vw * 2)",
				},
			];			
			
			const fieldsetTiming = {
				duration: 500,
				easing: "ease-in-out",
				fill: "forwards"
			}
	
			const initialFieldset = document.getElementById("schedulerFieldset-MaintanceOrRepair");
	
	
			/** Interactions */
			Array.from(schedulerFormInputs).forEach((el) => {
				
				let status = 0;

				/** Maintenance */
				if(el.id == "schedulerFieldset-Maintenance") {
					el.addEventListener("click", (e)=> {
						status += 1; // Sets status needs work
						
						animMaintenanceOrRepair__outLeft = e.target.closest("fieldset").animate(fieldsetOutLeft, fieldsetTiming);
						animMaintenancehowManySystems__inLeft = fieldsetMaintenance__howManySystems.animate(fieldsetInLeft, fieldsetTiming);

						fieldsetMaintenance__howManySystems.querySelector("button").style.display = "block";

						fieldsetMaintenance__howManySystems.querySelector("button").addEventListener("click", (e)=> {
							e.preventDefault();
							fieldsetMaintenance__howManySystems.animate(fieldsetOutRight, fieldsetTiming);
							fieldsetMaintenanceOrRepair.animate(fieldsetInRight, fieldsetTiming);
							fieldsetMaintenance__howManySystems.querySelector("button").style.display = "none";
						});
					});
				}

				/** How many systems? */
				if(el.id == "schedulerFieldset-Maintenance__howManySystems") {
					el.addEventListener("change", (e)=> {
						animHowManySystems__outLeft = e.target.closest("fieldset").animate(fieldsetOutLeft, fieldsetTiming);
						animMaintenance__hvacORPlumbing__inLeft = fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetInLeft, fieldsetTiming);

						fieldsetMaintenance__hvacOrPlumbing.querySelector("button").style.display = "block";

						fieldsetMaintenance__hvacOrPlumbing.querySelector("button").addEventListener("click", (e)=> {
							e.preventDefault();
							fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetOutRight, fieldsetTiming);
							fieldsetMaintenance__howManySystems.animate(fieldsetInRight, fieldsetTiming);
							// e.target.style.display = "none";
							console.log("This");
						});						

					});
				}	
				
				/** HVAC or Plumbing */
				if(el.id == "schedulerField-maintenance-HVAC") {
					el.addEventListener("click", (e)=> {
						console.log("YO");
						animMaintenance__hvacORPlumbing__outLeft = e.target.closest("fieldset").animate(fieldsetOutLeft, fieldsetTiming);
						animMaintenance__hvac__chooseSystem__inLeft = fieldsetMaintenance__hvac__systemType.animate(fieldsetInLeft, fieldsetTiming);

						fieldsetMaintenance__hvac__systemType.querySelector("button").style.display = "block";

						fieldsetMaintenance__hvac__systemType.querySelector("button").addEventListener("click", (e)=> {
							e.preventDefault();
							console.log("Back to system type");
							fieldsetMaintenance__hvac__systemType.animate(fieldsetOutRight, fieldsetTiming);
							fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetInRight, fieldsetTiming);
						});						

					});
				}
				
				/** How many systems? */
				if(el.id == "schedulerField-maintenance-HVAC") {
					el.addEventListener("click", (e)=> {
						animMaintenance__hvacORPlumbing__outLeft = e.target.closest("fieldset").animate(fieldsetOutLeft, fieldsetTiming);
						animMaintenance__hvac__chooseSystem__inLeft = fieldsetMaintenance__hvac__systemType.animate(fieldsetInLeft, fieldsetTiming);

						fieldsetMaintenance__hvac__systemType.querySelector("button").style.display = "block";

						fieldsetMaintenance__hvac__systemType.querySelector("button").addEventListener("click", (e)=> {
							e.preventDefault();
							console.log("Back to system type");
							fieldsetMaintenance__hvac__systemType.animate(fieldsetOutRight, fieldsetTiming);
							fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetInRight, fieldsetTiming);
						});						

					});
				}
				
				if(el.classList.contains("schedulerField-maintenance-hvacSystem")) {
					el.addEventListener("click", (e)=> {
						animMaintenance__hvacSystems__outLeft = e.target.closest("fieldset").animate(fieldsetOutLeft, fieldsetTiming);
						animMaintenance__hvacSystemDetails__inLeft = fieldset__additionalNotes.animate(fieldsetInLeft, fieldsetTiming);

						fieldset__additionalNotes.querySelector("button").style.display = "block";

						/** Need to loop through each button here and perform specific operations depending on button*/

						function fieldsetNavButtons() {
							const fieldsetNavButtons = fieldset__additionalNotes.querySelectorAll("button");

							fieldsetNavButtons.forEach((el)=> {
								if(el.classList.contains("fieldsetNavBack")) {
									el.addEventListener("click", (e) => {
										e.preventDefault();
										fieldset__additionalNotes.animate(fieldsetOutRight, fieldsetTiming);
										fieldsetMaintenance__hvac__systemType.animate(fieldsetInRight, fieldsetTiming);	
									});							
								}

								if(el.classList.contains("fieldsetNavNext")) {
									el.addEventListener("click", (e) => {
										e.preventDefault();
										fieldset__additionalNotes.animate(fieldsetOutLeft, fieldsetTiming);
										fieldset__contactInfo.animate(fieldsetInLeft, fieldsetTiming);
									});
								}
							})
						}

						fieldsetNavButtons();

					});
				}

				if(el.id == "schedulerFieldset-additionalNotes") {
				

						// function fieldsetNavButtons() {
						// 	const fieldsetNavButtons = fieldset__additionalNotes.querySelectorAll("button");

						// 	fieldsetNavButtons.forEach((el)=> {
						// 		if(el.classList.contains("fieldsetNavBack")) {
						// 			el.addEventListener("click", (e) => {
						// 				e.preventDefault();
						// 				fieldset__additionalNotes.animate(fieldsetOutRight, fieldsetTiming);
						// 				fieldsetMaintenance__hvac__systemType.animate(fieldsetInRight, fieldsetTiming);	
						// 			});							
						// 		}

						// 		if(el.classList.contains("fieldsetNavNext")) {
						// 			el.addEventListener("click", (e) => {
						// 				e.preventDefault();
						// 				fieldset__additionalNotes.animate(fieldsetOutLeft, fieldsetTiming);
						// 				fieldset__contactInfo.animate(fieldsetInLeft, fieldsetTiming);
						// 			});
						// 		}
						// 	})
						// }

						// fieldsetNavButtons();

				}				
				
			});
		}		
	});
