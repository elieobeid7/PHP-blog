<?php
session_start();
include_once 'dbconnect.php';


?>
<!DOCTYPE html>
<html>

<head>

</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
             <li><a href="account.php">Account</a></li>
             <li><a href="contact.php">Contact</a></li>
          </ul>

<?php
if(isset($_SESSION['userSession']))
{

$query = $con->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

echo "<ul class='nav navbar-nav navbar-right'>
            <li><a href='#''><span class='glyphicon glyphicon-user'></span>&nbsp;"; 

echo $userRow['user_name']; 
echo "</a></li> <li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span>&nbsp; Logout</a></li> </ul>";
          }
            ?>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">

</div>

</body>
</html>