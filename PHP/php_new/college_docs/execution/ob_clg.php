<?php
require './vendor/autoload.php';
use Clg\college;
require_once('./execution/data.php');

$clg_dt=[];//array of objects for college details
//college objects
foreach($clg_data as $key => $value)
{
  $obj=new college($value['id'],$value['name']);
  $clg_dt[] = $obj;
} 