<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Envío de correo en local
require("includes/phpmailer/Exception.php");
require("includes/phpmailer/PHPMailer.php");
require("includes/phpmailer/SMTP.php");

//Envío de correo desde un hosting
// require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

//echo $nombre . " " . $telefono . " " . $correo . " " . $mensaje;

if (empty($nombre) ||  empty($telefono) || empty($correo) || empty($mensaje)) {
  $respuesta = 'incorrecto';
  echo $respuesta;
} else {
  enviarCorreo();
}

function enviarCorreo() {
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->IsHTML(true);
  $mail->CharSet = "utf-8";
  $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
  $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
  $mail->Port = 587; // TLS only
  $mail->SMTPSecure = 'tls'; // ssl is deprecated
  $mail->SMTPAuth = true;


  $mail->Username = 'tucorreo@gmail.com'; // email
  $mail->Password = 'tucontraseña'; // password


  $mail->setFrom($_POST['correo'], $_POST['nombre']); // From email and name
  $mail->addAddress('johannpando@gmail.com', 'Johann Pando'); // to email and name
  $mail->Subject = 'Consulta cliente';
  //$mail->msgHTML($mensaje); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
  $mensajeHtml = nl2br($_POST['mensaje']);
  $mail->Body = "
  <html>

    <body>

    <h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>
    <p>Informacion enviada por el usuario de la web:</p>
    <p>Nombre: " . $_POST['nombre'] ." </p>
    <p>Correo: " . $_POST['correo'] ." </p>
    <p>Teléfono: " . $_POST['telefono'] ." </p>
    <p>Asunto: Consulta Cliente</p>
    <p>Mensaje: " . $_POST['mensaje'] ." </p>

    </body>

  </html>

  <br />"; // Texto del email en formato HTML
  $mail->AltBody = "{$_POST['mensaje']} \n\n "; // Texto sin formato HTML
  // FIN - VALORES A MODIFICAR //

  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );
  if(!$mail->send()){
      echo "Mailer Error: " . $mail->ErrorInfo;
      //echo "incorrecto";
  }else{
      echo "correcto";
  }

}
