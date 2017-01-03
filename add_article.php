<?php
session_start();
include_once 'dbconnect.php';
include_once 'header.php';
require_once 'htmlpurifier/library/HTMLPurifier.auto.php';



if (isset($_POST['submit'])){
$title = $con->real_escape_string($_POST['title']);
$article = $con->real_escape_string($_POST['submit_article']);
$user = $_SESSION['userSession'];

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$title = $purifier->purify($title);
$article = $purifier->purify($article);

  $insert_query = "INSERT INTO posts(user_id,title,article) VALUES('$user','$title','$article')";

  if (mysqli_query($con, $insert_query)) {
    echo "New article added successfully";
} else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
}
}
?>
<!DOCTYPE html>
<html>
<head>
 <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  
<script>

tinymce.init({forced_root_block : "",
    force_br_newlines : true,
    force_p_newlines : false,
selector:'#articlearea'});

</script>



  
</head>
<body>

<form method="post" action="add_article.php">
  &emsp;<label>Title</label>
  <input type="text" class="form-control" name="title" />
  <br><br>
  <textarea rows="15" id="articlearea" name="submit_article"></textarea>
<input type="submit" name="submit" value="Submit Article" />
</form>
 
</body>
</html>