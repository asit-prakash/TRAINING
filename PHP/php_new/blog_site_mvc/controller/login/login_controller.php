<?php
require '../../vendor/autoload.php';
use dbcon\db_conn;
use user\user_model;
require_once('../../archive/session_info.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

  $user_name=$_POST['username'];
  $pass_word=$_POST['password'];

  $obj_db=new db_conn;
  $access=$obj_db->open_db_conn();
  $obj_user = new user_model($access);
  $validate=$obj_user->login($user_name,$pass_word);

  if($validate) {
    $_SESSION['username']=$validate[0]['USERNAME'];
    $_SESSION['password']=$validate[0]['PASSWORD'];
    $_SESSION['name']=$validate[0]['NAME'];
    header("Location:../../view/home/index.php");
  }
  else {
    $invalid = "sorry..user id or password entered is invalid";
  }
}