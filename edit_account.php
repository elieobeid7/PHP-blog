<?php

include_once 'dbconnect.php';
include_once 'header.php';
require_once 'htmlpurifier/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

	

$user_id = $_SESSION['userSession'];

if (isset($_POST['submit_username'])){
	$username = $con->real_escape_string(trim($_POST['username']));
	$username = $purifier->purify($username);

    $EditQuery = $con->query("UPDATE users SET user_name='$username' WHERE user_id='$user_id'");

    mysqli_query($con,$EditQuery);

    if ($con->query($EditQuery) === TRUE) {
   
 echo "Username changed successfully";


} else {
    echo "Error updating username " . $conn->error;
}
}

if (isset($_POST['submit_email'])){

	
    $email = $con->real_escape_string(trim($_POST['email']));
	$email = $purifier->purify($email);

    $EditQuery = $con->query ("UPDATE users SET user_email='$email' WHERE user_id='$user_id'");

    mysqli_query($con,$EditQuery);

    if ($con->query($EditQuery) === TRUE) {
   
 echo "Email changed successfully";


} else {
    echo "Error updating email " . $conn->error;
}

}

if (isset($_POST['submit_password'])){

   $password = $con->real_escape_string(trim($_POST['password']));
	$password = $purifier->purify($password);
	$password = password_hash($password, PASSWORD_DEFAULT);

    $EditQuery = $con->query("UPDATE users SET user_pass='$password' WHERE user_id='$user_id'");

    mysqli_query($con,$EditQuery);

    if ($con->query($EditQuery) === TRUE) {
   
 echo "Password changed successfully";


} else {
    echo "Error updating Password " . $conn->error;
}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">

<form method="post">
<label>Change Username</label>
<input type="text" name="username" />
<input type="submit" name="submit_username" value="Change Username" />	
</form>

<br> <br>


<form method="post">
<label>Change Email</label>
<input type="email" name="email" />
<input type="submit" name="submit_email" value="Change Email" />
</form>

<br> <br>

<form method="post">
<label>Change Password</label>
<input type="password" name="password" />
<input type="submit" name="submit_password" value="Change Password" />	
</form>

</div>
</body>
</html>