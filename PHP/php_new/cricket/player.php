<?php
require_once('data.php');

class player
{
  public $pname;
  public $tname;

  function __construct($pname,$tname)
  {
    $this->pname=$pname;
    $this->tname=$tname;
  }
}

$players=[];
foreach($matches as $key=>$value)
  {
    foreach($value as $key1=>$value1)
    {
      foreach($value1 as $key2=>$value2)
      {
        $obj=new player($key2,$key1);
        $players[]=$obj;
      }
    }
  }

echo "<pre>";
print_r($players);
echo "</pre>";
?>