<?php
//session_start();
require './vendor/autoload.php';
use dbcon\db_conn;
use user\user_model;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

  $captchaok=0;
  $user_name=$_POST['username'];
  $pass_word=$_POST['password'];
  $pass_word=hash('sha512',$pass_word);

  $obj_db=new db_conn;
  $access=$obj_db->open_db_conn();
  $obj_user = new user_model($access);
  $validate=$obj_user->login($user_name,$pass_word);

  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $secretKey="6Lfc09wUAAAAAPif_7idYQe5VcKwHK2K3liqwgx5";
    $responseKey=$_POST['g-recaptcha-response'];
    $userIP=$_SERVER['REMOTE_ADDR'];
    $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

    $response=file_get_contents($url);
    $response=json_decode($response);
    if($response->success === true)
    {
      $captchaok=1;
    }
    else {
      $captchaok=0;
    }
  }
  if($validate && $captchaok==1) {
    $_SESSION['username']=$validate[0]['USERNAME'];
    $_SESSION['password']=$validate[0]['PASSWORD'];
    $_SESSION['name']=$validate[0]['NAME'];
    header("Location:http://www.site.com/home");
  }
  elseif($validate && $captchaok==0) {
    $invalid = "please check out captcha";
  }
  elseif(!$validate && $captchaok==0) {
    $invalid = "sorry..user id or password entered is invalid and checkout captcha also";
  }
  elseif(!$validate && $captchaok==1) {
    $invalid = "sorry..user id or password entered is invalid";
  }
}

require_once('./view/login/login_view.php');