 <?php
//come here from fridaymailer2

if( isset( $_POST['email']) ) {

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;
$mail->isSMTP();
$mail->Host = 'http://smtp.gmail.com ';
$mail->SMTPAuth = true;
$mail->Username = 'myemailaddress';
$mail->Password = 'mypassword';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('mygmail address?');        //wasn't sure about this. 
$mail->addReplyTo($_POST['email'], $_POST['name']);

$mail->isHTML(false);
$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}

