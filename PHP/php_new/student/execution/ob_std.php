<?php
require './vendor/autoload.php';
use Std\student;
require_once('./execution/data.php');

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
/*echo "<pre>";
print_r($st);
echo "</pre>";*/