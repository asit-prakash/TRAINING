<!DOCTYPE html>
<html>
  <head>
    <title>
      HOMEPAGE
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="nav">
      <ul>
        <li>
          <?php 
          session_start();
          if(isset($_SESSION['username']) && isset($_SESSION['password'])){ ?>
            <a href="./logout/logout.php">Logout</a>
          <?php }else{ ?>
            <a href="./login/login.php">Login</a>
          <?php } ?>
          <a href="./my_blogs/myblogs.php">My Blogs</a>
          <a href='./my_blogs/add_blogs/add_blogs.php'>Add Blog</a>
          <a href="./index.php">Home</a>
        </li>
      </ul>
    </div>
    <div class="teaser">
      <?php
        require_once('./db_connection/mysql.php');
        $ret_data="SELECT ID,TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA";
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
              echo "<img src='".$data['IMAGE']."'>";
              
              echo "<form method='POST' action=''>";
              echo "<input type='hidden' name='pass_id' value= '".$data['ID']."'/>";
              echo "<button type='submit' name='read'>Read More</button>"; 
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
          header("Location:./show_blog.php");
        }
      ?>
    </div>
  </body>
</html>