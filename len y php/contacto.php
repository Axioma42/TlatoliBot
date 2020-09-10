<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$para = 'tlatolibot@mensa.org.mx';
$titulo = 'Contacto desde la Página';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
  
if ($_POST['submit']) 
    {
    if (mail($para, $titulo, $msjCorreo, $header)) 
        {
        echo "<script language='javascript'>
        alert('Mensaje enviado, muchas gracias.');
        window.location.href = 'https://tlatolibot.mensa.org.mx';
        </script>";
        } 
    else 
        {
        echo "<script language='javascript'>
        alert('Falló el envio');
        window.location.href = 'https://tlatolibot.mensa.org.mx';
        </script>";

        }
    }
?>