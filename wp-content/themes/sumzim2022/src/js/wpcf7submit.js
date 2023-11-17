document.addEventListener("DOMContentLoaded", ()=> {
    const freeEstimateForm = document.getElementById("wpcf7-f4179-o1");


    if(freeEstimateForm) {

        console.log("Hello Free Estimate form");
        
        freeEstimateForm.addEventListener('wpcf7submit', (e)=> {
            console.log("submitted");
        })

        freeEstimateForm.addEventListener('wpcf7mailsent', (e)=> {
            console.log("mailed");
        })
    } 
});







    