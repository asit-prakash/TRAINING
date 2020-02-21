<?php
ob_start();
require '../../vendor/autoload.php';
use blogs\blog;
require_once('../../db_connection/mysql.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  //session_start();
  $title=$_POST['title'];
  $title=addslashes($title);
  $author=$_SESSION['name'];
  $author=addslashes($author);
  $content=$_POST['content'];
  $content=addslashes($content);
  $timestamp=time();
  $user_name=$_SESSION['username'];
  $user_name=addslashes($user_name);

  if($imageErr=="") {
    $obj=new blog($title,$author,$content,$timestamp,$user_name,$image_path);
    $entry="INSERT INTO BLOG_DATA (TITLE,AUTHOR,CONTENT,BLOG_DATE,USERNAME,IMAGE) VALUES 
    ('".$obj->get_title()."','".$obj->get_author()."','".$obj->get_content()."',
    '".$obj->get_timestamp()."','".$obj->get_user_name()."','".$obj->get_image_path()."')";
    $run_sql=mysqli_query($conn, $entry);

    if ($run_sql) {
    echo "New blog created successfully";
    header ('Refresh: 1; URL=../myblogs.php');
    }
    else {
    echo "Error: " . $run_sql . "" . mysqli_error($conn) . "<br>";		
    }
    echo "done";
  }
}