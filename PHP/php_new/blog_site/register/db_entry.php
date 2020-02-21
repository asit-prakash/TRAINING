<?php
require '../vendor/autoload.php';
use blogger\user;
require_once('../db_connection/mysql.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username_ok=1;
  $email_ok=1;
  //if($nameErr == "" && $usernameErr == "" && $contactErr == "" && $emailErr == "" && $passwordErr ==  "") {
  $query1="SELECT EMAIL FROM USER_DETAILS WHERE EMAIL='$email'";
  $sql1=mysqli_query($conn, $query1);
  if($sql1) {
    $count=mysqli_num_rows($sql1);
    if($count>0) {
      echo "Email already exists";
      $email_ok=0;
    }
  }
  $query2="SELECT USERNAME FROM USER_DETAILS WHERE USERNAME='$user_name'";
  $sql2=mysqli_query($conn, $query2);
  if($sql2) {
    $count=mysqli_num_rows($sql2);
    if($count>0) {
      echo "Username already exists";
      $username_ok=0;
    }
  }

  if($err_flag==0 && $username_ok==1 && $email_ok==1) {
    $obj=new user($user_name,$pass_word,$contact,$email,$name);
    $query3="INSERT INTO USER_DETAILS VALUES ('".$obj->get_username()."','".$obj->get_password()."','".$obj->get_contact()."','".$obj->get_email()."','".$obj->get_name()."')";
    $sql3=mysqli_query($conn, $query3);
    if ($sql3) {
      //echo "New record created successfully in USER_DETAILS!" . "<br>";
      echo "You are successfully registered<br>";
      echo "You will be redirected to login page where you can login with your new credentials";
      header ('Refresh: 3; URL=../login/login.php');
    }
    else {
      echo "Error: " . $sql3 . "" . mysqli_error($conn) . "<br>";
    }
  }
}