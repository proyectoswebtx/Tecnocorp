<?php

$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$telefono= $_POST["telefono"];
$mensaje= $_POST["mensaje"];

$body = "nombre" . $nombre ."<br>Correo" . $correo ."<br>telefono" .$telefono ."<br>mensaje" . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail=new PHPMailer(true);

    try{
        $mail->SMTPDebug=0;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth= true;
        $mail->Username='carlosmiguelgaarcia1991@gmail.com';
        $mail->Password='Car80923616281991';
        $mail->SMTPSecure='tls';
        $mail->Port=587;

        //Recipiente
        $mail->setFrom('micorreo','$nombre');
        $mail->addAddress('Proyectoswebtx@gmail.com');

        //conten
        $mail->isHTML(true);

        $mail->Subject='envio';
        $mail->Body=$body;
        $mail->CharSet='UTF-8';
        $mail->Send();

        echo '<script>
            alert("el mensaje se envio correctamente");
            window.history.go(-1);
        </script>';


    }catch(Exception $e)
    {
        echo 'hubo un error al enviar el mensaje' , $mail-> ErrorInfo;          
    }
