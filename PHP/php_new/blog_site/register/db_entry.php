<?php
require_once('../db_connection/mysql.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if($nameErr == "" && $usernameErr == "" && $contactErr == "" && $emailErr == "" && $passwordErr ==  "") {
    $query1="INSERT INTO USER_DETAILS VALUES ('$user_name','$pass_word','$contact','$email','$name')";
    $sql1=mysqli_query($conn, $query1);
    if ($sql1) {
      //echo "New record created successfully in USER_DETAILS!" . "<br>";
      echo "You are successfully registered<br>";
      echo "You will be redirected to login page where you can login with your new credentials";
      header ('Refresh: 4; URL=../login/login.php');
    }
    else {
      //echo "Error: " . $sql1 . "" . mysqli_error($conn) . "<br>";
     echo "username or email is already taken,please choose another one";
    }
  }
}