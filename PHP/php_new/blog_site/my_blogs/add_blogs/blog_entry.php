<?php
require_once('../../db_connection/mysql.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
  //session_start();
  $title=$_POST['title'];
  $author=$_SESSION['name'];
  $content=$_POST['content'];
  $timestamp=time();
  $user_name=$_SESSION['username'];

  if($imageErr=="") {
    $entry="INSERT INTO BLOG_DATA (TITLE,AUTHOR,CONTENT,BLOG_DATE,USERNAME,IMAGE) VALUES 
    ('$title','$author','$content','$timestamp','$user_name','$image_path')";
    $run_sql=mysqli_query($conn, $entry);

    if ($run_sql) {
    echo "New blog created successfully";
    header ('Refresh: 1; URL=../myblogs.php');
    }
    else {
    echo "Error: " . $run_sql . "" . mysqli_error($conn) . "<br>";		
    }
  }
}