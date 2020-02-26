<?php
namespace user;
require './vendor/autoload.php';
use dbcon\db_conn;

class user_model extends db_conn {

  private $access;
  private $email_ok;
  private $username_ok;
  private $user_name;
  private $pass_word;
  private $contact;
  private $email;
  private $name;

  function __construct($access) {
    $this->access=$access;
  }

  public function login($user_name,$pass_word) {
    $auth="SELECT USERNAME,PASSWORD,NAME FROM USER_DETAILS WHERE USERNAME='$user_name' AND PASSWORD='$pass_word'";
    $query=mysqli_query($this->access, $auth);
    $count=mysqli_num_rows($query);
    if($count==1) {
      $data=mysqli_fetch_assoc($query);
      $items[]=$data;
      return $items;
    }
    else {
      return false;
    }
  }

  public function email_exist($email) {
    $query1="SELECT EMAIL FROM USER_DETAILS WHERE EMAIL='$email'";
    $sql1=mysqli_query($this->access, $query1);
    if($sql1) {
      $count=mysqli_num_rows($sql1);
      if($count>0) {
        $this->email_ok=1;
      }
    }
    return $this->email_ok;
  }

  public function user_exist($user_name) {
    $query2="SELECT USERNAME FROM USER_DETAILS WHERE USERNAME='$user_name'";
    $sql2=mysqli_query($this->access, $query2);
    if($sql2) {
      $count=mysqli_num_rows($sql2);
      if($count>0) {
        $this->username_ok=1;
      }
    }
    return $this->username_ok;
  }

  public function username_avail($user_name) {
    $check_uname="SELECT * FROM USER_DETAILS WHERE USERNAME='$user_name'";
    $query_uname=mysqli_query($this->access, $check_uname);
    if($query_uname) {
      $count=mysqli_num_rows($query_uname);
      if($count==1) {
        return true;
      }
      else {
        return false;
      }
    }
  }

  public function register_user($user_name,$pass_word,$contact,$email,$name) {
    $this->user_name=$user_name;
    $this->pass_word=$pass_word;
    $this->contact=$contact;
    $this->email=$email;
    $this->name=$name;

    $query3="INSERT INTO USER_DETAILS VALUES ('$this->user_name','$this->pass_word','$this->contact','$this->email','$this->name')";
    $sql3=mysqli_query($this->access, $query3);
    if ($sql3) {
      return true;
    }
    else {
      return mysqli_error($access);
    }
  }
}
