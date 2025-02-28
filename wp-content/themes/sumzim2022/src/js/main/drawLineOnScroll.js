/** Animate line drawing on scroll */

function drawLineOnScroll() {
	let path = document.querySelector("path");
	let pathLength = path.getTotalLength();
	
	//   path.style.strokeDasharray = pathLength - pathLength;
	//   path.style.strokeDashoffset = pathLength;
	// path.style.fill = "red";
	
	// console.log(`path style is ${path.style.strokeDashoffset}`);
	
	window.addEventListener("scroll", () => {
	var scrollPercentage =
		(document.documentElement.scrollTop + document.body.scrollTop) /
		(document.documentElement.scrollHeight -
		document.documentElement.clientHeight);
	
	var drawLength = pathLength * scrollPercentage;
	
	path.style.strokeDashoffset = pathLength - drawLength;
	});
}

document.addEventListener("DOMContentLoaded", ()=> {
	drawLineOnScroll();
})


