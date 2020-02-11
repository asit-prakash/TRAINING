<?php
require_once('data.php');
require_once('document.php');

class college
{
  public $id;
  private $name;
  public $details=[];
  function __construct($id,$name) 
  {
    $this->id=$id;
    $this->name=$name;
    $this->details=[];
  }
	function getid() 
	{
    return $this->id;
  }
	function getname() 
	{
    return $this->name;
  }
}

$clg_dt=[];//array of objects for college details
//college objects
foreach($clg_data as $key => $value)
{
  $obj=new college($value['id'],$value['name']);
  $clg_dt[] = $obj;
}    

        
?>