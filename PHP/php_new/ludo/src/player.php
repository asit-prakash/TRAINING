<?php
include '../execution/data.php';

class player {
  public $player_name;
  public $token_pos;

  function __construct($player_name,$token_pos) {
    $this->player_name=$player_name;
    $this->token_pos=$token_pos;
  }
}

$ludo=[];
$pl_dt=[];
foreach ($details as $key=>$value) {
  $obj = new player($value['pname'],$value['position']);
  $ludo[]=$obj;
  $pl_dt[$value['pname']]=0;
}

$turn=0;
foreach ($score as $key=>$value) {
  for($i=0;$i<strlen($value);$i++) {
    foreach($details as $key1=>$value1) {
      if($turn==0 && $value[$i]==1) {
        echo "yogita won";
      }
    }
  }
}


echo "<pre>";
print_r($pl_dt);
print_r($ludo);
echo "</pre>";