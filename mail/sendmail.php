<?php
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class sendmail
{
    public function sendmailab($email, $title, $content)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'luonghoa121002@gmail.com';
            $mail->Password = 'ielcaiflkgpkszvs';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('luonghoa121002@gmail.com', "=?utf-8?b?".base64_encode("Quản trị viên ký túc")."?=");;
            $mail->addAddress($email, 'user');
            // $mail->addAddress('ellen@example.com');               
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   

            //Content
            $mail->isHTML(true);
            $mail->Subject = "=?utf-8?b?".base64_encode($title)."?=";
            $mail->Body    = $content;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
