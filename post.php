<?php

include_once 'dbconnect.php';
include_once 'index_header.php';

$article_id = $_GET['id'];
$counter = 0;

// Select article from db

$sql = $con->query("SELECT * FROM posts WHERE post_id = '$article_id'");

  if ($sql){

  	while($row = mysqli_fetch_assoc($sql)) { 

  		$select_title = $row['title'];
  		$Select_article = $row['article'];
  		}}

/*$vote_sql = $con->query("SELECT * FROM votes");

  if ($vote_sql){

  	while($vote_row = mysqli_fetch_assoc($vote_sql)) { 

  		$v_id = $vote_row['vote_id'];
  		$Sv_count = $vote_row['vote_count'];
  		$v_post = $vote_row['post_id'];

  		}}*/

if(isset($_POST['downvote'])){
$counter = $counter - 1;
if ($counter>=-1){
	$downvote_query = $con->query("INSERT INTO votes(vote_count,post_id) VALUES(-1,'$post_id')");
}
	
}
 
if(isset($_POST['upvote'])){
	$counter = $counter + 1;
	
	if($counter<=1){

$insert_query = $con->query("INSERT INTO votes(vote_count,post_id) VALUES(1,'$article_id')");
	}
}



$selet_votes = $con->query("SELECT sum(vote_count) AS vote_count_sum FROM votes WHERE post_id= '$article_id'");

  if ($selet_votes){

  $row_votes = mysqli_fetch_assoc($selet_votes);
  $votes = $row_votes['vote_count_sum'];

}
else {
	$votes = "0";
}

if (empty($votes) || $votes ==0){
	$votes = "0";

}





?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<title> <?php echo $select_title; ?></title>
</head>
<body>
<div id="rating">

<?php


echo "<table>
	<tr><td><form name='upvote' method='post'>
	<span class='upvote' type='submit'> </span>
	</form></td></tr>
	<tr><td>";
echo "<div class='votes' align='center'>";
echo $votes;

echo "</div>";

echo	"</td><tr> 
<tr><td><form name='downvote' method='post'>
	<span class='downvote' type='submit'> </span>
	</form></td></tr>
</table>";

?>

</div>




<div class="container">
<p><h2><?php echo $select_title; ?></h2></p>
<?php echo $Select_article; ?>

</div>

<script type="text/javascript">
$('.upvote').click(function () {
  $(this).toggleClass('on');
});

</script>
<script type="text/javascript">
$('.downvote').click(function () {
  $(this).toggleClass('on');
});
</script>
</body>
</html>