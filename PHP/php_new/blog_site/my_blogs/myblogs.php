<?php
require_once('user_active.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>
      My Blogs
    </title>
  </head>
  <body>
    <div class="nav">
      <ul>
        <li>
          <?php 
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a href="../logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a href="../login/login.php">Login</a>
          <?php } ?>
          <a href="./myblogs.php">My Blogs</a>
          <a href='./add_blogs/add_blogs.php'>Add Blog</a>
          <a href="../index.php">Home</a>
        </li>
      </ul>
    </div>
    <div class="teaser">
      <?php
        require_once('../db_connection/mysql.php');
        $user_name=$_SESSION['username'];
        $ret_data="SELECT ID, TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA WHERE USERNAME='$user_name'";
        $sql=mysqli_query($conn, $ret_data);
        if($sql) {
          $count=mysqli_num_rows($sql);
          if($count>0) {
            while($data=mysqli_fetch_assoc($sql)) {
              echo "<div class='blog'>";
              echo $data['TITLE'];
              echo $data['AUTHOR'];
              $date = date('d/m/Y', $data['BLOG_DATE']);
              echo $date;
              echo "<img src='".'../'.$data['IMAGE']."'>";
              
              echo "<form method='POST' action=''>";
              echo "<input type='hidden' name='pass_id' value= '".$data['ID']."'/>";
              echo "<button type='submit' name='read'>Read More</button>"; 
              echo "<button type='submit' name='edit'>Edit</button>";
              echo "<button type='submit' name='delete'>Delete</button>";
              echo "</form>";
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
