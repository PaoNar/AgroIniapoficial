<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\QPHPMailer\SMTP;

require 'Librerias/PHPMailer/src/Exception.php';
require 'Librerias/PHPMailer/src/PHPMailer.php';
require 'Librerias/PHPMailer/src/SMTP.php';
session_start();
error_reporting(0);  

include_once '../Conexion/conexion2.php';
$conexion=conexion();

        // $sql="SELECT correo FROM Agr_usuario WHERE correo = '$correo'";
        // $last=pg_query($conexion,$sql);
        // $row=pg_fetch_array($last);
        // $correo = $row['correo'];

       if(trim($_POST['correo']) != ""){
          
          $correo2 = strtolower(htmlentities($_POST["correo"], ENT_QUOTES));

          //  $sql="SELECT correo FROM Agr_usuario WHERE correo = '$correo2'";
          // $last=pg_query($conexion,$sql);
          // $row=pg_fetch_array($last);
          // $correo = $row['correo'];

          $result = pg_query('SELECT correo FROM agr_usuario WHERE correo =\''.$correo2.'\'');
          if($row = pg_fetch_array($result)){
            if($row["correo"] == $correo2){
             $_SESSION['correo']= $correo2;

              $mail = new PHPMailer(true);
              try {
                 
                  $mail->isSMTP();
                  $mail->SMTPDebug = 2;     
                  $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false,
                  'verify_peer_name' => false,
                    'allow_self_signed' => true ));   
                  
                  $mail->CharSet ="UTF-8";
                  $mail->MailerDebug = false;// Enable verbose debug output
                  $mail->SMTPDebug = 1;   
                  $mail->SMTPSecure = 'ssl';                                   // Send using 
                  $mail->Host = 'smtp.gmail.com';                  // Set the SMTP server to 
                  $mail->SMTPAuth   = true;                                   // Enable SMTP 
                  $mail->Username   = 'estefaypst20@gmail.com';                     // SMTP 
                  $mail->Password   = 'juanmontalvo';                               // SMTP 
                  $mail->SMTPDebug = PHPMailer::ENCRYPTION_SMTPS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                  $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                  $mail->setFrom('estefaypst20@gmail.com', 'Paola Narvaez');
                  $mail->AddAddress( $correo2); 
                    // Add a recipient

                  // Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = 'Asunto muy importante';
                  $mail->Body = '<a href="http://localhost/OficialIniap/mail/recuperar.php">Enlace para su nueva contraseña</a>';
                  $mail->AltBody = 'Asunto muy importante';



                  $mail->Send();
                  echo '  <br><br>
                                        <style>
                                            img {
                                              
                                              opacity: 0.8;
                                              height: 100%;
                                              width: 100%;
                                              position:absolute;
                                            }

                                            h4{
                                              position:absolute;
                                              font-size:20px;
                                              top:25%:
                                              left:50%;
                                              right:50%;
                                            }

                                            

                                          </style>

                                          <body>
                                          <img src="../img/logo2.jpg" >
                                          <div class="col-md-12">
                                              <h4  >
                                                  Excelente, has completado el registro con éxito!
                                                  <p>Haz <a href="../login2/login.php">clic aqui para volver al formulario</a></p>
                                              </h4>
                                             
                                              
                                            </div>
                                          </body>' ;
                
              } catch (Exception $e) {
                  
                      echo 'Mailer Error: ' . $mail->ErrorInfo;
                      echo "<p>Haz <a href='../login2/login.php'>clic para volver al formulario</a></p>";
              }
            
            }else{
            echo 'mail incorrecto';
            }
          }else{
            echo 'Usuario no existente en la base de datos';
          }
          pg_free_result($result);
          }else{
          echo 'Debe especificar un mail';
          };
          

;