<?php
namespace Match;

class match
{
  public $team;
  public $run;

  function __construct($team,$total)
  {
    $this->team=$team;
    $this->run=$total;
  }
}