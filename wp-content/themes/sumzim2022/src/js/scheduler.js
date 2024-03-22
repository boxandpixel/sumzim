document.addEventListener("DOMContentLoaded", () => {

		const invokeScheduler = document.getElementById("invokeScheduler");
		const schedulerModal = document.getElementById("scheduler-modal");
		const schedulerContainer = document.getElementById("scheduler-container");
		const schedulerClose = document.getElementById("scheduler-close");
		const schedulerForm = document.getElementById("scheduler-form");
		const schedulerFormInputs = schedulerForm.elements;

		/** Define animations */

		

		const fieldsetInit = [
			{ 
				position: "absolute",
				left: "calc(100vw * 2)",

			},
			{
				position: "absolute", 
				left: "0",
			},
		];

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
				opacity: "0",

			},
			{
				position: "absolute", 
				left: "0",
				opacity: "1",
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

		const fieldsetReset = [
			{ 
				position: "absolute",
				left: "0",
				opacity: "1"

			},
			{
				position: "absolute", 
				left: "0",
				opacity: "0",
			},
			{
				position: "absolute", 
				left: "calc(100vw * 2)",
				opacity: "1",
			}
		];		
		
		const fieldsetResetTiming = {
			duration: 500,
			easing: "ease-in-out",
			fill: "forwards"
		}	
			
		
		/** Define initial fieldset */
		const schedulerFieldset__maintenanceOrRepair = document.getElementById("schedulerFieldset--maintenanceOrRepair");
		
		
		function navigateBack(currentFieldset, previousFieldset) {
			
			currentFieldset.querySelector("button.fieldsetNav--back").addEventListener("click", (e)=> {
				console.log("back triggered");
				e.preventDefault();
				currentFieldset.animate(fieldsetOutRight, fieldsetTiming);
				previousFieldset.animate(fieldsetInRight, fieldsetTiming);

				/** Reset previous fields - see if this can be done another way to keep selections */
				const previousFields = previousFieldset.querySelectorAll("input, select, checkbox, textarea");

				previousFields.forEach((field) => {
					field.value = "";
					field.checked = false;
				})
				

				/** Reset the current fieldset after the duration of the animation */
				setTimeout(() => {
					currentFieldset = '';
				}, 500);				
			});

		};

		function navigateNext(currentFieldset, nextFieldset) {
			console.log("triggered");
			currentFieldset.querySelector("button.fieldsetNav--next").addEventListener("click", (e)=> {
				e.preventDefault();
				currentFieldset.animate(fieldsetOutLeft, fieldsetTiming);
				nextFieldset.animate(fieldsetInLeft, fieldsetTiming);

				/** Reset the current fieldset after the duration of the animation */
				setTimeout(() => {
					currentFieldset = '';
				}, 500);	
			});
		
		}


		/** Define fieldsets */

		/** --Maintenance fieldsets */
		const schedulerFieldset__maintenance__howManySystems = document.getElementById("schedulerFieldset--maintenance--howManySystems");
		const schedulerFieldset__maintenance__hvacOrPlumbing = document.getElementById("schedulerFieldset--maintenance--hvacOrPlumbing");
		const schedulerFieldset__maintenance__hvacSystems = document.getElementById("schedulerFieldset--maintenance--hvacSystems");
		const schedulerFieldset__maintenance__plumbingSystems = document.getElementById("schedulerFieldset--maintenance--plumbingSystems");
		
		/** --Plumbing fieldsets */
		const schedulerFieldset__repair__haveMembership = document.getElementById("schedulerFieldset--repair--haveMembership") 
		
		/** --Universal fieldsets */
		const schedulerFieldset__additionalNotes = document.getElementById("schedulerFieldset--additionalNotes");
		const schedulerFieldset__contactInfo = document.getElementById("schedulerFieldset--contactInfo");
		const schedulerFieldset__chooseDate = document.getElementById("schedulerFieldset--chooseDate");

		const fieldsets = [
			schedulerFieldset__maintenanceOrRepair,
			schedulerFieldset__maintenance__howManySystems,
			schedulerFieldset__repair__haveMembership,
			schedulerFieldset__maintenance__hvacOrPlumbing,
			schedulerFieldset__maintenance__hvacSystems,
			schedulerFieldset__maintenance__plumbingSystems,
			schedulerFieldset__additionalNotes,
			schedulerFieldset__contactInfo,
			schedulerFieldset__chooseDate
		]
	
		if(invokeScheduler) {
						
			/** Invoke Scheduler  */
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
					
					setTimeout(() => {
						schedulerFieldset__maintenanceOrRepair.animate(fieldsetInit, fieldsetTiming);
					})
				}, 200);
				
			});
	
			/** Close modal when clicking X icon */
			schedulerClose.addEventListener("click", ()=> {
				
				/** Reset all fieldsets after closeout */
				fieldsets.forEach((fieldset) => {

					fieldset.querySelectorAll("input, select, checkbox, textarea").value = "";
					fieldset.style.display = "none";

					setTimeout(() => {
						fieldset.animate(fieldsetReset, fieldsetResetTiming);
						fieldset.style.display = "flex";
					}, 500)
				})

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
	
			});

			/** Close modal when clicking anywhere outside schedule container */
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
	
			/** Close modal when using escape key */
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

			let options = {
				root: document.querySelector("#schedule-container"),
				rootMargin: "0px",
				threshold: 1.0,
			};




			let callback = (entries) => {
				entries.forEach((entry) => {
					if (entry.intersectionRatio > 0) {

						console.log(`The ${entry.target.id} fieldset is in view`);
						const rect = document.getElementById("schedulerFieldset--maintenance--hvacSystems").getBoundingClientRect();
						console.log(rect.top, rect.right, rect.bottom, rect.left)

						/** Maintenance or Repair */
						if(entry.target.id == "schedulerFieldset--maintenanceOrRepair") {


							/** Disable next/previous buttons */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});

							/** Determine selected radio and animate accordingly */
							function getSelected() {
								for(i = 0; i < getInputs.length; i++) {
									if(getInputs[i].checked) {

										/** Define current and next fieldset vars */
										let currentFieldset = getInputs[i].closest("fieldset");
										let nextFieldset = document.getElementById(getInputs[i].getAttribute('data-next'));

										/** animate fieldsets */
										currentFieldset.animate(fieldsetOutLeft, fieldsetTiming);
										nextFieldset.animate(fieldsetInLeft, fieldsetTiming);

										/** Reset the current fieldset after the duration of the animation */
										setTimeout(() => {
											currentFieldset = '';
										}, 500);										
									}
								}
							}

							/** Invoke selected animation */
							buttonNext.addEventListener("click", (e)=> {
								e.preventDefault();
								getSelected();
							});
						}

						/** Maintenance: How Many Systems */
						if(entry.target.id == "schedulerFieldset--maintenance--howManySystems") {
							console.log(`${entry.target.id} in view`);

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});

							navigateNext(entry.target, schedulerFieldset__maintenance__hvacOrPlumbing);
							navigateBack(entry.target, schedulerFieldset__maintenanceOrRepair);
							
						}

						/** Maintenance: HVAC or Plumbing */
						if(entry.target.id == "schedulerFieldset--maintenance--hvacOrPlumbing") {
							console.log(`${entry.target.id}: HVAC or Plumbing in view`);
							/** Copy of Maintenance or Plumbing */

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});

							/** Determine selected radio and animate accordingly */
							function getSelected() {
								for(i = 0; i < getInputs.length; i++) {
									if(getInputs[i].checked) {

										// console.log(`${getInputs[i].id} is selected`);
										/** Define current and next fieldset vars */
										let currentFieldset = getInputs[i].closest("fieldset");
										let nextFieldset = document.getElementById(getInputs[i].getAttribute('data-next'));
										
										/** animate fieldsets */
										currentFieldset.animate(fieldsetOutLeft, fieldsetTiming);
										nextFieldset.animate(fieldsetInLeft, fieldsetTiming);

										/** Reset the current fieldset after the duration of the animation */
										setTimeout(() => {
											currentFieldset = '';
										}, 500);										
									}
								}
							}

							/** Invoke selected animation */
							buttonNext.addEventListener("click", (e)=> {
								e.preventDefault();
								getSelected();
							});							

							/** Navigate next is handled by above code */
							navigateBack(entry.target, schedulerFieldset__maintenance__howManySystems);

						}						

						/** Maintenance: HVAC Systems */
						if(entry.target.id == "schedulerFieldset--maintenance--hvacSystems") {

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});							

							navigateNext(entry.target, schedulerFieldset__additionalNotes);
							navigateBack(entry.target, schedulerFieldset__maintenance__hvacOrPlumbing);
						}
						
						/** Maintenance: Plumbing Systems */
						if(entry.target.id == "schedulerFieldset--maintenance--plumbingSystems") {

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});							

							navigateNext(entry.target, schedulerFieldset__additionalNotes);
							navigateBack(entry.target, schedulerFieldset__maintenance__hvacOrPlumbing);
						}	
						
						/** BEGIN REPAIR DEFs */
						
						/** Repair: Do you have a membership */
						if(entry.target.id == "schedulerFieldset--repair--haveMembership") {

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});							

							navigateNext(entry.target, schedulerFieldset__maintenance__howManySystems);
							navigateBack(entry.target, schedulerFieldset__maintenanceOrRepair);
							
						}	
						
						/** BEGIN UNIVERSAL DEFs */

						/** Additional Info */
						if(entry.target.id == "schedulerFieldset--additionalNotes") {

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});							

							navigateNext(entry.target, schedulerFieldset__contactInfo);
							navigateBack(entry.target, schedulerFieldset__maintenance__hvacOrPlumbing);

							/** Should we go back to hvac or plumbing or back to hvac or plumbing? */
						}	
						
						/** Contact Info */
						if(entry.target.id == "schedulerFieldset--contactInfo") {

							/** Get Next Button */
							const buttonNext = entry.target.querySelector("button.fieldsetNav--next");

							/** Get radio inputs */
							const getInputs = entry.target.querySelectorAll("input, select, checkbox, textarea");
							
							/** Enable the next/previous buttons after radio change */
							getInputs.forEach((input) => {
								input.addEventListener("change", () => {
									/** Remove the disabled attribute */
									buttonNext.removeAttribute("disabled");	
								
								});
							});							

							navigateNext(entry.target, schedulerFieldset__chooseDate);
							navigateBack(entry.target, schedulerFieldset__additionalNotes);

						}	
						
						/** Choose Date */
						if(entry.target.id == "schedulerFieldset--chooseDate") {

							// navigateNext(entry.target, schedulerFieldset__chooseDate);
							navigateBack(entry.target, schedulerFieldset__additionalNotes);

						}							
					} 

				});
			  };
			  			  
				
			/** Create new observer for each fieldset */
			let observer = new IntersectionObserver(callback, options);
			// let observer__maintenance__howManySystems = new IntersectionObserver(callback__howManySystems, options);
			// let observer__repair__haveMembership = new IntersectionObserver(callback__haveMembership, options);

			/** Observe each fieldset */
			fieldsets.forEach((fieldset) => {
				observer.observe(fieldset);
			})
			// observer.observe(schedulerFieldset__maintenanceOrRepair);
			// observer__maintenance__howManySystems.observe(schedulerFieldset__maintenance__howManySystems);
			// observer__repair__haveMembership.observe(schedulerFieldset__repair__haveMembership);

		}		
	});
