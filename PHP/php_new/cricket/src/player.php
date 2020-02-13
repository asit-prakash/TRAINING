<?php
namespace Players;

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