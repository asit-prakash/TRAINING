<?php
namespace Clg;

class college
{
  public $id;
  public $name;
  public $details=[];
  function __construct($id,$name) 
  {
    $this->id=$id;
    $this->name=$name;
    $this->details=[];
  }
}