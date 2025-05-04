$(document).ready(function () {
    $('#contactForm').submit(function (e) {
        e.preventDefault();

        // Obtiene los datos del formulario
        var formData = $(this).serialize();

        // Enviar datos con AJAX
        $.ajax({
            type: 'POST',
            url: 'contacto.php',
            data: formData,
            success: function (response) {
                $('#response').html(response); // Muestra la respuesta del servidor
            },
            error: function () {
                $('#response').html('Hubo un error al enviar el mensaje.');
            }
        });
    });
});









