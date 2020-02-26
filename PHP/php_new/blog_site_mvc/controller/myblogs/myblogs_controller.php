<?php
ob_start();
//session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  header("Location:http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/login");
}
require './vendor/autoload.php';
use dbcon\db_conn;
use blog\blogs_model;

$user_name=$_SESSION['username'];
$obj_db=new db_conn;
$access=$obj_db->open_db_conn();
$obj_model = new blogs_model($access);
$posts=$obj_model->get_myblogs($user_name);

if($posts == false) {
  $noblog_msg= "Sorry..No blogs on this site,please come back later";
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
  //session_start();
  $_SESSION['id']=$_POST['pass_id'];
  header("Location:http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/readblog");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
  //session_start();
  $_SESSION['id']=$_POST['pass_id'];
  header("Location:http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/editblog");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  $_SESSION['id']=$_POST['pass_id'];
  $id=$_SESSION['id'];
  $delete=$obj_model->delete_blog($id);
  if ($delete == true) {
    $del_succ="Blog deleted successfully";
    header ('Refresh: 2; URL=http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/myblogs');
  }
  else {
    echo $delete;
  }
}
require_once('./view/my_blogs/my_blogs_view.php');