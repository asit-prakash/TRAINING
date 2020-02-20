<?php
require_once('user_active.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>
      My Blogs
    </title>
  </head>
  <body>
  <div class="container">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" href="./myblogs.php">My Blogs</a>
      </li>
      <li class="nav-item">
        <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
        <a class="nav-link"  href="../logout/logout.php">Logout</a>
        <?php }else{ ?>
        <a class="nav-link"  href="../login/login.php">Login</a>
        <?php } ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./add_blogs/add_blogs.php">Add Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="../index.php">Home</a>
      </li>
      </ul>
      <?php
        require_once('../db_connection/mysql.php');
        $user_name=$_SESSION['username'];
        $ret_data="SELECT ID, TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA WHERE USERNAME='$user_name'";
        $sql=mysqli_query($conn, $ret_data);
        if($sql) {
          $count=mysqli_num_rows($sql);
          if($count>0) {
            while($data=mysqli_fetch_assoc($sql)) {
              echo "<div class='card'>";
                echo "<div class='card-img-top'>";
                  echo "<img  class='card-img' src='".'../'.$data['IMAGE']."'>";
                echo "</div>";
                echo "<div class='card-body'>";
                  echo "<div class='card-title'>";
                    echo $data['TITLE'];
                  echo "</div>";
                  $date = date('d/m/Y', $data['BLOG_DATE']);
                  echo "<div class='card-text'>";
                    echo $date;
                  echo "</div>";
                  echo "<form method='POST' action=''>";
                  echo "<input type='hidden' name='pass_id' value= '".$data['ID']."'/>";
                  echo "<button class='btn btn-primary' type='submit' name='read'>Read More</button>";
                  echo "<button class='btn btn-primary' type='submit' id='edit' name='edit'>Edit</button>";
                  echo "<button class='btn btn-primary' type='submit' name='delete'>Delete</button>";
                  echo "</form>";
                // echo "</div>";
              echo "</div>";
              echo "</div>";
            }
          }
          else {
            echo "Sorry..No blogs on this site,please come back later";
          }
        }
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
          session_start();
          $_SESSION['id']=$_POST['pass_id'];
          header("Location:../show_blog.php");
        }
        elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
          session_start();
          $_SESSION['id']=$_POST['pass_id'];
          header("Location:./edit_blogs/edit_blog.php");
        }
        elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
          $id=$_POST['pass_id'];
          $rm_blog="DELETE FROM BLOG_DATA WHERE ID='$id'";
          $del_blog=mysqli_query($conn, $rm_blog);
          if ($del_blog) {
            echo "Blog deleted successfully";
            header ('Refresh: 1; URL=./myblogs.php');
          }
        }
      ?>
    </div>
  </body>
</html>
