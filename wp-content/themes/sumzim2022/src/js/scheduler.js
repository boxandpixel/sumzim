document.addEventListener("DOMContentLoaded", () => {
  /** START OBSERVER VALIDATION */

	function scheduler() {
		var animMaintenanceOrRepair__outLeft;
		var animMaintenancehowManySystems__inLeft;
		var animMaintenancehowManySystems__outRight;
		var animMaintenanceOrRepair__inRight;
		var animHowManySystems__outLeft;

		var fieldsetNav = document.querySelector("#fieldsetNav");

		var fieldsetMaintenanceOrRepair = document.getElementById("schedulerFieldset-MaintanceOrRepair");
		var fieldsetMaintenance__howManySystems = document.getElementById("schedulerFieldset-Maintenance-howManySystems");

		var fieldsetMaintenance__hvacOrPlumbing = document.getElementById("schedulerFieldset-Maintenance-HVACOrPlumbing");

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
	
			});
	
			schedulerClose.addEventListener("click", ()=> {
	
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

						fieldsetNav.style.display = "block";

						fieldsetNav.addEventListener("click", (e)=> {
							e.preventDefault();
							fieldsetMaintenance__howManySystems.animate(fieldsetOutRight, fieldsetTiming);
							fieldsetMaintenanceOrRepair.animate(fieldsetInRight, fieldsetTiming);
							e.target.style.display = "none";
						});
					});
				}

				if(el.id == "schedulerFieldset-Maintenance__howManySystems") {
					el.addEventListener("change", (e)=> {
						animHowManySystems__outLeft = e.target.closest("fieldset").animate(fieldsetOutLeft, fieldsetTiming);
						animMaintenance__hvacORPlumbing = fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetInLeft, fieldsetTiming);

						fieldsetNav.addEventListener("click", (e)=> {
							e.preventDefault();
							fieldsetMaintenance__hvacOrPlumbing.animate(fieldsetOutRight, fieldsetTiming);
							fieldsetMaintenance__howManySystems.animate(fieldsetInRight, fieldsetTiming);
							e.target.style.display = "none";
						});						

					});
				}				
				
			  });
		}		
	}

	scheduler();

});
