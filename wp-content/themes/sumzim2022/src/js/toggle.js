/** Replaces collapsibleAreas.js */

document.addEventListener("DOMContentLoaded", () => {
    console.log("test toggle");
    function toggle() {
      let toggleHeading = document.querySelectorAll(
        ".toggle-heading"
      );
  
      if (toggleHeading) {
        for (let i = 0; i < toggleHeading.length; i++) {
            toggleHeading[i].addEventListener("click", () => {
            let toggleContent = toggleHeading[i].nextElementSibling;
            let toggleParent = toggleHeading[i].parentElement;

            toggleParent.classList.toggle(
                "expand"
            );
  
            toggleHeading[i].classList.toggle(
              "expand"
            );
            toggleContent.classList.toggle(
              "expand"
            );
          });
        }
      }
    }
  
    toggle();
  });
