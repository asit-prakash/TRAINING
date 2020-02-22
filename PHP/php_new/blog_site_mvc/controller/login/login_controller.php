<?php
require '../../vendor/autoload.php';
use dbcon\db_conn;
require '../../vendor/autoload.php';
use user\user_model;
require_once('../../archive/session_info.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
  $user_name=$_POST['username'];
  $pass_word=$_POST['password'];
  $obj_db=new db_conn;
  $access=$obj_db->open_db_conn();
  $obj_user = new user_model;
  $validate=$obj_user->login($user_name,$pass_word,$access);
  if($validate == true) {
    // $_SESSION['username']=$user_name;
    // $_SESSION['password']=$pass_word;
    // $_SESSION['name']=$data['NAME'];
    header("Location:../../index.php");
  }
  else {
    echo "sorry..user id or password entered is invalid";
  }
}
