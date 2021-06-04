/*Validacion de formulario*/
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

$(document).ready(function () {
    $("#mostrar-password").click(function () {
        if ($(this).hasClass("fa-eye-slash") == true) {
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
            $("#password").attr("type", "text");
            $("#password_confirmation").attr("type", "text");
        }
        else {
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
            $("#password").attr("type", "password");
            $("#password_confirmation").attr("type", "password");

        }
    });
});


//Chart


