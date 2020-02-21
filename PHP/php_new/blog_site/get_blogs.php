<?php
ob_start();
require_once('./db_connection/mysql.php');
$ret_data="SELECT ID,TITLE,AUTHOR,BLOG_DATE,IMAGE FROM BLOG_DATA";
$sql=mysqli_query($conn, $ret_data);
if($sql) {
  $count=mysqli_num_rows($sql);
  if($count>0) {
    while($data=mysqli_fetch_assoc($sql)) {?>
      <html>
        <div class='card'>
          <div class='card-img-top'>
            <?php echo "<img class='card-img'  src='".$data['IMAGE']."'>"; ?>
          </div>
          <div class='card-body'>
            <div class='card-title'>
              <?php echo $data['TITLE']; ?>
            </div>
            <div class='card-text'>
              <?php echo "By: ".$data['AUTHOR']; ?>
            </div>
            <?php $date = date('d/m/Y', $data['BLOG_DATE']); ?>
            <div class='card-text'>
              <?php echo $date; ?>
            </div>
            <form method='POST' action=''>
              <?php echo "<input type='hidden' name='pass_id' value= '".$data['ID']."'/>"; ?>
              <?php echo "<button class='btn btn-primary' type='submit' name='read'>Read More</button>"; ?>
            </form>
          </div>
        </div>
      </html>
<?php 
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