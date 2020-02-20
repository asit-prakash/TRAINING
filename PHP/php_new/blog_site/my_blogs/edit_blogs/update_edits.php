<?php
require_once('../../db_connection/mysql.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $upd_title=$_POST['title'];
  $upd_content=$_POST['content'];
  $timestamp=time();
  $update="UPDATE BLOG_DATA SET TITLE='".$upd_title."',CONTENT='".$upd_content."',BLOG_DATE='".$timestamp."',IMAGE='".$image_path."' WHERE ID='".$id."'";
  $run_updates=mysqli_query($conn, $update);
  if ($run_updates) {
    echo "Your blog is successfully updated";
    header ('Refresh: 2; URL=../myblogs.php');
	}
	else {
		echo "Error: " . $run_updates . "" . mysqli_error($conn) . "<br>";		
  }
}