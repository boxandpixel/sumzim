
function collapsibleAreas() {
let collapsibleTitle = document.querySelectorAll(
	".collapsible-area__title"
);

if (collapsibleTitle) {
	for (let i = 0; i < collapsibleTitle.length; i++) {
	collapsibleTitle[i].addEventListener("click", () => {
		let collapsibleDetails = collapsibleTitle[i].nextElementSibling;

		collapsibleTitle[i].classList.toggle(
		"collapsible-area__title--expanded"
		);
		collapsibleDetails.classList.toggle(
		"collapsible-area__details--expanded"
		);
	});
	}
}
}

document.addEventListener("DOMContentLoaded", () => {
	collapsibleAreas();
});


