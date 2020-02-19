<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>
      READ BLOG
    </title>
  </head>
  <body>
    <div class="nav">
      <ul>
        <li>
          <?php 
          session_start();
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a href="../logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a href="../login/login.php">Login</a>
          <?php } ?>
          <a href="./my_blogs/myblogs.php">My Blogs</a>
          <a href='./my_blogs/add_blogs.php'>Add Blog</a>
          <a href="./index.php">Home</a>
        </li>
      </ul>
    </div>
  </body>
</html>

<?php
require_once('./db_connection/mysql.php');
$id=$_SESSION['id'];
$get_con="SELECT TITLE,CONTENT,BLOG_DATE,IMAGE FROM BLOG_DATA WHERE ID=$id";
$run=mysqli_query($conn, $get_con);
if($run) {
  $count=mysqli_num_rows($run);
  if($count>0) {
    while($content=mysqli_fetch_assoc($run)) {
      echo $content['TITLE'];
      echo $content['CONTENT'];
      $date = date('d/m/Y', $content['BLOG_DATE']);
      echo "<img src='".$content['IMAGE']."'>";
      echo $date;
    }
  }     
}
?>
