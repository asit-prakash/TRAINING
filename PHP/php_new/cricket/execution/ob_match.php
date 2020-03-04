<?php
require './vendor/autoload.php';
use Match\match;
require_once('./execution/data.php');

$match_dt=[];//array of objects for match
$total=0;//total run scored in a match by a team
foreach($matches as $key=>$value)
{
  foreach ($value as $key1=>$value1)
  {
    foreach($value1 as $key2=>$value2)
    {
      $total=$total+$value2;
    }
    $obj=new match($key1,$total);
    $match_dt[$key][]=$obj;
    $total=0;
  }
}
/*echo "<pre>";
print_r($match_dt);
echo "</pre>";*/