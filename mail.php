<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];
$admin_mail = "sahilpayal81@gmail.com";
$sender_mail = "sahilpayal84@gmail.com";
$sender_name = "lit tutorials";
$mail = new PHPMailer(true);
try
{
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';

    $mail->SMTPAuth   = true;

    $mail->Username   = 'sahilpayal84@gmail.com';

    $mail->Password   = 'hvzbbjcbryxbsvst';

    $mail->SMTPSecure = 'tsl';

    $mail->Port       = 587;

    $mail->setFrom($sender_mail , $sender_name);

    $mail->Subject = $subject;

    $mail->isHTML(true);

    $mail->addAddress($admin_mail);
    $mail->addAddress($email);

    $message_1 = '<html><body>'.'<h4>Name: '.$firstname.'</h4>'.'<h4>Email: '.$email.'</h4>'.'<h4>Message: '.$message.'</h4>'.'<br><a href="tel:'.$mobile.'"><button>Call Sender</button></a>'.'</body></html>';

    $message_2 =  '<html><body>'.'<p>dear '.$firstname.',</p>'.'<p>thank you for contacting us</p>'.'<p>we have got you mail with the message: '.'</P>'.'<p>'.$message.'.</p>'.'<p>our team will contact you as soon as possible.</p>'.'<p>Thank you</p>'.'<p>Regards,</p>'.'<p>team <a href="https://littutorials.in/">Littutorials<a></p>'.'</body></html>';
        
    $mail->Body = $message_1;
    $mail->send();

    $mail->Body = $message_2;
    $mail->send();
    header("Location:form.html");
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>