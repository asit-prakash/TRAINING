<?php
namespace Doc;

class document
{
	private $name;
	private $type;
	private $college;
	private $status;

	function __construct($name,$type,$college,$sent)
	{
		$this->name=$name;
		$this->type=$type;
		$this->college=$college;
		$this->status=$sent;
	}
}