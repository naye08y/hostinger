<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};



require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';
require '../phpMailer/src/Exception.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //SMTP::DEBUG_OFF;  REAL                   
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'viridiana.olvera90@gmail.com';           //SMTP username
    $mail->Password   = '%voM420077305';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;    //Tuse 587 `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                 //Tuse 465 `SMTPSecure = PHPMailer::ENCRYPTION_SMTPS`
    //Recipients
    $mail->setFrom('viridiana.olvera90@gmail.com', 'Cafeteria Gabcy');
    $mail->addAddress('viridiana.olvera17@hotmail.com', 'PRUEBA DE GABCY');     //Add a recipient
   
    

    //Attachments Enviar archivos o imagenes
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                   //Set email format to HTML
    $mail->Subject = 'Detalles del pedido';
    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo = '<p>El ID  de su compra es <b>'.$id_transaccion.'</b></p>';

    $mail->Body    = ($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra';

    $mail->setLanguage('es','../phpMailer/language/phpmailer.lang-es.php');

    $mail->send();
    
} catch (Exception $e) {
    echo "Error al enviar el correo electronico de la compra: {$mail->ErrorInfo}";
  // exit;
}

?>