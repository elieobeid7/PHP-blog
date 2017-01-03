<?php

include_once 'dbconnect.php';
include_once 'index_header.php';

$article_query = $con->query("SELECT * FROM posts ORDER BY 'time' DESC");

if ($article_query)
{
    echo '<table class="table table-striped">';
          while($row = mysqli_fetch_assoc($article_query)) 
          {
              echo '<tr>
                  <td><h4><strong><center>
                      <a href="post.php?id='.$row['post_id'].'">'.$row['title'].'</a>
                      </center></strong></h4>
                  </td>
              </tr>';
          }
    echo '</table>';
}
?>







