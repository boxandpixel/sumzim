function closeAlert() {

    var alert = document.querySelector('.alert');
    var alertClose = document.querySelector('button.alert__button-close');

    if (alert || alertClose) {
        alertClose.addEventListener('click', function () {
            alert.classList.toggle('alert--hide');
        });
    }

}

closeAlert();