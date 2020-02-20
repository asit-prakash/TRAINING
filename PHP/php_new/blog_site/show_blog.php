<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>
      READ BLOG
    </title>
  </head>
  <body>
  <div class="container">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <?php 
        session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <a class="nav-link"  href="./logout/logout.php">Logout</a>
        <?php }else{ ?>
        <a class="nav-link"  href="./login/login.php">Login</a>
        <?php } ?>
      </li>
      <?php 
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
      <li class="nav-item">
        <a class="nav-link " href="./my_blogs/myblogs.php">My Blogs</a>
      </li>
      <?php }?>
      <?php 
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./my_blogs/add_blogs/add_blogs.php">Add Blog</a>
      </li>
      <?php }?>
      <li class="nav-item">
        <a class="nav-link"  href="./index.php">Home</a>
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
      echo "<h1>".$content['TITLE']."</h1>";
      echo "<div class='show-img'>";
        echo "<img class='show-image' src='".$content['IMAGE']."'>";
      echo "</div>";
      echo "<div class='show-content'>";
        echo $content['CONTENT'];
      echo "</div>";
      $date = date('d/m/Y', $content['BLOG_DATE']);
      echo "<div class='show-date'>";
        echo "Last Edit: ".$date;
      echo "</div>";
      if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $author=$_SESSION['name'];
        echo "<div class='show-author'>";
          echo "By: ".$author;
        echo "</div>";
      }
    }
  }     
}
?>
