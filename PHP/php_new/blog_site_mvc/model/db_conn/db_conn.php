<?php
namespace dbcon;

class db_conn {

  protected $servername;
  protected $username;
  protected $password;
  protected $dbname;

  function __construct() {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "Casesensitive@6";
    $this->dbname = "BLOG";
  }
  
  public function open_db_conn() {
    // Create connection
    $conn=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
    // Check connection
    if(!$conn) {
      //die('Could not Connect My Sql:' .mysql_error());
      return false;
    }
    else {
      return $conn;
    }
  }
}