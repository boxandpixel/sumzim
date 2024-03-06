document.addEventListener("DOMContentLoaded", () => {
  /** START OBSERVER VALIDATION */

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
		})

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

		const fieldsetOut = [
			{ 
				position: "relative",
				left: "0"

			},
			{
				position: "relative", 
				left: "calc(100vw * -1)" 
			},
		];
		
		const fieldsetOutTiming = {
			duration: 500,
			rangeEnd: "calc(100vw * -1)"
		}

		const testFieldset = document.getElementById("schedulerFieldset-MaintanceOrRepair");


		/** Interactions */
		Array.from(schedulerFormInputs).forEach((el) => {
			
			let status = 0;
			if(el.id == "schedulerFieldset-Maintenance") {
				el.addEventListener("click", (e)=> {
					status += 1; // Sets status needs work
					// console.log(`${e.target}`);
					// console.log(el);
					// console.log(e.target);
					// testFieldset.animate(fieldsetOut, fieldsetOutTiming);
					// console.log(e.target.closest("fieldset"));
					// e.target.closest("fieldset").classList.add("--fieldsetOut");
					

					e.target.closest("fieldset").animate(fieldsetOut, fieldsetOutTiming);
					e.target.closest("fieldset").style.left = "calc(100vw * -1)";
					// console.log(newspaperSpinning);
				});
			}

			// if(el.id == "schedulerFieldset-Maintenance") {
			// 	el.addEventListener("click", (e)=> {
			// 		console.log(e.target);
			// 	})
			// }	
			
		  });
	}
});
