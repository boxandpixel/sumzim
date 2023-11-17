document.addEventListener("DOMContentLoaded", ()=> {
    const freeEstimateForm = document.getElementById("wpcf7-f4179-o1");
    const joeForm = document.getElementById("wpcf7-f4161-o1");
    const contactUsForm = document.getElementById("wpcf7-f4338-o1");
    const careerHvacForm = document.getElementById("wpcf7-f4262-o1");
    const careerPlumbingForm = document.getElementById("wpcf7-f4268-o1");
    const careerGeneralForm = document.getElementById("wpcf7-f4273-o1");
    const designYourMembership = document.getElementById("wpcf7-f28026-o1");
    const landingForm = document.getElementById("wpcf7-f27557-o1");


    if(freeEstimateForm) {
        console.log("hi free");
        // freeEstimateForm.addEventListener('wpcf7mailsent', ()=> {
        //     window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=Free%20Estimate");
        // });
    } 

    // Joe Form
    if(joeForm) {
        joeForm.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=Contact%20Joe%20Zimmerman");
        });
    }     

    // Contact Us Form
    if(contactUsForm) {
        contactUsForm.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=Contact%20Us");
        });
    }

    // HVAC Application
    if(careerHvacForm) {
        careerHvacForm.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=HVAC%20Application");
        });
    }

    // Plumber Application
    if(careerPlumbingForm) {
        careerPlumbingForm.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=Plumbing%20Application");
        });
    }

    // General Application
    if(careerGeneralForm) {
        careerGeneralForm.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=General%20Application");
        });
    }

    // Membership Design
    if(designYourMembership) {
        designYourMembership.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=Design%20Your%20Membership");
        });
    }

    // Landing Form
    if(landingForm) {
        landingForm.addEventListener('wpcf7mailsent', ()=> {
            window.location.replace("https://sumzimdev.wpengine.com/request-confirmation?form=PPC%20Landing");
        });
    }    


});   








    