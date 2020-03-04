<?php
require './vendor/autoload.php';
use Subj\subject;
require_once('./execution/data.php');

$sub=[];
foreach ($subject as $key => $value) 
{
	foreach ($value as $key1 => $value1) 
	{
    $obj=new subject ($value1['name'],$value1['code'],$value1['mm']);
    $sub[$key][]=$obj;
  }
}
/*echo "<pre>";
print_r($sub);
echo "</pre>";*/