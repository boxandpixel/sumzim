// document.addEventListener("gform_pre_submission", function(event, formId) {
//     console.log("submitted!");
//     if (formId === 1 || formId === 10) {
//         // Get the ZIP code from the address input (input_3.5)
//         var zipCode = document.querySelector("input[name='input_3.5']").value;

//         console.log(zipCode);
        
//         // Check if the ZIP code is populated
//         if (zipCode) {
//             // Create a new hidden field to store the ZIP code
//             var zipHiddenField = document.createElement("input");
//             zipHiddenField.setAttribute("type", "hidden");
//             zipHiddenField.setAttribute("name", "input_zip_code"); // New hidden field name
//             zipHiddenField.setAttribute("value", zipCode);

//             // Append the hidden field to the form before submission
//             event.target.appendChild(zipHiddenField);
//         }
//     }
// });
