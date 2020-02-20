<?php
  ob_start();
        require_once('./db_connection/mysql.php');
        $ret_data="SELECT ID,TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA";
        $sql=mysqli_query($conn, $ret_data);
        if($sql) {
          $count=mysqli_num_rows($sql);
          if($count>0) {
            while($data=mysqli_fetch_assoc($sql)) {
              echo "<div class='card'>";
                echo "<div class='card-img-top'>";
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
          // echo '<script type="text/javascript">';
          // echo "window.location.href='./show_blog.php';";
          // echo '</script>';
          header("Location:./show_blog.php");
          exit();
        }