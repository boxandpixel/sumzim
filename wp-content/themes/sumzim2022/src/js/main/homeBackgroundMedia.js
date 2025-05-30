function backgroundContainer() {
	const backgroundContainer = document.getElementById("backgroundContainer");

	if(backgroundContainer) {
		if(window.matchMedia("(max-width: 390px)").matches) {
	
			// const imageEl = document.createElement("img");
		
			// imageEl.setAttribute("src", "https://sumzimstaging.wpengine.com/wp-content/uploads/2024/10/home-background.webp");
		
			backgroundContainer.parentElement.classList.add("hasImage");
			backgroundContainer.style.backgroundImage = "url('https://sumzim.com/wp-content/uploads/2024/11/home-background.webp')";
			backgroundContainer.style.backgroundSize = "cover";
			
			
		
		
		} else {
		
			const video = document.createElement('video');
			video.muted = true;
			video.autoplay = true;
			video.loop = true;
			video.setAttribute('playsinline', true);
			
			const source = document.createElement('source');
			source.setAttribute('src', 'https://sumzim.com/wp-content/uploads/2024/05/sz-b-roll.webm');
			
			video.appendChild(source);
			backgroundContainer.appendChild(video);
		
		}
	}


}

document.addEventListener("DOMContentLoaded", ()=> {
	backgroundContainer();
})

