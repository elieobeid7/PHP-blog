<?php
include_once 'dbconnect.php';
include_once 'header.php';
require_once 'htmlpurifier/library/HTMLPurifier.auto.php';


$user_id = $_SESSION['userSession'];
$article_id = $_GET['id'];
// Select article from db
$sql = $con->query("SELECT * FROM posts WHERE post_id = '$article_id'");

 
if (isset($_POST['submit'])){
$title = $con->real_escape_string($_POST['title']);
$article = $con->real_escape_string($_POST['submit_article']);

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$title = $purifier->purify($title);
$article = $purifier->purify($article);	

$EditQuery = "UPDATE posts SET title='$title', article='$article' WHERE post_id='$article_id' AND user_id='$user_id' ";

    mysqli_query($con,$EditQuery);

    if ($con->query($EditQuery) === TRUE) {
   
    header("Location: account.php");


} else {
    echo "Error updating record: " . $conn->error;
}

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Post</title>
 <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
tinymce.init({forced_root_block : "",
    force_br_newlines : true,
    force_p_newlines : false,
selector:'#articlearea'});
</script>
</head>
<body>

<div class="container">
<form method="post" >
  &emsp;<label>Title</label>

<?php
  if ($sql){

  	while($row = mysqli_fetch_assoc($sql)) { 

  		$select_title = $row['title'];
  		$Select_article = $row['article'];


  echo "<input type='text' class='form-control' name='title' value='$select_title' />";
  
  echo "<br><br>";
  
  echo "<textarea rows='15' id='articlearea' name='submit_article'>$Select_article</textarea>";

}
}
?>

<input type="submit" name="submit" value="Submit Article" />
</form>
 
</div>

}
?>


</body>
</html>