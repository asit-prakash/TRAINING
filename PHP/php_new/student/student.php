<?php
require_once('data.php');

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

$st=[];
foreach ($student as $key => $value) 
{
  $st_marks=setmarks($value['id']);
  $obj=new student($value['id'],$value['name'],$value['dob'],$value['grade'],$st_marks);
  $st[]=$obj;
}
function setmarks($id)
{
  global $marks;
  foreach ($marks as $key => $value) 
  {
    if ($key==$id) 
    {
      return $value;
    }
  }
}

echo "<pre>";
print_r($st);
echo "</pre>";
 ?>