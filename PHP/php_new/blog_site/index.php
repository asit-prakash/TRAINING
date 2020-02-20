<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel='stylesheet' type='text/css' href='./style.css'>
    <title>
      HOMEPAGE
    </title>
  </head>
  <body>
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">Home</a>
        </li>
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
          <a class="nav-link" href="./my_blogs/myblogs.php">My Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./my_blogs/add_blogs/add_blogs.php">Add Blog</a>
        </li>
          <?php } ?>
      </ul>
      <?php
        require_once('./db_connection/mysql.php');
        $ret_data="SELECT ID,TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA";
        $sql=mysqli_query($conn, $ret_data);
        if($sql) {
          $count=mysqli_num_rows($sql);
          if($count>0) {
            while($data=mysqli_fetch_assoc($sql)) {
              echo "<div class='card' style='width:300px'>";
                echo "<div class='card-img-top' style='width:170px'>";
                  echo "<img class='card-img' src='".$data['IMAGE']."'>";
                echo "</div>";
                echo "<div class='card-body'>";
                  echo "<div class='card-title'>";
                    echo $data['TITLE'];
                  echo "</div>";
                  echo "<div class='card-text'>";
                    echo "By: ".$data['AUTHOR'];
                  echo "</div>";
                  $date = date('d/m/Y', $data['BLOG_DATE']);
                  echo "<div class='card-text'>";
                    echo $date;
                  echo "</div>";
                  echo "<form method='POST' action=''>";
                    echo "<input type='hidden' name='pass_id' value= '".$data['ID']."'/>";
                    echo "<button class='btn btn-primary' type='submit' name='read'>Read More</button>";
                  echo "</form>";
                echo "</div>";
              echo "</div>";
            }
          }
          else {
            echo "Sorry..No blogs on this site,please come back later";
          }
        }
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
          $_SESSION['id']=$_POST['pass_id'];
          header("Location:./show_blog.php");
        }
        ?>
    </div>
  </body>
</html>
