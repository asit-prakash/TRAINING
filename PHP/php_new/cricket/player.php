<?php
require_once('data.php');

class player
{
  public $match_id;
  public $run;

  function __construct($match_id,$run)
  {
    $this->match_id=$match_id;
    $this->run=$run;
  }
}

$players = [];//array of object for player
foreach($matches as $key=>$value)
{
  foreach($value as $key1=>$value1)
  {
    foreach($value1 as $key2=>$value2)
    {
      $obj=new player($key,$value2);
      $players[$key2][]=$obj;
    }
  }
}
/*echo "<pre>";
print_r($players);
echo "</pre>";*/
?>