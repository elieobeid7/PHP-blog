<?php

	 $DB_host = "localhost";
	 $DB_user = "root";
	 $DB_pass = "";
	 $DB_name = "final";
	 
	 $con = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($con->connect_errno)
     {
         die("ERROR : -> ".$con->connect_error);
     }

?>