window.addEventListener("DOMContentLoaded", function () {
    const referenceQuestion = document.querySelectorAll('input[name="reference-question"]');
    const referenceName = document.querySelector('span.wpcf7-form-control-wrap[data-name="reference-name"]');

    if (referenceQuestion) {
        for (let i = 0; i < referenceQuestion.length; i++) {

            referenceQuestion[i].addEventListener('change', () => {
                if (referenceQuestion[i].value == "No") {
                    // referenceQuestion[i].checked = true;
                    referenceName.classList.remove('reference-name--show');
                } else if (referenceQuestion[i].value == "Yes") {
                    referenceName.classList.add('reference-name--show');
                }
            });

        }
    }
});