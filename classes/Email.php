<?php

namespace Classes;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email{
    protected  $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        $mail = new PHPMailer();
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = $_ENV["SMTP_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["SMTP_PORT"];
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Username = $_ENV["SMTP_USER"];
        $mail->Password = $_ENV["SMTP_PASS"];
        // $mail->Mailer = "smtp"; 

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'Uptask.com');
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en UpTask, solo debes confirmarla en el siguiente enlace</p>";
        $contenido.="<p>Presiona Aqui: <a href='https://tareas-uptask-app.herokuapp.com/confirmar?token=" . $this->token . "'> Confirmar Cuenta</a></p>";
        $contenido.= "<p>Si tu no creaste esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido.= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();          
    }

    public function enviarInstrucciones(){
        $mail = new PHPMailer();
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = $_ENV["SMTP_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["SMTP_PORT"];

        $mail->Username = $_ENV["SMTP_USER"];
        $mail->Password = $_ENV["SMTP_PASS"];
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port = 2525;
        // $mail->Mailer = "smtp"; 

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'Uptask.com');
        $mail->Subject = 'Reestablece tu Password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Parece que has olvidado tu Password, sigue el siguiente enlace para recuperarlo</p>";
        $contenido.="<p>Presiona Aqui: <a href='https://tareas-uptask-app.herokuapp.com/reestablecer?token=" . $this->token . "'> Reestablecer Password</a></p>";
        $contenido.= "<p>Si tu no solicitaste reestablecer tu contraseña, puedes ignorar este mensaje.</p>";
        $contenido.= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();

    }
}