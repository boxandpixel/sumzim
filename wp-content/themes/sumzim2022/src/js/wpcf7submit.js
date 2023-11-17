document.addEventListener("DOMContentLoaded", ()=> {
    const freeEstimateForm = document.getElementById("wpcf7-f4179-o1");


    if(freeEstimateForm) {
        freeEstimateForm.addEventListener('wpcf7submit', (e)=> {
            console.log("submitted");
        })

        freeEstimateForm.addEventListener('wpcf7mailsent', (e)=> {
            console.log("mailed");
        })
    } 
});







    