document.addEventListener("DOMContentLoaded", () => {
  /** START OBSERVER VALIDATION */

	const invokeScheduler = document.getElementById("invokeScheduler");
	const schedulerModal = document.getElementById("scheduler-modal");
	const schedulerClose = document.getElementById("scheduler-close");
	const schedulerForm = document.getElementById("scheduler-form");

	if(invokeScheduler) {
		invokeScheduler.addEventListener("click", ()=> {
			schedulerModal.classList.add("--active");
		})

		schedulerClose.addEventListener("click", ()=> {
			schedulerModal.classList.remove("--active");
			schedulerForm.reset();
		})
	}
});
