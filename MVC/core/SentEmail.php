<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';
class Email {
    public $mail;
    function __construct(){
        $this->mail = new PHPMailer(true);
    }

    function generateRandomSixDigitNumber() {
        return rand(100000, 999999);
    }

    public function Sent($email){
        try {
            //Server settings
        
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = 'cuuphan00@gmail.com';                     //SMTP username
            $this->mail->Password   = 'nxlalmmqfvnggqrl';                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $this->mail->setFrom('cuuphan00@gmail.com', 'code password');
            $this->mail->addAddress($email);     //Add a recipient
        
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
        
            //$mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = 'Here is the subject';
            $code=$this->generateRandomSixDigitNumber();
            $this->mail->Body    = 'your code is '.$code;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $this->mail->send();
            echo $code;
        } catch (Exception $e) {
            echo 0;
        }

    }
    }
// $sent= new Email();
// $sent->Sent("0cauchin0@gmail.com");


?>