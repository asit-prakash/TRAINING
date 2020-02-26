<?php
//session_start();
require './vendor/autoload.php';
use dbcon\db_conn;
use user\user_model;

$nameErr = $usernameErr = $contactErr = $emailErr = $passwordErr =  "";
$name = $user_name = $contact =  $email = $pass_word = $confirm =  "";
$name_check = $username_check = $contact_check = $email_check = $password_check = "";
$err_flag=0;

if(isset($_POST['username']) && !isset($_POST['register'])){
  $user_name=$_POST['username'];
  $obj_db=new db_conn;
  $access=$obj_db->open_db_conn();
  $obj = new user_model($access);
  $availability=$obj->username_avail($user_name);
  if($availability == true) {
    $response="not available";
  }
  else {
    $response="available";
  }
  echo $response;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  $name = test_input($_POST["fullname"]);
  $name_check=preg_match("/^[a-zA-Z]+(\ [a-zA-Z]+)?$/",$name);
  if (!$name_check) {
    $nameErr = "Only letters are allowed";
    $err_flag++;
  }

  $user_name = test_input($_POST["username"]);
	$username_check=preg_match("/^[A-Za-z@\-_0-9]+$/",$user_name);
	if (!$username_check) {
    $usernameErr = "Only letters,numbers and '@','_','-' are allowed";
    $err_flag++;
  }
  
  $contact=test_input($_POST["contact"]);
  if(!empty($contact)) {
    if (!preg_match("/^[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}$/",$contact)) {
    $contactErr = "Enter a valid contact number";
    $err_flag++;
    }
  }
  
  $email=$_POST["email"];
	$email=test_input($email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $emailErr="Enter a valid email address";
    $err_flag++;
  }
  
  $pass_word=$_POST["password"];
  $pass_word=test_input($pass_word);
  $confirm=$_POST["confirm"];
  $confirm=test_input($confirm);
  if($pass_word != $confirm) {
    $passwordErr="Password didn't matched,try again";
    $err_flag++;
  }

  if($err_flag==0) {
    $obj_db=new db_conn;
    $access=$obj_db->open_db_conn();
    $obj = new user_model($access);
    if($obj->user_exist($user_name) == 1 && $obj->email_exist($email,$access) == 1) {
      $usernameErr = "Username already exists";
      $emailErr = "Email already exists";
    }
    elseif($obj->user_exist($user_name) == 1) {
      $usernameErr = "Username already exists";
    }
    elseif($obj->email_exist($email) == 1) {
      $emailErr = "Email already exists";
    }
  }
  if($err_flag==0 && !$obj->user_exist($user_name) == 1 && !$obj->email_exist($email) == 1) {
    $pass_word=hash('sha512',$pass_word);
    $register_ok=$obj->register_user($user_name,$pass_word,$contact,$email,$name);
    if($register_ok == true) {
      //echo "New record created successfully in USER_DETAILS!" . "<br>";
      $success="You are successfully registered, you will be redirected to login page";
      header ('Refresh: 3; URL=http://www.site.com/Training/PHP/php_new/blog_site_mvc/index.php/login');
    }
    else {
      echo "Error: " . $sql3 . "" . $register_ok . "<br>";
    }
  }
}

function test_input($data) {
	$data = trim($data);//remove extra spaces
	$data = stripslashes($data);//remove slashes
	$data = htmlspecialchars($data);//convert special characters into html entities
  return $data;//return pure data
}
require_once('./view/register/register_view.php');