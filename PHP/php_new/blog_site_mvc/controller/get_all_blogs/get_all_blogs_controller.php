<?php
//session_start();
require './vendor/autoload.php';
use dbcon\db_conn;
use blog\blogs_model;

$obj_db=new db_conn;
$access=$obj_db->open_db_conn();
$obj_model = new blogs_model($access);
$posts=$obj_model->get_all_blogs();

if($posts == false) {
  $noblog_msg= "Sorry..No blogs on this site,please come back later";
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
  $_SESSION['id']=$_POST['pass_id'];
  $_SESSION['name']=$_POST['pass_author'];
  // echo '<script type="text/javascript">';
  // echo "window.location.href='./show_blog.php';";
  // echo '</script>';
  header("Location:http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/readblog");
  exit();
}
require_once('./view/home/index.php');