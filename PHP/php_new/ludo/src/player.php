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

$turn=1;
foreach ($score as $key=>$value) {
  for($i=0;$i<strlen($value);$i++) {
    if($turn%2!=0) {
      if($value[$i] == 1) {
        echo "yogita won";
        break;
      }
      else {
        $turn++;
      }
    }
    else {
      if($value[$i]==1 || $value[$i]==2 || $value[$i]==3) {
        check($turn,$value[$i]);
      }
    }

  }
}

//function check($turn,$val) {
  $turn=2;
  global $ludo;
  foreach($ludo as $key=>$value) {
   // foreach($value as $key1=>$value1) {
      if($turn-1 == $key){
        $minm=min($value->token_pos);
        echo $minm;
        foreach($value->token_pos as $key1=>$value1) {
          if($value1 == $minm) {
            echo $value1;
            $value1=9;
          }
        }
      }
   // }
  }
//}


echo "<pre>";
print_r($pl_dt);
print_r($ludo);
echo "</pre>";