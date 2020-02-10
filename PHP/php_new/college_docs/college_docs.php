<?php
    include 'data.php';
    class college_details
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
    class document_details
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
			function getname()
			{
			return $this->name;
			}
			function gettype()
			{
				return $this->type;
			}
			function getsent()
			{
			return $this->sent;
			}
  	}

    $clg_dt=[];//array of objects for college details
    $doc_dt=[];//array of objects for document details

    //college objects
    foreach($clg_data as $key => $value)
    {
      $obj=new college_details($value['id'],$value['name']);
      $clg_dt[] = $obj;
    }
    //document objects
    foreach($doc_data as $key1 => $value1)
    {
      $obj1=new document_details($value1['name'],$value1['type'],$value1['college'],$value1['status']);
      $doc_dt[]=$obj1;
      fun($value1['college'],$value1['name'],$value1['type'],$value1['status'],$key1);
		}
		
     function fun($id,$name,$type,$status,$key1)
     {
        global $clg_dt;
        foreach($clg_dt as $key => $value)
        {
          if(($id) == ($value->id))
          { 
            $value->details[$key1]['doc-name']=$name;
            $value->details[$key1]['doc-type']=$type;
            $value->details[$key1]['doc-status']=$status;
          }
          if($id=='')
          {
            $value->details[$key1]['doc-name']=$name;
            $value->details[$key1]['doc-type']=$type;
            $value->details[$key1]['doc-status']=$status;
          }
        }
      }
        echo "<pre>";
        print_r($clg_dt);
        print_r($doc_dt);
        echo "</pre>";
        
?>