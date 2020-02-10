<?php
	include 'data.php';
  class st_details
  {
    public $name;
    public $gender;

    function __construct($name,$gender)
    {
      $this->name=$name;
      $this->gender=$gender;
    }
    function getname()
    {
      return $this->name;
    }
    function getgender()
    {
      return $this->gender;
    }
  }
	foreach ($student as $key=>$value)
	{
		$obj = new st_details($value['name'],$value['gender']);
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
  echo "<pre>";
  print_r($st_dt);
  echo "</pre>";
?>