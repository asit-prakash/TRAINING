<?php
//session_start();
require './vendor/autoload.php';
use dbcon\db_conn;
use blog\blogs_model;

$id=$_SESSION['id'];
$author=$_SESSION['name'];
$obj_db=new db_conn;
$access=$obj_db->open_db_conn();
$obj_blog = new blogs_model($access);
$posts=$obj_blog->read_blog($id);

require './view/read_blog/read_blog_view.php';