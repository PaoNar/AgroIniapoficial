<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mail/Librerias/PHPMailer/src/Exception.php';
require '../mail/Librerias/PHPMailer/src/PHPMailer.php';
require '../mail/Librerias/PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
session_start();
//error_reporting(0);  No mostrar los errores 
 $_SESSION['usuario'];


include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql="SELECT correo, nombres, apellidos FROM Agr_usuario WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql);
       $row=pg_fetch_array($last);

       $nombres = $row['nombres'];
       $apellidos = $row['apellidos'];
       $correo = $row['correo'];
       
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPDebug = 3;     
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );                 // Enable 
    //Server settings
    $mail->SMTPDebug = false;                         // Habilita la depuración del envío
$mail->isSMTP();                                  // Indica que correo se enviará usando SMTP
$mail->Host = 'smtp.dominio.com';                 // Dirección SMTP del servidor de correo
$mail->Port = 587;                                // puerto SMTP del servidor de correo
$mail->SMTPAuth = true;                           // Habilita el uso del autenticado SMTP mediante usuario y contraseña
$mail->SMTPSecure = 'tls';                        // Tipo de cifrado que requiere el servidor
$mail->Username = 'gringo.urb@gmail.com';           // Usuario del servidor de correo
$mail->Password = 'Assassinscreed2';                   // Contraseña del servidor de correo
$mail->CharSet = 'UTF-8';                         // Codificación para los mensajes enviados
$mail->From = 'gringo.urb@gmail.com';               // Correo electrónico que estamos autenticando
$mail->FromName = 'nombre';                       // Nombre del remitente


    //Recipients
    $mail->setFrom('gringo.urb@gmail.com');
    $mail->addAddress($correo);   
    $mail->Subject = $subject;
$bodyReceived = str_replace("\n", "<br>", $bodyReceived);
$body = 'Código HTML con el cuerpo del mensaje';
$mail->msgHTML($body);                            // Crea el mensaje a partir de una cadena HTML

// Se envía el correo a la misma dirección que la envía para poder meter en CCO (BCC) todas las direcciones de envío de manera oculta para los destinatarios
$mail->addAddress('nombre@dominio.com', 'nombre');
$mail->clearBCCs();
foreach($recipients as $valor) {
    $mail->addBCC($valor['correo'], $valor['name']);
}

// Inicia una conexión con el servidor SMTP
$mail->smtpConnect(
    array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    )
);
 $mail->send();

    echo "Se ha enviado un mensaje a tu correo";
} catch (Exception $e) {
    echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
}
;