<?php
require '../../vendor/autoload.php';
use dbcon\db_conn;
use user\user_model;
// $tdata=$_POST['tdata'];

$nameErr = $usernameErr = $contactErr = $emailErr = $passwordErr = "";
$name = $user_name = $contact =  $email = $pass_word = $confirm =  "";
$name_check = $username_check = $contact_check = $email_check = $password_check = "";

if(isset($_POST['username']) && !isset($_POST['register'])){
  $user_name=$_POST['username'];
  $obj_db=new db_conn;
  $access=$obj_db->open_db_conn();
  $obj = new user_model($access);
  $availability=$obj->username_avail($user_name);
  $username_check=preg_match("/^[A-Za-z@\-_0-9]+$/",$user_name);
  
  if(!$username_check) {
    $response="Only letters,numbers and '@','_','-' are allowed";
  }
  else {
    if($availability == true) {
      $response="not available";
    }
    else {
      $response="available";
    }
  }
  echo $response;
}

if(isset($_POST['fullname']) && !isset($_POST['register'])) {
  $name = test_input($_POST["fullname"]);
  $name_check=preg_match("/^[a-zA-Z]+(\ [a-zA-Z]+)?$/",$name);
  if (!$name_check) {
    $nameErr = "Only letters are allowed";
  }
  echo $nameErr;
}

if(isset($_POST['contact']) && !isset($_POST['register'])) {
  $contact=test_input($_POST["contact"]);
  if(!empty($contact)) {
    if (!preg_match("/^[+]{1}[9]{1}[1]{1}[1-9]{1}[0-9]{9}$/",$contact)) {
      $contactErr = "Enter a valid contact number";
    }
  }
  echo $contactErr;
}

if(isset($_POST['email']) && !isset($_POST['register'])) {
  $email=$_POST["email"];
	$email=test_input($email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $emailErr="Enter a valid email address";
  }
  echo $emailErr;
}

function test_input($data) {
	$data = trim($data);//remove extra spaces
	$data = stripslashes($data);//remove slashes
	$data = htmlspecialchars($data);//convert special characters into html entities
  return $data;//return pure data
}