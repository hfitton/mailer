<?php
if( !isset( $_POST['email'] ) ) {
?>
<form method="POST">
<formfield>
<legend><a href="mailto:gmail address" class="button">Email us</a></legend>
<div class="medium-12 columns">
<label for="name">Name</label>
<input id="name" name="name" type="text" placeholder="Your full name">
</div>
<div class="medium-12 columns">
<label for="email">Email</label>
<input id="email" name="email" type="email" placeholder="Your email address">
</div>
<div class="medium-12 columns">
<label for="subject">Subject</label>
<input id="subject" name="subject" type="text" placeholder="The subject of your message">
</div>
<div class="medium-12 columns">
<label for="message">Message</label>
<textarea id="message" name="message" placeholder="Your message here" rows="5"></textarea>
</div>
<div class="medium-12 columns">
<button class="button" name="send">Send</button>
</div>
</formfield>
</form>
<?php
} else {
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'http://smtp.gmail.com ';
$mail->SMTPAuth = true;
$mail->Username = 'myemail';
$mail->Password = 'mypassword';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('mygmail address');
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
?>

