// function backgroundContainer() {
// 	const backgroundContainer = document.getElementById("backgroundContainer");

// 	if(backgroundContainer) {
// 		if(window.matchMedia("(max-width: 390px)").matches) {
	
// 			// const imageEl = document.createElement("img");
		
// 			// imageEl.setAttribute("src", "https://sumzimstaging.wpengine.com/wp-content/uploads/2024/10/home-background.webp");
		
// 			backgroundContainer.parentElement.classList.add("hasImage");
// 			backgroundContainer.style.backgroundImage = "url('https://sumzim.com/wp-content/uploads/2024/11/home-background.webp')";
// 			backgroundContainer.style.backgroundSize = "cover";
			
			
		
		
// 		} else {
		
// 			const video = document.createElement('video');
// 			video.muted = true;
// 			video.autoplay = true;
// 			video.loop = true;
// 			video.setAttribute('playsinline', true);
			
// 			const source = document.createElement('source');
// 			source.setAttribute('src', 'https://sumzim.com/wp-content/uploads/2025/05/sz-b-roll.webm');
			
// 			video.appendChild(source);
// 			backgroundContainer.appendChild(video);
		
// 		}
// 	}


// }

// document.addEventListener("DOMContentLoaded", ()=> {
// 	backgroundContainer();
// })


function backgroundContainer() {
	const container = document.getElementById("backgroundContainer");

	if (!container) return;

	const isMobile = window.matchMedia("(max-width: 390px)").matches;

	if (isMobile) {
		// Show fallback image immediately
		container.parentElement.classList.add("hasImage");
		container.style.backgroundImage = "url('https://sumzim.com/wp-content/uploads/2024/11/home-background.webp')";
		container.style.backgroundSize = "cover";
		return;
	}

	// Delay video load until after full page load
	window.addEventListener("load", () => {
		const video = document.createElement("video");

		video.muted = true;
		video.autoplay = true;
		video.loop = true;
		video.playsInline = true;
		video.poster = "https://sumzim.com/wp-content/uploads/2024/11/home-background.webp"; // fallback poster

		video.setAttribute("preload", "none"); // Don't block rendering

		const source = document.createElement("source");
		source.src = "https://sumzim.com/wp-content/uploads/2025/05/sz-b-roll.webm";
		source.type = "video/webm";

		video.appendChild(source);
		container.appendChild(video);
	});
}

document.addEventListener("DOMContentLoaded", backgroundContainer);
