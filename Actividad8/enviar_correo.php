<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $correo = $_POST['email'];


    $mensaje = "Hola $nombre,\n\nGracias por registrarte. Tu cuenta ha sido creada exitosamente.\n\nSaludos,\nEquipo de soporte.";


    $headers = "From: no-reply@tusitio.com";

    if (mail($correo, "Confirmación de Registro", $mensaje, $headers)) {
        echo "El correo de confirmación se ha enviado a $correo";
    } else {
        echo "Error al enviar el correo de confirmación.";
    }
} else {
    echo "Método no permitido.";
}
?>
