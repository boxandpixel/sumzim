/**
 * Lazy CSS background images.
 *
 * Browsers fetch a background-image as soon as its element renders, even far
 * below the fold. Elements with data-lazy-bg="<url>" get the background set
 * only when they come within 300px of the viewport.
 */

function lazyBackgrounds() {
	const elements = document.querySelectorAll("[data-lazy-bg]");

	if (!elements.length) {
		return;
	}

	const apply = (el) => {
		el.style.backgroundImage = 'url("' + el.dataset.lazyBg.replace(/"/g, "%22") + '")';
		el.removeAttribute("data-lazy-bg");
	};

	if (!("IntersectionObserver" in window)) {
		elements.forEach(apply);
		return;
	}

	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				apply(entry.target);
				observer.unobserve(entry.target);
			}
		});
	}, { rootMargin: "300px 0px" });

	elements.forEach((el) => observer.observe(el));
}

document.addEventListener("DOMContentLoaded", () => {
	lazyBackgrounds();
});
