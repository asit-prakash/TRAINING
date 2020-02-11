<?php
  require_once('data.php');
  
  class arrange
  {
    public $name;
    public $gender;

    function __construct($name,$gender)
    {
      $this->name=$name;
      $this->gender=$gender;
    }
  }

  $st_dt=[];
	foreach ($student as $key=>$value)
	{
		$obj = new arrange($value['name'],$value['gender']);
		$st_dt[]=$obj;
	}

  foreach ($st_dt as $key=>$value)
	{
    if ($st_dt[$key]->gender == 'female' && $st_dt[$key+1]->gender == 'female') 
    {
      foreach($st_dt as $key1=>$value1)
      {
        if(array_key_exists($key1-1,$st_dt) && array_key_exists($key1+1,$st_dt))
      	{
          if ($st_dt[$key1]->gender == 'male' && $st_dt[$key1-1]->gender == 'male' && $st_dt[$key1+1]->gender == 'male')
          {
            $temp_name=$st_dt[$key+1]->name;
            $st_dt[$key+1]->name=$st_dt[$key1]->name;
            $st_dt[$key1]->name=$temp_name;
            
            $temp_gender=$st_dt[$key+1]->gender;
            $st_dt[$key+1]->gender=$st_dt[$key1]->gender;
            $st_dt[$key1]->gender=$temp_gender;
            break;
        	} 
        }
        elseif(array_key_exists($key1-1,$st_dt) && !array_key_exists($key1+1,$st_dt))
        {
          if ($st_dt[$key1]->gender == 'male' && $st_dt[$key1-1]->gender == 'male')
          {
            $temp_name=$st_dt[$key+1]->name;
            $st_dt[$key+1]->name=$st_dt[$key1]->name;
            $st_dt[$key1]->name=$temp_name;
            
            $temp_gender=$st_dt[$key+1]->gender;
            $st_dt[$key+1]->gender=$st_dt[$key1]->gender;
            $st_dt[$key1]->gender=$temp_gender;
            break;
          } 
        }
        elseif(!array_key_exists($key1-1,$st_dt) && array_key_exists($key1+1,$st_dt))
        {
          if ($st_dt[$key1]->gender == 'male' && $st_dt[$key1+1]->gender == 'male')
          {
            $temp_name=$st_dt[$key+1]->name;
            $st_dt[$key+1]->name=$st_dt[$key1]->name;
            $st_dt[$key1]->name=$temp_name;
            
            $temp_gender=$st_dt[$key+1]->gender;
            $st_dt[$key+1]->gender=$st_dt[$key1]->gender;
            $st_dt[$key1]->gender=$temp_gender;
            break;
          } 
      	}
    	}
    	break;
  	}
  }

?>