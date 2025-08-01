<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {


    $correo = $_POST["Correo"] ?? '';
    $nombre = $_POST["Nombre"] ?? '';
    $apellidoP = $_POST["ApellidoP"] ?? '';
    $apellidoM = $_POST["ApellidoM"] ?? '';
    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = '202400194@upqroo.edu.mx';   //SMTP write your email
    $mail->Password   = 'kjku yvij mnay mlcr';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom( '202400194@upqroo.edu.mx', 'Control Escolar UPQROO'); // Sender Email and name
    $mail->addAddress($correo);     //Add a recipient email  
    $mail->addReplyTo('202400194@upqroo.edu.mx', 'Soporte UPQROO'); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "Inscripcion Extraescolar";   // email subject headings
    $mail->Body    = "
    <h2>Hola $nombre $apellidoP $apellidoM</h2>
    <p>Tu registro ha sido exitosamente realizado en el sistema de gestión extraescolar UPQROO.</p>
    <p>Nos alegra tenerte con nosotros.</p>
    <samll>Este es un correo automático. No respondas a este mensaje.</small>"; //email message

    // Success sent message alert
    $mail->send();

    echo "<script>
        alert('¡Inscripción realizada con éxito!');
        window.location.href = 'index.html';
    </script>";
}
?>