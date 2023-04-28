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
$admin_mail = "example@domain.com";//replace with the email id on which you have to recieve the mail
$sender_mail = "example@domain.com";//replace with the sender's email id
$sender_name = "your name"; //replace with the sender's name
$mail = new PHPMailer(true);
try
{
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';//your smpt server

    $mail->SMTPAuth   = true;//smtp authentication

    $mail->Username   = 'example@domain.com';//replace with your email address

    $mail->Password   = 'password';//enter the password

    $mail->SMTPSecure = 'tsl';//stmp security

    $mail->Port       = 587;//smpt port

    $mail->setFrom($sender_mail , $sender_name);//sender's email id

    $mail->Subject = $subject;//subject

    $mail->isHTML(true);//set the email to html format 

    $mail->addAddress($admin_mail);//reciever email id

    $message_1 = '<html><body>'.'<h4>Name: '.$firstname.'</h4>'.'<h4>Email: '.$email.'</h4>'.'<h4>Message: '.$message.'</h4>'.'<br><a href="tel:'.$mobile.'"><button>Call Sender</button></a>'.'</body></html>';//message 

    $mail->Body = $message_1;//body

    $mail->send(); //sends the mail

    
    $mail->addAddress($email);//another reciever's email id 

    $message_2 =  '<html><body>'.'<p>dear '.$firstname.',</p>'.'<p>thank you for contacting us</p>'.'<p>we have got you mail with the message: '.'</P>'.'<p>'.$message.'.</p>'.'<p>our team will contact you as soon as possible.</p>'.'<p>Thank you</p>'.'<p>Regards,</p>'.'<p>team <a href="https://littutorials.in/">Littutorials<a></p>'.'</body></html>';//another message

    $mail->Body = $message_2;//another body

    $mail->send();//sends the mail
    header("Location:form.html");
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>