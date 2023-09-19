document.addEventListener(
  "wpcf7invalid",
  (e) => {
    let inputs = e.detail.inputs;

    const joeForm = document.getElementById("wpcf7-f4161-p28-o1");
    const freeEstimateForm = document.getElementById("wpcf7-f4179-p24-o1");
    const contactUsForm = document.getElementById("wpcf7-f4338-p40-o1");
    const careerHvacForm = document.getElementById("wpcf7-f4262-p4263-o1");
    const careerPlumbingForm = document.getElementById("wpcf7-f4268-p4269-o1");
    const careerGeneralForm = document.getElementById("wpcf7-f4273-p4274-o1");
    const startMembershipForm = document.getElementById(
      "wpcf7-f22802-p22353-o1"
    );

    if (startMembershipForm) {
      for (let i = 0; i < inputs.length; i++) {
        let phoneNumber = document.querySelector('input[name="phone-number"]');

        if (phoneNumber.value == "") {
          phoneNumber.nextElementSibling.textContent =
            "Please enter a valid phone number";
        }
      }
    }

    if (contactUsForm) {
      for (let i = 0; i < inputs.length; i++) {
        let fullName = document.querySelector('input[name="full-name"]');
        let emailAddress = document.querySelector(
          'input[name="email-address"]'
        );
        let phoneNumber = document.querySelector('input[name="phone-number"]');
        let yourMessage = document.querySelector('textarea[name="your-message');

        if (fullName.value == "") {
          fullName.nextElementSibling.textContent = "Please enter your name";
        }

        if (emailAddress.value == "") {
          emailAddress.nextElementSibling.textContent =
            "Please enter your email address";
        }

        if (phoneNumber.value == "") {
          phoneNumber.nextElementSibling.textContent =
            "Please enter your phone number";
        }

        if (yourMessage.value == "") {
          yourMessage.nextElementSibling.textContent =
            "Please enter your message";
        }
      }
    }

    if (joeForm) {
      for (let i = 0; i < inputs.length; i++) {
        let fullName = document.querySelector('input[name="full-name"]');
        let emailAddress = document.querySelector(
          'input[name="email-address"]'
        );
        let yourMessage = document.querySelector('textarea[name="your-message');

        if (fullName.value == "") {
          fullName.nextElementSibling.textContent = "Please enter your name";
        }

        if (emailAddress.value == "") {
          emailAddress.nextElementSibling.textContent =
            "Please enter your email address";
        }

        if (yourMessage.value == "") {
          yourMessage.nextElementSibling.textContent =
            "Please enter your message";
        }
      }
    }

    if (freeEstimateForm) {
      for (let i = 0; i < inputs.length; i++) {
        let fullName = document.querySelector('input[name="full-name"]');
        let emailAddress = document.querySelector(
          'input[name="email-address"]'
        );
        let phoneNumber = document.querySelector('input[name="phone-number"]');
        let streetAddress = document.querySelector(
          'input[name="street-address"]'
        );
        let city = document.querySelector('input[name="city"]');
        let state = document.querySelector('select[name="state"]');
        let reason = document.querySelector(
          'textarea[name="reason-for-appointment"]'
        );
        let contactPreference = document.querySelector(
          'input[name="contact-preference"]'
        );
        let contactPreferenceParent = document.querySelector(
          'span[aria-describedby="wpcf7-f4179-p24-o1-ve-contact-preference"]'
        );

        if (fullName.value == "") {
          fullName.nextElementSibling.textContent = "Please enter your name";
        }

        if (emailAddress.value == "") {
          emailAddress.nextElementSibling.textContent =
            "Please enter your email address";
        }

        if (phoneNumber.value == "") {
          phoneNumber.nextElementSibling.textContent =
            "Please enter your phone number";
        }

        if (streetAddress.value == "") {
          streetAddress.nextElementSibling.textContent =
            "Please enter your street address";
        }

        if (city.value == "") {
          city.nextElementSibling.textContent = "Please enter your city";
        }

        if (state.value == "" || state.value == "Your State (required)") {
          state.nextElementSibling.textContent = "Please enter your state";
        }

        if (reason.value == "") {
          reason.nextElementSibling.textContent =
            "Please enter the reason for your appointment";
        }

        if (!contactPreference.checked) {
          contactPreferenceParent.nextElementSibling.textContent =
            "Please tell us your contact preference";
        }
      }
    }

    if (careerHvacForm) {
      for (let i = 0; i < inputs.length; i++) {
        let fullName = document.querySelector('input[name="full-name"]');
        let emailAddress = document.querySelector(
          'input[name="email-address"]'
        );
        let phoneNumber = document.querySelector('input[name="phone-number"]');
        let hvacQ1 = document.querySelector('textarea[name="hvac-q1"]');
        let hvacQ2 = document.querySelector('textarea[name="hvac-q2"]');
        let hvacQ3 = document.querySelector('textarea[name="hvac-q3"]');
        let hvacQ4 = document.querySelector('textarea[name="hvac-q4"]');
        let hvacQ5 = document.querySelector('textarea[name="hvac-q5"]');
        let hvacQ6 = document.querySelector('textarea[name="hvac-q6"]');
        let hvacQ7 = document.querySelector('textarea[name="hvac-q7"]');
        let hvacQ8 = document.querySelector('textarea[name="hvac-q8"]');
        let hvacQ9 = document.querySelector('textarea[name="hvac-q9"]');
        let coverLetter = document.querySelector(
          'textarea[name="cover-letter"]'
        );
        let resume = document.querySelector('input[name="resume"]');

        if (fullName.value == "") {
          fullName.nextElementSibling.textContent = "Please enter your name";
        }

        if (emailAddress.value == "") {
          emailAddress.nextElementSibling.textContent =
            "Please enter your email address";
        }

        if (phoneNumber.value == "") {
          phoneNumber.nextElementSibling.textContent =
            "Please enter your phone number";
        }

        if (hvacQ1.value == "") {
          hvacQ1.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ2.value == "") {
          hvacQ2.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ3.value == "") {
          hvacQ3.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ4.value == "") {
          hvacQ4.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ5.value == "") {
          hvacQ5.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ6.value == "") {
          hvacQ6.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ7.value == "") {
          hvacQ7.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ8.value == "") {
          hvacQ8.nextElementSibling.textContent = "Please answer this question";
        }

        if (hvacQ9.value == "") {
          hvacQ9.nextElementSibling.textContent = "Please answer this question";
        }

        if (coverLetter.value == "") {
          coverLetter.nextElementSibling.textContent =
            "Please enter your cover letter";
        }

        if (resume.files.length == 0) {
          resume.nextElementSibling.textContent =
            "Please upload your resume file";
        }
      }
    }

    if (careerPlumbingForm) {
      for (let i = 0; i < inputs.length; i++) {
        let fullName = document.querySelector('input[name="full-name"]');
        let emailAddress = document.querySelector(
          'input[name="email-address"]'
        );
        let phoneNumber = document.querySelector('input[name="phone-number"]');
        let coverLetter = document.querySelector(
          'textarea[name="cover-letter"]'
        );
        let resume = document.querySelector('input[name="resume"]');

        if (fullName.value == "") {
          fullName.nextElementSibling.textContent = "Please enter your name";
        }

        if (emailAddress.value == "") {
          emailAddress.nextElementSibling.textContent =
            "Please enter your email address";
        }

        if (phoneNumber.value == "") {
          phoneNumber.nextElementSibling.textContent =
            "Please enter your phone number";
        }

        if (coverLetter.value == "") {
          coverLetter.nextElementSibling.textContent =
            "Please enter your cover letter";
        }

        if (resume.files.length == 0) {
          resume.nextElementSibling.textContent =
            "Please upload your resume file";
        }
      }
    }

    if (careerGeneralForm) {
      for (let i = 0; i < inputs.length; i++) {
        let fullName = document.querySelector('input[name="full-name"]');
        let emailAddress = document.querySelector(
          'input[name="email-address"]'
        );
        let phoneNumber = document.querySelector('input[name="phone-number"]');
        let position = document.querySelector(
          'select[name="general-application-position"]'
        );
        let coverLetter = document.querySelector(
          'textarea[name="cover-letter"]'
        );
        let resume = document.querySelector('input[name="resume"]');

        if (fullName.value == "") {
          fullName.nextElementSibling.textContent = "Please enter your name";
        }

        if (emailAddress.value == "") {
          emailAddress.nextElementSibling.textContent =
            "Please enter your email address";
        }

        if (phoneNumber.value == "") {
          phoneNumber.nextElementSibling.textContent =
            "Please enter your phone number";
        }

        if (position.value == "") {
          position.nextElementSibling.textContent = "Please choose a position";
        }

        if (coverLetter.value == "") {
          coverLetter.nextElementSibling.textContent =
            "Please enter your cover letter";
        }

        if (resume.files.length == 0) {
          resume.nextElementSibling.textContent =
            "Please upload your resume file";
        }
      }
    }
  },
  false
);
