<?php

include_once 'dbconnect.php';
include_once 'header.php';
$user_id = $_SESSION['userSession'];

$article_query = $con->query("SELECT * FROM posts WHERE user_id='$user_id'");


if ($article_query)
{
    echo '<table class="table table-striped">';
      while($row = mysqli_fetch_assoc($article_query)) { 
        echo "<form method='post' action='account.php'>";
        echo '<tr><td><h4><strong><center>
<a href="myposts.php?id='.$row['post_id'].'">'.$row['title'].'</a> </center></strong></h4> </td>';
    echo "<td>";

echo "<input type='hidden' name='hidden'  value=" . $row["post_id"].  " </td>";
            echo  "</td>";
            echo "<td>";
            echo "<input type='submit' name='delete_article' value='Delete Article' onclick='return confirmDelete()'/>";
            echo " </td>";  
            echo '</tr>';
            echo '</form>';

          }
    echo '</table>';
}


if(isset($_POST['delete_article'])) {
  $hidden = $_POST['hidden'];
    $DeleteQuery = "DELETE FROM posts WHERE 
    post_id='$hidden'";
    mysqli_query($con,$DeleteQuery);
    header("Location: account.php");
}




?>

<!DOCTYPE html>
<head><script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this article?");
}
</script></head>
<html>
<body>
<div class="container">
Add Article <a href="add_article.php">
<img border="0" alt="Add Article" src="images/add.png" width="100" height="100"> </a>

Edit Profile <a href="edit_account.php">
<img border="0" alt="Edit Profile" src="images/edit.png" width="100" height="100"> </a>

</div>

</body>
</html>