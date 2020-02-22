<?php
namespace user;
require '../../vendor/autoload.php';
use dbcon\db_conn;

class user_model extends db_conn {

  public function login($user_name,$pass_word,$access) {
    
    $auth="SELECT USERNAME,PASSWORD,NAME FROM USER_DETAILS WHERE USERNAME='$user_name' AND PASSWORD='$pass_word'";
    $query=mysqli_query($access, $auth);
    $data=mysqli_fetch_assoc($query);
    $count=mysqli_num_rows($query);
    if($count==1) {
      return true;
    }
    else {
      return false;
    }
  }
}
