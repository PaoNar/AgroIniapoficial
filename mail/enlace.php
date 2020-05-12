<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Librerias/PHPMailer/src/Exception.php';
require 'Librerias/PHPMailer/src/PHPMailer.php';
require 'Librerias/PHPMailer/src/SMTP.php';
session_start();
 error_reporting(0);  

include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql="SELECT correo FROM Agr_usuario WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql);
       $fila=pg_fetch_array($last);

       $correo = $fila['correo'];

      
       

$mail = new PHPMailer(true);
$mail->CharSet ="UTF-8";


try {
    $mail->isSMTP();
    $mail->SMTPDebug = 2;     
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => true,
    'allow_self_signed' => true
    )
    );                 // Enable verbose debug output
                                            // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'estefaypst20@gmail.com';                     // SMTP username
    $mail->Password   = 'juanmontalvo';                               // SMTP password
    $mail->SMTPDebug = 'TLS';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    
   
  
   

    //Recipients
   
    $mail->setFrom('estefaypst20@gmail.com', 'Paola Narvaez');
    $mail->Timeout=200;
    $mail->ClearAddresses();
    $mail->addaddress ($correo);
    $mail->ClearBCCs ();
      // Add a recipient


   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto muy importante';
    $mail->Body = '<a href="http://localhost/AgroIniap-master/mail/recuperar.php">recuperar</a>';
    $mail->AltBody = 'Asunto muy importante';



    $mail->Send();
    echo "se envio";
    } catch (Exception $e) {
    
        echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
    }
;