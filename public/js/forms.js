// Forms
$(document).ready(function () {
    validateFormContacto();
});

// Form contacto
function validateFormContacto() {
    var formContacto = $('#formContacto'), btnSend = $('#envio');
    if (formContacto.length) {
        formContacto.validate({
            rules: {
                'nom': 'required',
                'ape': 'required',
                'email': { required: true, email: true },
                'asun': 'required',
                'recaptcha': { required: verifyReCaptcha }
            },
            messages: {
                'recaptcha': { required: "* Seleccione la opción NO SOY UN ROBOT" }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "registro/contacto.php", type: 'POST',
                    data: new FormData(form), cache: false, contentType: false, processData: false,
                    beforeSend: function () { toggleLoading('open'); btnSend.hide(); },
                    error: function () { toggleLoading('close'); btnSend.show(); }
                }).done(function (result) {
                    var result = result.trim();
                    if (result == 1) {
                        var tituloAlerta = "Mensaje", textoAlerta = "<p>El mensaje se ha enviado correctamente.</p>";
                        $.createAlert({
                            title: tituloAlerta, content: textoAlerta, closeButton: false, acceptButton: true, cancelButton: false,
                            onAccept: function () {
                                btnSend.show();
                                clearForm(formContacto);
                                grecaptcha.reset(recaptcha1);
                                closeAlert();
                            }
                        });
                    }
                });
            }
        });
    }
}

//Load Captcha
var recaptcha1;
var onCaptcha = function () {
    recaptcha1 = grecaptcha.render('recaptcha-div', {
        'sitekey': '6LeQaxUUAAAAAJf87niDAuJT7mCD4kbyysrOhtKr', 'size': 'normal', 'callback': reCaptchaCallback
    });
}
var reCaptchaCallback = function () {
    $('#recaptcha').valid();
}
var verifyReCaptcha = function () {
    if (grecaptcha.getResponse(recaptcha1) == '') { return true; }
    else { return false; }
}
//Reset captcha -- grecaptcha.reset(recaptcha1);

//Limpiar form
function clearForm(gForm) {
    var validator = gForm.validate();
    validator.resetForm(); gForm[0].reset();
}

//Formato general errores
$.validator.setDefaults({
    // ignore: "input[type=hidden]",
    ignore: ".ignore",
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.appendTo(element.parents("p"));
    }
});

//Mensajes generales forms
$.extend($.validator.messages, {
    required: "* Campo obligatorio.",
    remote: "* Captcha no válido.",
    email: "* Correo no válido.",
    url: "* URL no válida.",
    date: "* Fecha no válida.",
    dateISO: "* Fecha (ISO) no válida.",
    number: "* Sólo números.",
    digits: "* Sólo dígitos.",
    creditcard: "* Número de tarjeta no válido.",
    equalTo: "* Ingresa el mismo valor.",
    extension: "* Extensión no válida.",
    maxlength: $.validator.format("* Máximo {0} caracteres."),
    minlength: $.validator.format("* Mínimo {0} caracteres."),
    rangelength: $.validator.format("* Valor entre {0} y {1} caracteres."),
    range: $.validator.format("* Valor entre {0} y {1}."),
    max: $.validator.format("* Valor menor o igual a {0}."),
    min: $.validator.format("* Valor mayor o igual a {0}."),
    nifES: "* NIF no válido.",
    nieES: "* NIE no válido.",
    cifES: "* CIF no válido.",
    time12h: "* Formato de hora no válido."
});