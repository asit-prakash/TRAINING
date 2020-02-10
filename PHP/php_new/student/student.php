<?php
  include 'data.php';
  class student
  {
    private $id;
    private $grade;
    private $name;
    private $dob;

    function __construct($id,$grade,$name,$dob)
    {
      $this->id=$id;
      $this->name=$name;
      $this->grade=$grade;
      $this->dob=$dob;
    }
  }
  
?>