<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\QPHPMailer\SMTP;

require 'Librerias/PHPMailer/src/Exception.php';
require 'Librerias/PHPMailer/src/PHPMailer.php';
require 'Librerias/PHPMailer/src/SMTP.php';


session_start();
error_reporting(0); 

include '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql="SELECT correo FROM Agr_usuario WHERE ci = '$usuario'";
       $last::pg_query($conexion,$sql = TRUE);
       $fila=pg_fetch_array($last);

       $correo = $fila['correo'];
        

      
       

$mail = new PHPMailer(true);



try {
    $mail->current = $nextEntry['resource'] ?? null;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;     
    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false,
     'verify_peer_name' => false,
      'allow_self_signed' => true ));   
    $mail->current = $nextEntry['resource'] ?? null;
    $mail->CharSet ="UTF-8";
    $mail->MailerDebug = false;// Enable verbose debug output
    $mail->SMTPDebug = 1;   
    $mail->SMTPSecure = 'ssl';                                   // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'estefaypst20@gmail.com';                     // SMTP username
    $mail->Password   = 'juanmontalvo';                               // SMTP password
    $mail->SMTPDebug = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


    //Recipients
    
   
    $mail->setFrom('estefaypst20@gmail.com', 'Paola Narvaez');
    $mail->AddAddress($correo); 
      // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperacion de contraseña';
    $mail->Body = '<a href="http://localhost/OficialIniap/mail/recuperar.php">Enlace para recuperar la contraseña</a>';
    $mail->AltBody = 'Asunto muy importante';



    $mail->Send();
    echo
                                         '  <div ">
                                             <h4>
                                                Excelente, has completado con éxito!
                                             </h4>
                                             <p><h5>
                                                   
                                                   
                                                   <strong>Por favor revise su correo electrónico !</strong><h5>
                                                   
                                             </p>
                                          
                                          </div>
                                          ';
                                          
    } catch (Exception $e) {
    
        echo 'Mailer Error: ' . $mail->ErrorInfo;;
    }
;