<?php
require_once('../db_connection/mysql.php');
//session_start();
// if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
//   header("Location:../index.php");
// }
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
  $user_name=$_POST['username'];
  $pass_word=$_POST['password'];
  $auth="SELECT * FROM USER_DETAILS WHERE USERNAME='$user_name' AND PASSWORD='$password'";
  $query=mysqli_query($conn, $auth);
  $count=mysqli_num_rows($query);
  if($count==1) {
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    header("Location:../index.php");
  }
  else {
    echo "sorry..user id or password entered is invalid";
  }
}
