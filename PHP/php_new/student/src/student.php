<?php
namespace Std;

class student 
{
  public $id;
  public $name;
  public $dob;
  public $grade;
  public $marks;

  function __construct($id,$name,$dob,$grade,$st_marks)
  {
    $this->id=$id;
    $this->name=$name;
    $timestamp = strtotime ($dob);
    $this->dob=$timestamp;
    $this->grade=$grade;
    $this->marks=$st_marks;
  }
}