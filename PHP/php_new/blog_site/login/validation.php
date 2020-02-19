<?php
require_once('../db_connection/mysql.php');
require_once('../session_info.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
  $user_name=$_POST['username'];
  $pass_word=$_POST['password'];
  $auth="SELECT USERNAME,PASSWORD,NAME FROM USER_DETAILS WHERE USERNAME='$user_name' AND PASSWORD='$pass_word'";
  $query=mysqli_query($conn, $auth);
  $data=mysqli_fetch_assoc($query);
  $count=mysqli_num_rows($query);
  if($count==1) {
    $_SESSION['username']=$user_name;
    $_SESSION['password']=$pass_word;
    $_SESSION['name']=$data['NAME'];
    header("Location:../index.php");
  }
  else {
    echo "sorry..user id or password entered is invalid";
  }
}
