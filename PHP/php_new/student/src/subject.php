<?php
namespace Subj;

class subject
{
	public $name;
	public $code;
	public $mm;
  function __construct($name,$code,$mm)
  {
    $this->name=$name;
    $this->code=$code;
    $this->mm=$mm;
  }
}