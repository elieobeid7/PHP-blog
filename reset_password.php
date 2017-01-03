<?php
session_start();
if(isset($_SESSION['userSession'])!="")
{
	header("Location: account.php");
}

include_once 'dbconnect.php';
include_once 'index_header.php';
require 'PHPMailer/PHPMailerAutoload.php';



if (isset($_POST['submit'])){

$user_email = $_POST['email'];

$sql = $con->query("SELECT user_email FROM users WHERE user_email ='$user_email'");

if ($sql){
$row = mysqli_fetch_assoc($sql);
$email = $row['user_email'];

$pass = uniqid();
$pass = substr($pass, 7);
$sent_pass = $pass;
$pass = password_hash($pass, PASSWORD_DEFAULT);

if ($email == $user_email){

  $EditQuery = "UPDATE users SET user_pass='$pass' WHERE user_email='$email' ";

    mysqli_query($con,$EditQuery);

    if ($con->query($EditQuery) === TRUE) {

$mail = new PHPMailer;

$mail->From = "donotreply@amig.ga";
$mail->FromName = "Amig.ga";
$mail->addAddress($email);

$mail->isHTML(false);

$mail->Subject = "Reset Password";
$mail->Body = "Your Password is: " . $sent_pass;


if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}


   




}}









}








if ($user_email =! $email) {
	echo "email not found";
}







}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
<div class="signin-form">
	<div class="container">
<form class="singin-form" method="post">
	<label> Enter Your Email</label>
	<input class="form-control" type="email" name="email" />
<input type="submit" name="submit" value="Reset Password" />
</form>
</div>
</div>
</body>
</html>