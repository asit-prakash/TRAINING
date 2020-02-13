<?php
require './vendor/autoload.php';
use Position\arrange;
require_once('./execution/data.php');

$st_dt=[];
foreach ($student as $key=>$value) {
  $obj = new arrange($value['name'],$value['gender']);
  $st_dt[]=$obj;
}